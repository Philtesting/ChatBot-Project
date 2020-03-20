<?php
$home = 'active';
include('include/header.php');

?>

<?php message_pop();?>

  <!-- Hero section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hero-text">
                    <h2>Retrouvez <span>tous nos conseils</span> <br>dans le domaine bancaire !</h2>
                    <h4>Cours de la monnaie, conversion, meilleur prêt bancaire ...</h4>
                </div>
                <div class="col-md-6">
                    <img src="img/laptop.png" class="laptop-image" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->


    <!-- About section -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6 about-text">
                    <h2>Qu'est qu'un prêt bancaire ?</h2>
                    <p style="text-align: justify;">Un prêt bancaire est une solution de financement, proposée par un organisme de crédit, qui consiste à mettre à disposition de l'emprunteur des fonds pour la réalisation de son projet. Ce projet peut être l'acquisition d'un bien mobilier, immobilier, pour se constituer une épargne ou tout simplement faire face à un imprévu. Dans tous les cas, un prêt bancaire permet d'obtenir assez rapidement des fonds, que l'on rembourse ensuite progressivement, auxquels il faut ajouter des intérêts.</p>
                </div>
            </div>
            <div class="about-img">
                <img src="img/about-img.png" alt="">
            </div>
        </div>
    </section>
    <!-- About section end -->


    <!-- Features section -->
    <section class="features-section spad gradient-bg" id="solution">
        <div class="container text-white">
            <div class="section-title text-center">
                <h2>Nos solutions</h2>
                <p>Notre priorité est de vous fournir une réponse rapide !</p>
            </div>
            <div class="row">
                <!-- feature -->
                <div class="col-md-6 col-lg-4 feature">
                    <i class="ti-headphone-alt"></i>
                    <div class="feature-content">
                        <h4>ChatBot</h4>
                        <p>Rapide et efficace ! Il saura vous répondre à toute demande !  </p>
                    </div>
                </div>
                <!-- feature -->
                <div class="col-md-6 col-lg-4 feature">
                    <i class="ti-wallet"></i>
                    <div class="feature-content">
                        <h4>Bourse</h4>
                        <p>Vous voulez investir ? Nous saurons vous aider à faire vos premiers pas !</p>
                    </div>
                </div>
                <!-- feature -->
                <div class="col-md-6 col-lg-4 feature">
                    <i class="ti-shield"></i>
                    <div class="feature-content">
                        <h4>Sécurité</h4>
                        <p>Vos données seront toujours gardées secrètes !</p>
                    </div>
                </div>                
            </div>
        </div>
    </section>
    <!-- Features section end -->


    <!-- Process section -->
    <section class="process-section spad" id="chatbot">
        <div class="container">
            <div class="section-title text-center">
                <h2>Comment fonctionne le chatbot ?</h2>
            </div>
            <div class="row">
                <div class="col-md-4 process">
                    <div class="process-step">
                        <figure class="process-icon">
                            <img src="img/process-icons/1.png" alt="#">
                        </figure>
                        <h4>Convertisseur de monnaie</h4>
                        <p>Besoin de convertir ? N'hésitez pas à l'utiliser.</p>
                    </div>
                </div>
                <div class="col-md-4 process">
                    <div class="process-step">
                        <figure class="process-icon">
                            <img src="img/process-icons/2.png" alt="#">
                        </figure>
                        <h4>Prêt bancaire</h4>
                        <p>Envie de vous faire une petite folie ? Choisissez la meilleure solution ! </p>
                    </div>
                </div>
                <div class="col-md-4 process">
                    <div class="process-step">
                        <figure class="process-icon">
                            <img src="img/process-icons/3.png" alt="#">
                        </figure>
                        <h4>Choix d'une banque</h4>
                        <p>En ligne ou physique ?  Quels plafonds ... ? Le chatbot saura vous répondre.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Process section end -->


    <!-- Fact section -->
    <section class="fact-section gradient-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="fact">
                        <h2>200</h2>
                        <p>Clients <br /></p>
                        <i class="ti-basketball"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="fact">
                        <h2>1500</h2>
                        <p>messages  <br> par jour</p>
                        <i class="ti-panel"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="fact">
                        <h2>500</h2>
                        <p>Transactions <br> par jours</p>
                        <i class="ti-stats-up"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="fact">
                        <h2>5</h2>
                        <p>ans <br> d'expérience</p>
                        <i class="ti-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fact section end -->


    <!-- Team section -->
    <section class="team-section spad" id="team">
        <div class="container">
            <div class="section-title text-center">
                <h2>Notre équipe</h2>
                <p>Nos experts seront ravis de vous conseiller !</p>
            </div>
        </div>
        <div class="team-members clearfix">
            <!-- Team member -->
            <div class="member">
                <div class="member-text">
                    <div class="member-img set-bg" data-setbg="img/profils/flipe.png"></div>
                    <h2>Philippe Fidalgo</h2>
                    <span>Fondateur / Développeur Web</span>
                </div>
                <div class="member-info">
                    <div class="member-img mf set-bg" data-setbg="img/profils/flipe.png"></div>
                    <div class="member-meta">
                        <h2>Philippe Fidalgo</h2>
                        <span>Fondateur / Développeur Web</span>
                    </div>
                    <p>Ma passion pour le code n'a pas de limite.</p>
                </div>
            </div>
            <!-- Team member -->
            <div class="member">
                <div class="member-text">
                    <div class="member-img set-bg" data-setbg="img/profils/lounis.jpg"></div>
                    <h2>Lounis Bouayad</h2>
                    <span>Co-Fondateur / Développeur Web</span>
                </div>
                <div class="member-info">
                    <div class="member-img mf set-bg" data-setbg="img/profils/lounis.jpg"></div>
                    <div class="member-meta">
                        <h2>Lounis Bouayad</h2>
                        <span>Co-Fondateur / Développeur Web</span>
                    </div>
                    <p>Développeur en herbe.</p>
                </div>
            </div>
            <!-- Team member -->
            <div class="member">
                <div class="member-text">
                    <div class="member-img set-bg" data-setbg="img/profils/kenza.jpg"></div>
                    <h2>Kenza Yahyaoui</h2>
                    <span>Responsable Communication</span>
                </div>
                <div class="member-info">
                    <div class="member-img mf set-bg" data-setbg="img/profils/kenza.jpg"></div>
                    <div class="member-meta">
                        <h2>Kenza Yahyaoui</h2>
                        <span>Responsable Communication</span>
                    </div>
                    <p>La communication est mon domaine !</p>
                </div>
            </div>
            <!-- Team member -->
            <div class="member">
                <div class="member-text">
                    <div class="member-img set-bg" data-setbg="img/profils/cindy.jpg"></div>
                    <h2>Cindy Uwmy</h2>
                    <span>Conseillère</span>
                </div>
                <div class="member-info">
                    <div class="member-img mf set-bg" data-setbg="img/profils/cindy.jpg"></div>
                    <div class="member-meta">
                        <h2>Cindy Uwmy</h2>
                        <span>Conseillère</span>
                    </div>
                    <p>Le domaine bancaire n'a plus de secret !</p>
                </div>
            </div>
            <!-- Team member -->
            <div class="member">
                <div class="member-text">
                    <div class="member-img set-bg" data-setbg="img/profils/cat.jpg"></div>
                    <h2><?php echo $namebot; ?></h2>
                    <span>Mascotte</span>
                </div>
                <div class="member-info">
                    <div class="member-img mf set-bg" data-setbg="img/profils/cat.jpg"></div>
                    <div class="member-meta">
                        <h2><?php echo $namebot; ?></h2>
                        <span>Mascotte</span>
                    </div>
                    <p>Je suis disponible 24h/24h ! A votre service !</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Team section -->



    <!-- Newsletter section -->
    <section class="newsletter-section gradient-bg">
        <div class="container text-white">
            <div class="row">
                <div class="col-lg-7 newsletter-text">
                    <h2>S'inscrire aux Newsletter</h2>
                    <p>Inscrivez-vous à notre actualité et recevez les dernières informations concernant la finance.</p>
                </div>
                <div class="col-lg-5 col-md-8 offset-lg-0 offset-md-2">
                    <form class="newsletter-form">
                        <input type="text" placeholder="Votre email">
                        <button>S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter section end -->


<?php
include('include/footer.php');
?>
