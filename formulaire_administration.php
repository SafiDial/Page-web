<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        
        body {
            font-family: "Garamond", serif;
            background-color: transparent; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .bg-1 {
            background-color: rgba(0,0,0,0.6);
            color: #fff;
            padding: 40px;
            border-radius: 20px;
        }

        .form-group {
            margin-bottom: 20px; 
        }

        .form-control {
            border-radius: 10px;
        }

        .Btn.Envoyer {
            border-radius: 10px;
            padding: 15px 30px;
            font-size: 20px;
            cursor: pointer;
        }

        .Btn.Envoyer:hover {
            background-color: #555;
        }

        
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>


<!-----------------------------------------------FORMULAIRE ---------------------------------->


<div class="container">   
        <div class="bg-1 p-4 rounded">
            <h2 class="mb-4 text-light">Connexion Administrateur</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="username" class="text-light">Nom d'utilisateur :</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required >  
                </div>
                <div class="form-group">
                    <label for="password" class="text-light">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="email" class="text-light">Adresse e-mail :</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse e-mail" required>
                </div>
                <button type="submit" class="Btn Envoyer">Se connecter</button>
            </form>
        </div>
    </div>
    
    
<!-----------------------------------------LA BASE DE DONNEE  ---------------------------------->
      



    <?php
    $servername = "localhost";
    $username = "root";
    $password = "safi076711*";
    $dbname = "db web";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username_post = $_POST['username'];
            $password_post = $_POST['password'];
            $email_post = !empty($_POST['email']) ? strtolower($_POST['email']) : '';

            
            $stmt = $conn->prepare("SELECT username, password_hash, email FROM administrateurs WHERE username = :username");

            $stmt->bindParam(':username', $username_post);
            $stmt->execute();
            $row = $stmt->fetch();

            
            if ($row && password_verify($password_post, $row['password_hash']) && isset($row['email']) && strtolower($row['email']) === $email_post) {
                // si Les identifiants sont valides, rediriger vers la page d'administration
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username_post;
                header('Location: administration.php');
                exit;
            } else {
                // Identifiants incorrects, afficher un message d'erreur
                 echo "Nom d'utilisateur, mot de passe ou adresse e-mail incorrects.";
            }
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>
</body>
</html>
