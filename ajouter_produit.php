<?php

$servername = "localhost";
$username = "root";
$password = "safi076711*";
$dbname = "db web";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

$nom_produit = $_POST['nom_produit'];
$quantite = $_POST['quantite'];
$date_entree = $_POST['date_entree'];
$date_sortie = $_POST['date_sortie'];
$date_peremption = $_POST['date_peremption'];
$statut = $_POST['statut'];
$type = $_POST['type'];


$sql = "INSERT INTO STOCK_PRODUIT_ (Nom_prod, Qt_prod, Date_ent_prod, Date_sortie_prod, Date_perp_prod, Statut_prod, Type_prod) 
        VALUES ('$nom_produit', $quantite, '$date_entree', '$date_sortie', '$date_peremption', '$statut', '$type')";


if ($conn->query($sql) === TRUE) {
    echo "Produit ajouté au stock avec succès.";
} else {
    echo "Erreur lors de l'ajout du produit au stock : " . $conn->error;
}


$conn->close();
?>
