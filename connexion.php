<?php
$bd = new PDO('mysql:host=localhost; dbname=tp_php_js;charset=utf8','root');
if(isset($_POST['connexion'])){
    if(!empty($_POST['identifient']) AND !empty($_POST['mdp'])){
        $id= htmlspecialchars($_POST['identifient']);
        $pass=$_POST['mdp'];

        $recupAdmin= $bd->prepare('SELECT*FROM admin WHERE identifient = ? AND mot_de_passe = ?');
        $recupAdmin->execute(array($id, $pass));

        if($recupAdmin->rowCount()>0){
            //Rediriger la page
            header('location:tache.html');
        }else{
            echo"Votre mot de passe ou identifient est incorrecte.";
        }
    }else{
        echo"Veuillez vous identifier.";
    }
}
?>