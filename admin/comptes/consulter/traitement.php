
<?php
    session_start();
    // On inclut la connexion à la base
    require_once('../../../bd/connect.php');
    require_once('../../../class/client.php');
    require('../requets.php');
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = ($_GET['id']);

        $produit = selectClient($db,$id);
        $client = new Client();
        $client->setId($produit['idClient']); // Supposons que 'statut' est un champ de la table Client
        $client->setNom($produit['nom']); // Supposons que 'nom' est un champ de la table Client
        $client->setPrenom($produit['prenom']); // Supposons que 'prenom' est un champ de la table Client
        $client->setEmail($produit['email']); // Supposons que 'email' est un champ de la table Client
        $client->setTel($produit['tel']); // Supposons que 'tel' est un champ de la table Client
        $client->setStatut($produit['statut']); // Supposons que 'statut' est un champ de la table Client
        $client->setDate($produit['date']); // Supposons que 'statut' est un champ de la table Client

        $nbrParfum = 0;
        $nbrDederon = 0;
        $nbrMaquiage = 0;
        $nbrOlymiel = 0;
        $nbrNaturels = 0;




        $sql2 = 'SELECT * FROM `article` WHERE `idClient`=:id';
        // On prépare la requête
        $query2 = $db->prepare($sql2);
        // On attache les valeurs
        $query2->bindValue(':id', $id, PDO::PARAM_INT);
        // On exécute la requête
        $query2->execute();
        // On stocke le résultat dans un tableau associatif
        $produit2 = $query2->fetchAll(PDO::FETCH_ASSOC);

        $sql4 = 'SELECT * FROM `categories` ';
        // On prépare la requête
        $query4 = $db->prepare($sql4);
        // On exécute la requête
        $query4->execute();
        // On stocke le résultat dans un tableau associatif
        $produit4 = $query4->fetchAll(PDO::FETCH_ASSOC);



        foreach ($produit2 as $p) {

            $title = strtolower($p['idCategories']);
            $nbr = 0;
            // Use strpos to check if the title contains a certain keyword
            if (strpos($title, '1') !== false) {
                $nbr++;
            } elseif (strpos($title, '2') !== false) {
                $nbr++;
            } elseif (strpos($title, '3') !== false) {
                $nbr++;
            } elseif (strpos($title, '4') !== false) {
                $nbr++;
            } elseif (strpos($title, '5 ') !== false) {
                $nbr++;
            }
        }






        if (!$produit) {
            header('Location: ../compte/comptes.php');
        }
    } else {
        header('Location: ../compte/comptes.php');
    }
    require_once('../../../bd/close.php');
    ?>