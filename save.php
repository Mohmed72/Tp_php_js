<?php 
//connexion à la base
$bd = new PDO('mysql:host=localhost;dbname=tp_php_js','root');

$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//recuperation des donnée de la formulaire
if(isset($_POST['ajouter'])){

    $promotion= $_POST['promotion'];
    $nom= $_POST['nom'];
    $prenom= $_POST['prenom'];
    $age= $_POST['age'];
    $naissance= $_POST['naissance'];
    $email= $_POST['email'];
    $telephone= $_POST['telephone'];
    $annee_certification= $_POST['annee_certification'];
    $photo= $_POST['photo'];
    $matricule = $promotion.matriculeGenere(4);

    if(!empty($promotion) && !empty($nom) && !empty($prenom) && !empty($age) && !empty($naissance) && !empty(
        $email) && !empty($telephone) && !empty($annee_certification) && !empty($photo) && !empty($matricule)){
            //requette preparée
            $requette= $bd->prepare('INSERT INTO certifies(promotion,nom,prenom,age,naissance,email,telephone,
            annee_certification,photo,matricule)VALUES(:promotion, :nom, :prenom, :age, :naissance, :email, :telephone,
             :annee_certification, :photo, :matricule)');

            //faire la liaison entre les données et les variables

            $requette->bindvalue(':promotion',$promotion);
            $requette->bindvalue(':nom',$nom);
            $requette->bindvalue(':prenom',$prenom);
            $requette->bindvalue(':age',$age);
            $requette->bindvalue(':naissance',$naissance);
            $requette->bindvalue(':email',$email);
            $requette->bindvalue(':telephone',$telephone);
            $requette->bindvalue(':annee_certification',$annee_certification);
            $requette->bindvalue(':photo',$photo);
            $requette->bindvalue(':matricule',$matricule);

            //execution de la requette preparée
            $resultat = $requette->execute();

            if(!$resultat){
                echo"non prise en compte";
            }else{
                header("location:index.html");
                echo "<script type=\"text/javascript\"> alert('enregistré')</script>";
            }

        }else{
            echo"Tout les champs sont requis";
        }

}
//Generer le numero matricule
function matriculeGenere($taille){
    $caractere = 'AZERTYUIOPQSDFGHJKLMWXCVBN0123456789';
    $matricule ='';
    $maxIndex = strlen($taille)-1;

    for($i=0;$i<$taille;$i++){
        $randomIndex=rand(0,$maxIndex);
        $matricule.=$caractere[$randomIndex];
    }
        return $matricule;
}


?>