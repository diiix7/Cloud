<!--Enregistrement d'un utilisateur de la page incription-->
<?php
    require_once('connect.php');
    $titre = $_POST['utilisateur'];
    $exist = 0;
    if(isset($_POST['utilisateur']) and isset($_POST['mdp']) and isset($_POST['age'])){
        $rer=$bdd->query("SELECT * FROM cloud");
        while($donnees = $rer->fetch()){
            if($donnees['utilisateur'] == $_POST['utilisateur']){
                $exist += 1;
            }
        }
        $rer->closeCursor();
    }
    if($exist!== 0){
        header('Location:compte_existe_deja.php');
    }
    else{
        $req=$bdd->prepare("INSERT INTO cloud(utilisateur, mdp, age, photo) VALUES(:util, :motdp, :age, :photo)");
        if(isset($_FILES['photo']) AND $_FILES['photo']['error']==0){
            if($_FILES['photo']['size']<=1000000){
                $infosfichier=pathinfo($_FILES['photo']['name']);
                $extention_upload=$infosfichier['extension'];
                $exten_auto=array('png','jpeg','jpg','gif');
                if(in_array($extention_upload,$exten_auto)){
                    move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/'.$titre.'.'.'jpg');
                    $req->execute(array(
                        'util' => $_POST['utilisateur'],
                        'motdp' => $_POST['mdp'],
                        'age' => $_POST['age'],
                        'photo' => $_FILES['photo']['name']
                    ));
                }
            }
        }
    } 
?>
<!---Connection d'un utilisateur inscrit--->
<!DOCTYPE html>  
<html>
<head>
<meta charset="utf-8" lang=fr/>
    <title>Cloud-Connection</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <p><center class="titre"><strong><font size="15px">Compte Cloud</font></strong></center></p><br/>
    <p><center class="titre"><strong><font size="3px">Connexion</font></strong></center></p>
    <form method="post" action="cloud_perso.php" enctype="multipart/form-data">
        <center class="cadre">
            <label for="utilisateur"><font size="4px">Nom d'utilisateur</font></label><br/>
            <input type="text" name="utilisateur" id="utilisateur" required="required"/><br/>
            <hr width="180px" color="black"/><br/><br/>
            <label for="mdp"><font size="4px">Mot de passe</font></label><br/>
            <input type="password" name="mdp" id="mdp" required="required"/><br/>
            <hr width="180px" color="black"/><br/>
            <input type="submit" value="Valider" style="background-color: white; border: skyblue; border-radius: 5px;"/>
        </center><br/>
        <p><center class="titre"><strong><font size="4px">Pas de compte ?<a href="inscription.php">Inscription</a></font></strong></center></p><br/>
    </form>
</body>
</html>
