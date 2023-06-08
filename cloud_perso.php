<?php
    require_once('connect.php');
    $existe = 0;
    if(isset($_POST['utilisateur']) and isset($_POST['mdp'])){
        $req=$bdd->query("SELECT * FROM cloud");
        while($donnees = $req->fetch()){
            if($donnees['utilisateur'] == $_POST['utilisateur'] AND $donnees['mdp'] == $_POST['mdp']){
                $existe += 1;
                $_SESSION['nom'] = $donnees['utilisateur'];
            }
        }
        $req->closeCursor();
    }
    if($existe == 0){
        header('Location:compte_nonexistant.php');
    }
    else{
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <meta charset="utf-8" lang=fr/>
            <title>Cloud-<?php echo $_SESSION['nom']; ?></title>
            <link rel="stylesheet" href="style3.css">
        </head>
        <body>
            <header class="haut">
                <p class="haut_gauche"><font size="8px">Bienvenue sur votre cloud "<?php echo $_SESSION['nom']; ?>"</font></p>
                <p class="haut_droit1">
                    <u><strong>Profil</strong></u><br/>
                    Utilisateur: <?php echo $_SESSION['nom']; ?><br/>
                </p>
                <p class="haut_droit2">
                    <?php echo'<img src="uploads/'.$_SESSION['nom'].'.'.'jpg'.' " width="120" height="120">';?>
                </p>
            </header>
            <br/><br/><br/>
            <main class="principal">
                <div>
                    <u><center><font size="5px"><strong>Importer un fichier</strong></font></center></u>
                    <ul class="liens">
                        <li><a class="li" href="<?php echo "image.php?personne=".$_SESSION['nom'].""?>">Fichier image </a>(png. jpeg, jpg, gif)</li>
                        <li><a class="li" href="<?php echo "document.php?personne=".$_SESSION['nom'].""?>">Fichier document </a>(pdf, docx, pptx, txt)</li>
                        <li><a class="li" href="<?php echo "musique.php?personne=".$_SESSION['nom'].""?>">Fichier musique </a>(mp3)</li>
                        <li><a class="li" href="<?php echo "video.php?personne=".$_SESSION['nom'].""?>">Fichier video </a>(mp4)</li><br/>
                        <li><a class="li" href="<?php echo "mon_cloud.php?personne=".$_SESSION['nom'].""?>">Mon cloud</a></li>
                    </ul>
                </div>
            </main>
            <footer>
                <center><font size="2px">C2023 Copyright - All rights reserved</font></center>
            </footer>
        </body>
        </html>  
    <?php
    }                    
    ?>
        