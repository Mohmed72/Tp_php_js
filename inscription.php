<?php 
//connexion à la base
$bd = new PDO('mysql:host=localhost;dbname=tp_php_js','root');

//recuperation des donnée de la formulaire
if(isset($_POST) && !empty($_POST)){
    extract($_POST);
    
    var_dump($_FILES);
    $matricule=$promotion.matriculeGenere(4);
    $photo=$matricule.".".strtolower(pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION));

    $requette= $bd->prepare('INSERT INTO certifies(promotion,nom,prenom,age,naissance,email,telephone,
            annee_certification,photo,matricule)VALUES(?,?,?,?,?,?,?,?,?,?)');

        if($requette->execute([$promotion,$nom,$prenom,$age,$naissance,$email,$telephone,
        $annee_certification,$photo,$matricule])){
            if(move_uploaded_file($_FILES['photo']['tmp_name'],"fichier/".$photo))
            header("location:index.html");
        }else{
            echo"Erreur dans les données";
        }

   

}
//Generer le numero matricule
function matriculeGenere($taille){
    $caractere = 'AZERTYUIOPQSDFGHJKLMWXCVBN0123456789';
    $matricule ='';
    $maxIndex = strlen($caractere)-1;

    for($i=0;$i<$taille;$i++){
        $randomIndex=rand(0,$maxIndex);
        $matricule.=$caractere[$randomIndex];
    }
        return $matricule;
}


?>