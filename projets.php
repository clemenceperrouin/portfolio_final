<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="proto.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROJETS</title>
</head>
<body>
    <!-- section 6 -> Projets -->
    <section class="section6 pb-5 background">
        <div class="titre font-weight-light pb-5">
            <h4>MES PROJETS <a href="index.php"> <img src="retour.png"  class="pb-1 pl-1" width="25px"></a> </h4>
            <h6>Quelques projets réalisés dans le cadre de ma formation  </h6>

        </div>   
            <div class="row row-cols-1 row-cols-md-4 text-white pl-5 pb-3">
                <div class="col mb-4 pb-2">
                    <div class="card white" style="width: 18rem">
                        <img class="card-img" src="tel.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Jeu du shifumi <span> Python </span></h5>
                            <p class="card-text">Le célèbre jeu de la série à succès The Big Bang Theory : Pierre - Feuille - Ciseaux - Lézard - Spock </p>
                        </div>
                    </div>
                </div>
            
                <div class="col mb-4 pb-2">
                    <div class="card white" style="width: 18rem">
                        <img class="card-img" src="tel5.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Jeu du chaud/froid <span> Python</span></h5>
                            <p class="card-text">Le but de ce jeux : Retrouver un chiffre inconnu avec un nombre d'essais limité, plusieurs niveaux de difficultés sont possibles !</p>
                        </div>
                    </div>
                </div>
                
                <div class="col mb-4 pb-2">
                    <div class="card white" style="width: 18rem">
                        <img class="card-img" src="tel3.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Site web <span> Angular</span></h5>
                            <p class="card-text">Nous avons voulu créer ce site afin de répondre au besoin des étudiants et intervenants chez Campus Academy [...]</p>
                        </div>
                    </div>
                </div>

                <div class="col mb-4 pb-2">
                    <div class="card white" style="width: 18rem">
                        <img class="card-img" src="tel4.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Blackjack <span> PHP</span></h5>
                            <p class="card-text">Qui ne connait pas le blackjack, ce jeu de cartes populaire dans les casinos </p>
                        </div>
                    </div>
                </div>

                <div class="col mb-4 pb-2">
                    <div class="card white" style="width: 18rem">
                        <img class="card-img" src="tel6.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Bataille Navale <span> Pseudo Code</span></h5>
                            <p class="card-text">Le jeu de la bataille navale version Pseudo Code !</p>
                        </div>
                    </div>
                </div>
            </div>  
        </section>

        <footer class="couleur bg-dark">
            <div class="row">
                <div class="col-3">
                    <a class="deco" href="mailto:azerty@gmail.com" target="blank"><img src="mail.png"></a>
                    <a class="deco" href="https://fr.linkedin.com" target="blank"><img src="link.png"></a>
                    
                </div>
                <div class="col-6">
                <p>  &copy clemenceperrouin <?= date("Y") ?> - Tous droits réservés.</p>
                </div>
                <div class="col-3">
                <a href="mentionslegales.php" class="text-white">Mentions Légales</a>
                </div>
            </div>
        </footer>
</body>
</html>