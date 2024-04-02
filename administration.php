<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>

.transparent-bg {
            background-color: rgba(182, 247, 159);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }


.table {
       
        width: 100%;
       }

.table th,
.table td {
       border: 1px solid #0B0C0B ; /* Bordure pour toutes les cellules */
       padding: 8px;
       text-align: left;
      }
    
     .table th:not(:last-child),
     .table td:not(:last-child) {
     border-right: 1px solid  #0B0C0B ; 

     }

h2   {
      text-align: center;
      background-color: #f0f0f0; 
      padding: 10px; 
}
h1    {
      text-align: center;
      background-color: #f0f0f0; 
      padding: 10px; 
}
.container{
    width: 90%;
}




    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Page d'administration</h1>
                <div class="transparent-bg">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Ajouter du matériel au stock</h2>
                            <form action="ajouter_materiel.php" method="post">
                                <label for="nom_materiel">Nom du matériel</label>
                                <input type="text" name="nom_materiel" class="form-control" required><br>
                                <label for="quantite">Quantité</label>
                                <input type="number" name="quantite" class="form-control" required min="0"><br>
                                <label for="date_entree">Date d'entrée</label>
                                <input type="date" name="date_entree" class="form-control"><br>
                                <label for="date_sortie">Date de sortie</label>
                                <input type="date" name="date_sortie" class="form-control"><br>
                                <label for="date_maintenance">Date de maintenance</label>
                                <input type="date" name="date_maintenance" class="form-control"><br>
                                <label for="statut">Statut</label>
                                <input type="text" name="statut" class="form-control"><br>
                                <input type="submit" value="Ajouter au stock" class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h2>Ajouter un produit au stock</h2>
                            <form action="ajouter_produit.php" method="post">
                                <label for="nom_produit">Nom du produit</label>
                                <input type="text" name="nom_produit" class="form-control" required><br>
                                <label for="quantite">Quantité</label>
                                <input type="number" name="quantite" class="form-control" required min="0"><br>
                                <label for="date_entree">Date d'entrée</label>
                                <input type="date" name="date_entree" class="form-control"><br>
                                <label for="date_sortie">Date de sortie</label>
                                <input type="date" name="date_sortie" class="form-control"><br>
                                <label for="date_peremption">Date de péremption</label>
                                <input type="date" name="date_peremption" class="form-control"><br>
                                <label for="statut">Statut</label>
                                <input type="text" name="statut" class="form-control"><br>
                                <label for="type">Type de produit</label>
                                <input type="text" name="type" class="form-control"><br>
                                <input type="submit" value="Ajouter au stock" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>BASE DE DONNEE</h1>
                <div class="transparent-bg">
                    <!-- ************************************** Connexion à la base de données************************ -->
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "safi076711*";
                $dbname = "db web";

            
                $conn = new mysqli($servername, $username, $password, $dbname);

                
                if ($conn->connect_error) {
                    die("La connexion à la base de données a échoué : " . $conn->connect_error);
                }
                ?>

                <!-- **************************************** Affichage des données de la table contact ******************************* -->
                <h2>Données de la table contact</h2>
                <div class="table-responsive">
                    <?php
                    
                    $sql = "SELECT * FROM contact";
                    $result = $conn->query($sql);

                    // Affichage des données récupérées
                    if ($result->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<tr>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Téléphone</th>
                              <th>Email</th>
                              <th>Message</th>
                              </tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["N_Client"] . "</td>";
                            echo "<td>" . $row["P_Client"] . "</td>";
                            echo "<td>" . $row["Num_tel_Client"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Message"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Aucune donnée trouvée dans la table CLIENT.";
                    }
                    ?>



<!-- ****************************************Affichage des données de la table devis****************************************** -->
                <h2>Données de la table devis</h2>
                <div class="table-responsive">
                    <?php
                
                    $sql = "SELECT * FROM devis";
                    $result = $conn->query($sql);

                    // Affichage des données récupérées
                    if ($result->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<tr>
                             <th>Nom & prenom </th>
                             <th>Email</th>
                             <th>Numéro de téléphone</th>
                             <th>Adresse</th>
                             <th>Surface de nettoyage</th>
                             <th>Type de service</th>
                             <th>Message</th>
                             </tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["N_Client"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Num_tel_Client"] . "</td>";
                            echo "<td>" . $row["Adresse"] . "</td>";
                            echo "<td>" . $row["Surface_nettoyage"] . "</td>";
                            echo "<td>" . $row["Type_service"] . "</td>";
                            echo "<td>" . $row["Message"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Aucune donnée trouvée dans la table devis.";
                    }
                    ?>




 <!-- *********************************************Affichage des données de la table RDV***************************************** -->
                <h2>Données de la table RDV</h2>
                <div class="table-responsive">
                    <?php
                    
                    $sql = "SELECT * FROM RDV";
                    $result = $conn->query($sql);

                    
                    if ($result->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<tr>
                             <th>Nom</th>
                             <th>Prénom</th>
                             <th>Numéro de téléphone</th>
                             <th>Email</th><th>Date du rendez-vous</th>
                             <th>Motif</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["N_Client"] . "</td>";
                            echo "<td>" . $row["P_Client"] . "</td>";
                            echo "<td>" . $row["Num_tel_Client"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Date_rdv"] . "</td>";
                            echo "<td>" . $row["Motif"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Aucune donnée trouvée dans la table RDV.";
                    }
                    ?>




 <!-- ***********************************************Affichage des données de la table formation******************************************* -->
                <h2>Données de la table formation</h2>
                <div class="table-responsive">
                    <?php
                    
                    $sql = "SELECT * FROM formation";
                    $result = $conn->query($sql);

                    
                    if ($result->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<tr><th>Nom</th>
                             <th>Prénom</th>
                             <th>Numéro de téléphone</th>
                             <th>Email</th>
                             <th>Date</th>
                             <th>Message</th>
                             <th>Type de formation</th>
                             </tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["N_Client"] . "</td>";
                            echo "<td>" . $row["P_Client"] . "</td>";
                            echo "<td>" . $row["Num_tel_Client"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Date"] . "</td>";
                            echo "<td>" . $row["Message"] . "</td>";
                            echo "<td>" . $row["type_formation"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Aucune donnée trouvée dans la table formation.";
                    }
                    ?>
 <!--**************************************************** Affichage du stock de matériel *************************************************-->
                <h2>Stock de matériel</h2>
                <div class="table-responsive">
                    <?php
                    
                    $sql_materiel = "SELECT * FROM STOCK_MATERIEL";
                    $result_materiel = $conn->query($sql_materiel);

                    
                    if ($result_materiel->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<tr>
                              <th>Nom du matériel</th>
                              <th>Quantité</th>
                              <th>Date d'entrée</th>
                              <th>Date de sortie</th>
                              <th>Date de maintenance</th>
                              <th>Statut</th>
                              </tr>";
                        while ($row = $result_materiel->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Nom_mate"] . "</td>";
                            echo "<td>" . $row["Qt_mater"] . "</td>";
                            echo "<td>" . $row["Date_ent_mate"] . "</td>";
                            echo "<td>" . $row["Date_sortie_mate"] . "</td>";
                            echo "<td>" . $row["Date_maint_mate"] . "</td>";
                            echo "<td>" . $row["Statut_mate"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Aucun matériel disponible dans le stock.";
                    }
                    ?>

 <!-- ************************************************ Affichage du stock de produit ****************************************************** -->
                <h2>Stock de produit</h2>
                <div class="table-responsive">
                    <?php
                    
                    $sql_produit = "SELECT * FROM STOCK_PRODUIT_";
                    $result_produit = $conn->query($sql_produit);
                    
                    if ($result_produit->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<tr>
                              <th>Nom du produit</th>
                              <th>Quantité</th>
                              <th>Date d'entrée</th>
                              <th>Date de sortie</th>
                              <th>Date de péremption</th>
                              <th>Statut</th>
                              <th>Type</th>
                              </tr>";
                        while ($row = $result_produit->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Nom_prod"] . "</td>";
                            echo "<td>" . $row["Qt_prod"] . "</td>";
                            echo "<td>" . $row["Date_ent_prod"] . "</td>";
                            echo "<td>" . $row["Date_sortie_prod"] . "</td>";
                            echo "<td>" . $row["Date_perp_prod"] . "</td>";
                            echo "<td>" . $row["Statut_prod"] . "</td>";
                            echo "<td>" . $row["Type_prod"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Aucun produit disponible dans le stock.";
                    }
                    ?>
                </div>


<!-- ****************************************** Affichage des nom de toutes les personnes enregistrees ********************************** -->
                <h2>Noms & souces de toutes les personnes enregistrées</h2>
                <div class="table-responsive">
                    <?php
                    
                    $data = array();

                    //////////////////////////////        Table CLIENT
                    $sql = "SELECT N_Client, P_Client FROM contact";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $data[] = array("Nom" => $row["N_Client"], "Prénom" => $row["P_Client"], "Source" => "CONTACT");
                    }

                    ///////////////////////////////////   Table devis
                    $sql = "SELECT N_Client FROM devis";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $data[] = array("Nom" => $row["N_Client"], "Prénom" => "", "Source" => "DEVIS");
                    }

                    ///////////////////////////////////   Table RDV
                    $sql = "SELECT N_Client, P_Client FROM RDV";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $data[] = array("Nom" => $row["N_Client"], "Prénom" => $row["P_Client"], "Source" => "RDV");
                    }

                    ///////////////////////////////////   Table formation
                    $sql = "SELECT N_Client, P_Client FROM formation";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $data[] = array("Nom" => $row["N_Client"], "Prénom" => $row["P_Client"], "Source" => "FORMATION");
                    }

                    /////////////////////////////////     Affichage des données récupérées
                    if (count($data) > 0) {
                        echo "<table class='table'>";
                        echo "<tr>
                             <th>Nom</th>
                             <th>Prénom</th>
                             <th>Source</th>
                             </tr>";
                        foreach ($data as $item) {
                            echo "<tr>";
                            if ($item["Source"] == "Devis") {
                                
                                echo "<td colspan='2'>" . $item["Nom"] . "</td>";
                            } else {
                                
                                echo "<td>" . $item["Nom"] . "</td>";
                                echo "<td>" . $item["Prénom"] . "</td>";
                            }
                            echo "<td>" . $item["Source"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Aucune personne enregistrée trouvée.";
                    }
                    
                     

                    $conn->close();
                    ?>


                </div>
            </div>
        </div>
    </div>
</body>
</html>