<!---Page d'inscription au cloud--->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" lang=fr/>
    <title>Cloud-Inscription</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <p><center class="titre"><strong><font size="15px">Compte Cloud</font></strong></center></p><br/>
    <p><center class="titre"><strong><font size="3px">Inscription</font></strong></center></p>
    <form method="post" action="index.php" enctype="multipart/form-data">
        <center class="cadre">
            <label for="utilisateur"><font size="4px">Nom d'utilisateur</font></label><br/>
            <input type="text" name="utilisateur" id="utilisateur" required="required"/>
            <hr width="180px" color="black"/><br/>
            <label for="mdp"><font size="4px">Mot de passe</font></label><br/>
            <input type="password" name="mdp" id="mdp" required="required"/>
            <hr width="180px" color="black"/><br/>
            <label for="age"><font size="4px">Age</font></label><br/>
            <input type="number" name="age" id="age" required="required"/>
            <hr width="180px" color="black"/><br/>
            <label for="file" class="photodeprofil">Photo de Profil (jpg, jpeg, png, gif)</label><br/>
            <input type="file" id="file" name="photo"/><br/><br/>
            <input type="submit" value="Valider" style="background-color: white; border: skyblue; border-radius: 5px;"/>
        </center>
        <p><center class="titre"><strong><font size="4px">Déja un compte ?<a href="index.php">Connexion</a></font></strong></center></p><br/>
        </br>
    </form>
</body>
</html>