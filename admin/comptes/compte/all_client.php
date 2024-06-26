<?php
// Inclure le fichier de connexion à la base de données
require_once('../../../bd/connect.php');
require('../requets.php');
session_start();


$offset = $_SESSION['offset'];
$limitLignesPage = $_SESSION['limitLignesPage'] ;
$result=select($db,$offset,$limitLignesPage );
// Fermer la connexion à la base de données
require_once('../../../bd/close.php');
$i=$offset+1;
foreach ($result as $user) {
    echo "<tr>";
    echo "<th scope='row'>" . $i. "</th>";
    echo "<td>" . $user['nom'] . "</td>";
    echo "<td>" . $user['prenom'] . "</td>";
    echo "<td>" . $user['email'] . "</td>";
    echo "<td><a class='btn btn-info' href='../consulter/consulter.php?id=" . $user['idClient'] . "'>Consulter</a></td>";
    echo "<td>";
    echo "<form method='post' action='traitement.php'>";
    echo "<button class='btn btn-warning' type='submit' name='id' value='" . $user['idClient'] . "'>" . ($user['statut'] == 1 ? 'Active' : 'Blocked') . "</button>";
    echo "</form>";
    echo "</td>";
    echo "<td><a class='btn btn-danger' href='../supprimer/supprimer.php?id=" . $user['idClient'] . "'>Supprimer</a></td>";
    echo "</tr>";
    $i++;
}

?>
