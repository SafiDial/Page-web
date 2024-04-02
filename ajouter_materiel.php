<?php

$servername = "localhost";
$username = "root";
$password = "safi076711*";
$dbname = "db web";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}


$nom_materiel = $_POST['nom_materiel'];
$quantite = $_POST['quantite'];
$date_entree = $_POST['date_entree'];
$date_sortie = $_POST['date_sortie'];
$date_maintenance = $_POST['date_maintenance'];
$statut = $_POST['statut'];


$sql = "INSERT INTO STOCK_MATERIEL (Nom_mate, Qt_mater, Date_ent_mate, Date_sortie_mate, Date_maint_mate, Statut_mate) 
VALUES ('$nom_materiel', $quantite, '$date_entree', '$date_sortie', '$date_maintenance', '$statut')";


if ($conn->query($sql) === TRUE) {
    echo "Matériel ajouté au stock avec succès.";
} else {
    echo "Erreur lors de l'ajout du matériel au stock : " . $conn->error;
}


$conn->close();
?>
