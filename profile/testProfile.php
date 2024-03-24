<?php
if (
    empty($_POST["email"]) || empty($_POST["nom"]) || 
    empty($_POST["prenom"]) || empty($_POST["tel"]) || empty($_POST["date"])
) {
    header("Location: ../login/login.php");
    exit();
} else {
    // Vérification de la présence et de la non-vacuité des données
    if (
        isset($_POST["email"]) && !empty($_POST["email"]) && 
        isset($_POST["nom"]) && !empty($_POST["nom"]) &&
        isset($_POST["prenom"]) && !empty($_POST["prenom"]) &&
        isset($_POST["tel"]) && !empty($_POST["tel"]) &&
        isset($_POST["date"]) && !empty($_POST["date"])
    ) {
        // Récupération des données
        $userEmail = $_POST["email"];
        $userNom = $_POST["nom"];
        $userPrenom = $_POST["prenom"];
        $userTel = $_POST["tel"];
        $userDate = $_POST["date"];

        // Redirection avec les données de l'utilisateur
        header("Location: profile.php?email=$userEmail");
        exit();
    } else {
        // Redirection si des données sont manquantes
        header("Location: ../login/login.php");
        exit();
    }
}
?>