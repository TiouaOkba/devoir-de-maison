<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $sport = $_POST['sport'];
    $niveau = $_POST['niveau'];

    // Connexion à la base
    $conn = new mysqli("localhost", "root", "", "playmatch_db");
    if ($conn->connect_error) {
        die("Erreur : " . $conn->connect_error);
    }

    // Insertion
    $sql = "INSERT INTO profils_sportifs (id_user, sport, niveau)
            VALUES ((SELECT id_user FROM utilisateurs WHERE email='$email'), '$sport', '$niveau')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Profil enregistré avec succès.";
    } else {
        echo "Erreur : " . $conn->error;
    }

    $conn->close();
}
?>
