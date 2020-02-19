<?php 
    
    //connexion à la bdd 
    include("db.php");

    //si le form a été soumis
    if(!empty($_POST)){
        
        //par défaut, on dit que le form est entièrement valide
        $formIsValid = true;
        
        //on fait un strip_tags pour éviter les attaques XSS
        $firstname = strip_tags($_POST['firstname']);
        $lastname = strip_tags($_POST['lastname']);
        $job = strip_tags($_POST['job']);
        $company = strip_tags($_POST['company']);
        $address = strip_tags($_POST['address']);
        $message = strip_tags($_POST['message']);

        //tableau qui stocke nos éventuels messages d'erreur
        $errors = [];
           
        //validation du nom de famille
        if(empty($lastname) ){
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre nom de famille";
        }

        elseif(mb_strlen($lastname) <= 1){
            $formIsValid = false;
            $errors[] = "Votre nom de famille est très court, veuillez le rallonger";
        }
        elseif(mb_strlen($lastname) > 30){
            $formIsValid = false;
            $errors[] = "Votre nom de famille est trop long, veuillez le racourcir";
        }

        //validationdu prénom
        if(empty($firstname) ){
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre prénom";
        }
        
        elseif(mb_strlen($firstname) <= 1){
            $formIsValid = false;
            $errors[] = "Votre prénom est très court, veuillez le rallonger";
        }
        elseif(mb_strlen($firstname) > 30){
            $formIsValid = false;
            $errors[] = "Votre prénom est trop long, veuillez le racourcir";
        }
        //validation dU JOB
        if(empty($job) ){
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre job";
        }
        
        elseif(mb_strlen($job) <= 1){
            $formIsValid = false;
            $errors[] = "Votre job est très court, veuillez le rallonger";
        }
        elseif(mb_strlen($job) > 50){
            $formIsValid = false;
            $errors[] = "Votre  job est trop long, veuillez le racourcir";
            }

        //validation de l'entreprise
        if(empty($company) ){
            $formIsValid = false;
            $errors[] = "Veuillez renseigner le nom de votre entreprise";
        }
        
        elseif(mb_strlen($company) <= 1){
            $formIsValid = false;
            $errors[] = "le nom de votre entreprise est très court, veuillez le rallonger";
        }
        elseif(mb_strlen($company) > 50){
            $formIsValid = false;
            $errors[] = "le nom de votre entreprise est trop long, veuillez le racourcir";
        }

        //validation de l'adresse
        if(empty($address) ){
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre adresse";
        }
        
        elseif(mb_strlen($address) <= 5){
            $formIsValid = false;
            $errors[] = "votre adresse est très courte, veuillez la rallonger";
        }
        elseif(mb_strlen($address) > 50){
            $formIsValid = false;
            $errors[] = "votre adresse est trop longue, veuillez la racourcir";
        }

        //validation du message
        if(empty($message) ){
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre message";
        }
        
        elseif(mb_strlen($message) <= 1){
            $formIsValid = false;
            $errors[] = "votre message est très court, veuillez le rallonger";
        }
        elseif(mb_strlen($message) > 150){
            $formIsValid = false;
            $errors[] = "votre message est trop long, veuillez le racourcir";
        }

//si il n'y a aucune erreur      
if (empty($errors)){
    
    //on écrit notre requête SQL, pour sauvegarder les données du form
    $sql1 = "INSERT INTO recommandation 
            (firstname, lastname, company, address, job, message, date)
            VALUES 
            (:firstname, :lastname, :company, :address, :job, :message, :date)";
    
    //envoie ma requête SQL au serveur MySQL
    $stmt = $pdo->prepare($sql1);
    
    //demande à MySQL d'exécuter ma requête 
    $stmt->execute([
        ":firstname" => $firstname,
        ":lastname" => $lastname, 
        ":company" => $company,
        ":job" => $job,
        ":address" => $address, 
        ":message" => $message,
        ":date" => date('Y-m-d H:i:s'),
    ]);

}
    
}

  //notre requête sql pour récupérer les messages issus du form
    $sql2 = "SELECT * 
            FROM recommandation
            ORDER BY date DESC";

    //envoie ma requête SQL au serveur MySQL
    $stmt = $pdo->prepare($sql2);

    //demande à MySQL d'exécuter ma requête 
    $stmt->execute();

    //récupère les messages depuis le serveur MySQL
	$messages = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="proto.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PORTFOLIO</title>
</head>
<body class="mt-5">

    <!-- création de la navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand orange" href="#">MENU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#APROPOS">A propos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#COMP">Compétences & Diplômes</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#PROJETS">Projets</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#REC">Recommandations</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#CONTACT">Contacts</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- affichage de mon image-->
    <div>
        <img src="mon_image.png" class="img-fluid image"  alt="oups, l'image ne charge pas">
    </div>
    
    <!-- section 1 -> A propos -->
    <section class = "section1 pb-1 text-white" id="APROPOS">
        <div class="titre text-white font-weight-light pb-3">
            <figure>
                <h4>A PROPOS</h4>        
                <figcaption class="figure-caption text-center text-white">Une brève présentation</figcaption>
            </figure>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-2 ml-3 mr-5 pt-3">
                    <img src="moi.png" class="img-fluid" alt="oups l'image ne charge pas " id="logo"> 
                </div>
                <div class="col-12 col-md-8">
                    <figure class="figure">
                        <p>Clémence Perrouin, </p>   
                        <p>Ayant depuis toujours eu un attrait particulier pour le numérique, j'ai tout naturellement décidé après 
                            l'obtention de mon BAC (scientifique) de me lancer dans l'informatique et plus précisemment dans le developpement.                        </p> 
                        <p>Je suis depuis devenue étudiante en informatique (actuellement en première année) au sein de Campus Academy
                            et grâce aux connaissances acquises durant ma formation, je me permet aujourd'hui de vous présenter ce portfolio 
                            qui vous permettra d'en apprendre un peu plus sur moi. 
                            N'hésitez pas à regarder !
                        </p>    
                        <figcaption class="figure-caption text-right"> <img src="sign.png" class="img-fluid float-right" width="150em" alt="oups l'image ne charge pas " ></figcaption>
                    </figure>   
                </div>
            </div>
        </div>
    </section>
    <!-- section 2 -> Diplomes + Compétences -->
    <section class="section2 pb-2" id="COMP">
    </div>
        <div class="row">
            <div class="col-6">
                <div class="titre font-weight-light">
                    <figure>
                        <h4>MES  DIPLOMES</h4>
                        <figcaption class="figure-caption text-center blue ">Mon parcours</figcaption>
                    </figure><br>
                    <img src="image1.png" class="img-fluid" alt="oups l'image ne charge pas" width="100em">
                </div>
                
                <div class="ml-3 pl-3">
                    <p>DIPLOME CAMBRIDGE<br>
                    (B1 anglais)</p>
                    
                    <p>BACCALAUREAT SCIENTIFIQUE<br>
                    (mention assez bien)<br>
                    (mention européenne anglais)</p>
                </div>
            </div>

            <div class="col-6">
                <div class="titre font-weight-light">
                    <figure>
                        <h4>MES COMPETENCES</h4>
                        <figcaption class="figure-caption text-center blue ">Mes domaines de prédilections</figcaption>
                    </figure><br>
                    <img src="image2.png" class="img-fluid" alt="oups l'image ne charge pas" width="100em">
                </div>
                <div class="ml-3 pl-3">
                    <p>HTML5  CSS3<br>
                    PHP <span>(symfony)</span><br>
                    PYTHON<br> 
                    JAVASCRIPT <span>(angular)</span><br>
                    MYSQL  POSTGRESQL</p>
                </ul>
            </div>
        </div>    
    </section>

    <!-- section 3 -> Projets -->
    <section class="section3 pb-5" id="PROJETS">
        <div class="titre font-weight-light pb-5">
            <figure>
                <h4>MES PROJETS <a href="projets.php" ><img src="aller.png" class="pb-1 pl-1" width="27px"></a></h4>
                <figcaption class="figure-caption text-center blue ">Quelques projets réalisés dans le cadre de ma formation</figcaption>
            </figure>
        </div>


        <div class="card-deck ml-5 mr-5 mb-2 text-white">
            <div class="card white" style="width: 18rem">
                <img class="card-img" src="tel.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Jeu du shifumi <span> Python </span></h5>
                    <p class="card-text">Le célèbre jeu de la série à succès The Big Bang Theory : Pierre - Feuille - Ciseaux - Lézard - Spock </p>
                </div>
            </div>
        

            <div class="card white" style="width: 18rem">
                <img class="card-img" src="tel5.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Jeu du chaud/froid <span> Python</span></h5>
                    <p class="card-text">Le but de ce jeux : Retrouver un chiffre inconnu avec un nombre d'essais limité, plusieurs niveaux de difficultés sont possibles !</p>
                </div>
            </div>

            <div class="card white" style="width: 18rem">
                <img class="card-img" src="tel3.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Site web <span> Angular</span></h5>
                    <p class="card-text">Nous avons voulu créer ce site afin de répondre au besoin des étudiants et intervenants chez Campus Academy, en leur proposant un espace commun regrouppant cours, exercices, plannings [...]</p>
                </div>
            </div>
    
            <div class="card white" style="width: 18rem">
                <img class="card-img" src="tel4.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Blackjack <span> PHP</span></h5>
                    <p class="card-text">Qui ne connait pas le blackjack, ce jeu de cartes populaire dans les casinos </p>
                </div>
            </div>
        </div>
    </section>

    <!-- section 4 -> Recommandations -->
    <section class="section4 pb-5 pt-5"  id="REC">
    <div id="carouselExampleControls" class="carousel slide text-center " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="titre font-weight-light pb-5">
                    <figure>
                        <h4>MES RECOMMANDATIONS</h4>
                        <figcaption class="figure-caption text-center blue ">Faites défiler afin de les visualiser</figcaption>
                    </figure>
                </div>
            </div>
   
    <?php 
        foreach($messages as $message){
            //convertir la date en français
            $timestamp = strtotime($message['date']);
            $dateFr = date("d-m-Y H:i", $timestamp);

        ?>
            <div class="carousel-item ">
                    <h5><?= $message['lastname']  . " " . $message['firstname'] ; ?></h5>
                    <img src="busi.png" width="12px">
                    <p class="align-middle d-inline"> <span><?= $message['job'] ." chez " . $message['company'] ;?></span></p>
                    <br>
                    <img src="gauche.png" width="10px">
                    <p class="d-inline align-middle">  <?= $message['message']; ?></p>
                    <img src="droite.png" width="10px">
                    <br>
                <p class="font-weight-light mt-1">  <?= $dateFr; ?></p>
            </div>
    <?php
        }
    ?>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </section>

    <!-- section 5 -> Contact + Recommandations à écrire -->
    <section class="section2 bg-dark pb-4" id="CONTACT">
        <div class="titre font-weight-light">
        <figure class="figure">
            <h4>CONTACT</h4>
            <figcaption class="figure-caption text-right ">N'hésitez pas à écrire votre propre recommandation</figcaption>
        </figure>
        </div>

        <div class="container couleur">
            <div class="row text-white">
                <div class="col-md-6">
                    <div class="pt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2707.732662028211!2d-1.5853242849989067!3d47.26093067916323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805e95c774b07a3%3A0xf1dfc3464b1e4389!2sIMIE%20-%20Ecole%20informatique%20Nantes!5e0!3m2!1sfr!2sfr!4v1580564618061!5m2!1sfr!2sfr" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div>
                        <p><img src="pos.png" class="img-fluid d-inline " width="20em" alt="oups, l'image ne chare pas"> Nantes, France</p>
                    </div>
                </div>

                <div class="col-md-6 ">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Napoléon"
                            value="<?php if(!empty($_POST['firstname'])){
                                        echo $_POST['firstname'];
                                        } ?>">
                        </div>
                        <div class="form-group col">
                        <label for="lastname">Nom de famille</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Bonaparte"
                            value="<?php if(!empty($_POST['lastname'])){
                                        echo $_POST['lastname'];
                                        } ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="job">Job</label>
                            <input type="text" name="job" id="job"class="form-control" placeholder="Developper"
                                value="<?php if(!empty($_POST['job'])){
                                        echo $_POST['job'];
                                        } ?>">
                        </div>
                        <div class="form-group col">
                            <label for="company">Entreprise</label>
                            <input type="text" name="company" id="company"class="form-control" placeholder="Apple"
                            value="<?php if(!empty($_POST['company'])){
                                        echo $_POST['company'];
                                        } ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="address">Adresse</label>
                            <input type="text"name="address" id="address" class="form-control" placeholder="123 Main St"
                            value="<?php if(!empty($_POST['address'])){
                                        echo $_POST['address'];
                                        } ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="message">Message</label>
                            <textarea type="text" name="message" id="message"class="form-control" placeholder="[...]" rows="3"></textarea>
                        </div>
                    </div>
                   
                    <?php 
                    //affiche les éventuelles erreurs de validations
                    if (!empty($errors)) {
                        echo '<div class="alert alert-danger">';
                        foreach ($errors as $error) {
                            echo '<div>' . $error . '</div>'    ;
                        }
                        echo '</div>';
                    }   
                    
                    if (!empty($_POST)){
                        if (empty($errors)){
                        echo '<div class="alert alert-success">';
                        echo '<div>' . "Votre formulaire à bien été envoyé" . '</div>' ;
                        echo '</div>';
                        }
                    }
                        
                    ?>
                 
                    <button type="submit" class="btn btn-light">Envoyer</button>
                </form>
                </div>
            </div>  
        </div>
    </section>
           
    
    <!-- footer -> Contact + Mentions légales -->
    <footer class="couleur bg-dark">
            <div class="row">
                <div class="col-3">
                    <a class="deco pr-1" href="https://fr.linkedin.com" target="blank"><img src="linkd.png" width="20px"></a>
                    <p class="d-inline align-middle ">Joignez moi sur Linkedin !<p>    
                </div>
                <div class="col-6">
                <p>  &copy clemenceperrouin <?= date("Y") ?> - Tous droits réservés.</p>
                </div>
                <div class="col-3">
                <a href="mentionslegales.php" class="text-white">Mentions Légales</a>
                </div>
            </div>
        </footer>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   
</body>
</html>   