<?php
    session_start();
    $_SESSION['nom'] = $_GET['personne'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" lang=fr/>
    <title>Mon Cloud</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <header class="haut">
        <p class="haut_gauche"><font size="8px">Mon Cloud</font></p>
        <p class="haut_droit1">
            <u><strong>Profil</strong></u><br/>
            Utilisateur: <?php echo $_GET['personne']; ?><br/>
        </p>
        <p class="haut_droit2">
            <?php echo'<img src="uploads/'.$_GET['personne'].'.'.'jpg'.' " width="120" height="120">';?>
        </p>
    </header>
    <br/><br/><br/>
    <main>
        <center>
            <table>
                <p><font size="5px"><strong><u>Importations</u></strong></font></p>
                <tr>
                    <td><strong>Images</strong></td>
                    <td><strong>Musiques</strong></td>
                    <td><strong>Vidéos</strong></td>
                    <td><strong>Pdfs</strong></td>
                    <td><strong>Taille</strong></td>
                </tr>
            <?php
                require_once('connect.php');
                $req=$bdd->prepare("SELECT * FROM cloud2 where utilisateur_inscrit = :user");
                $req->execute(array(
                    'user' => $_GET['personne']
                ));
                while($resultat=$req->fetch()){
                    echo '<tr>
                    <td><a href="images/'.$resultat['imag'].'">'.$resultat['imag'].'</a></td>
                    <td><a href="musiques/'.$resultat['musique'].'">'.$resultat['musique'].'</a></td>
                    <td><a href="videos/'.$resultat['video'].'">'.$resultat['video'].'</a></td>
                    <td><a href="documents/'.$resultat['pdf'].'">'.$resultat['pdf'].'</a></td>
                    <td>'.$resultat['taille'].'Ko'.'</td>
                    <tr>';
                }
            ?>
            </table><br/>
            <a href="<?php echo "image.php?personne=".$_GET['personne'].""?>"><strong><font size="3px">Accueil</font></strong></a>
        </center>
    </main>
    <br/>
    <footer>
        <center><font size="2px">C2023 Copyright - All rights reserved</font></center>
    </footer>
</body>
</html>