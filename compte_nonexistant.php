<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" lang=fr/>
    <title>Cloud-Connection</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <p><center class="titre"><strong><font size="15px">Compte Cloud</font></strong></center></p><br/>
    <p><center class="titre"><strong><font size="3px">Connexion</font></strong></center></p><br/>
    <p><center><strong><font size='2px' solid white>L'utilisateur ou le mot de passe est erroné !</font></strong></center></p>
    <form method="post" action="cloud_perso.php" enctype="multipart/form-data">
        <center class="cadre">
            <label for="utilisateur"><font size="4px">Nom d'utilisateur</font></label><br/>
            <input type="text" name="utilisateur" id="utilisateur" required="required"/><br/><br/><br/>
            <label for="mdp"><font size="4px">Mot de passe</font></label><br/>
            <input type="password" name="mdp" id="mdp" required="required"/><br/><br/>
            <input type="submit" value="Valider"/>
        </center>
        <p><center class="titre"><strong><font size="4px">Pas de compte ?<a href="inscription.php">Inscription</a></font></strong></center></p><br/>
    </form>
</body>
</html>
