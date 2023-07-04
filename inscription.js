let inscription = document.getElementById('inscription');

inscription.addEventListener('submit',function(e){
     let nom = document.getElementById('nom');
     let prenom =document.getElementById('prenom');
     let age = document.getElementById('age');
     let naissance =document.getElementById('naissance');
     let email = document.getElementById('email');
     let telephone = document.getElementById('telephone');
     let promotion = document.getElementById('promotion');
     let annee_certification = document.getElementById('annee_certification');

     if(!nom.value){
        let err = document.getElementById('err');
        err.innerHTML="Veillez remplir tous les champs..";
        err.style.color="red";
        e.preventDefault();
     }

     if(!prenom.value){
        let err = document.getElementById('err');
        err.innerHTML="Veillez remplir tous les champs.";
        err.style.color="red";
        e.preventDefault();
     }
     if(age.value == ""){
        let err = document.getElementById('err');
        err.innerHTML="Veillez remplir tous les champs.";
        err.style.color="red";
        e.preventDefault();
     }

     if(!naissance.value){
        let err = document.getElementById('err');
        err.innerHTML="Veillez remplir tous les champs.";
        err.style.color="red";
        e.preventDefault();
     }

     if(!email.value){
        let err = document.getElementById('err');
        err.innerHTML="Veillez remplir tous les champs.";
        err.style.color="red";
        e.preventDefault();
     }

     if(!telephone.value){
        let err = document.getElementById('err');
        err.innerHTML="Veillez remplir tous les champs.";
        err.style.color="red";
        e.preventDefault();
     }

     if(promotion.value==""){
        let err = document.getElementById('err');
        err.innerHTML="Veillez remplir tous les champs.";
        err.style.color="red";
        e.preventDefault();
     }

     if(annee_certification.value==""){
        let err = document.getElementById('err');
        err.innerHTML="Veillez remplir tous les champs.";
        err.style.color="red";
        e.preventDefault();
     }
})