<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlo Eusebi">
    <title>Dellasanta Psicologo Fano</title>
    <!-- roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet">
    <!-- font awesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous'>
    <!--  my library -->
    <link rel="stylesheet" href="styles/mylibrary.css" type="text/css">
    <!-- animations -->
    <link rel="stylesheet" href="styles/animations.css" type="text/css">
    <!-- styles.css -->
    <link rel="stylesheet" href="styles/styles.css" type="text/css">

    
    <!-- scripts -->
    <script defer src="app/app.js"></script>
</head>
<body>
    
    <?php
    session_start();
    ?>
    <!-- ! HEADER -->
    <header id="main-header">
        <div class="container d-flex justify-space-between align-center">
            <div id="hdr-logo">
                <a href="https://www.dellasantapsicologo.it" target="_blank">
                    <img class="fluid-img" src="img/Logo.webp" alt="logo del sito">
                </a>
            </div>
            <div id="hamburger-menu" class="m-20">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav id="main-navbar">
                <ul>
                    <li><a class="main-navbar-item active" href="#hero">Home</a></li>
                    <li><a class="main-navbar-item" href="#chi-sono">Chi Sono</a></li>
                    <li><a class="main-navbar-item" href="#cosa-aspettarsi">Cosa aspettarsi dalla Terapia</a></li>
                    <li><a class="main-navbar-item" href="#di-cosa-mi-occupo">Di cosa mi Occupo</a></li>
                    <li><a class="main-navbar-item" href="#contatti">Contatti</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- ! MAIN -->
    <main>

        <!-- # HERO -->
        <section id="hero">
            <div class="container">                
                <div class="col-50">
                    <h3>DR. Dellasanta Federico</h3>
                    <h1>Psicologo Cognitivo Comportamentale</h1>
                    <p class="mb-20">
                        Mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online.
                    </p>
                    <a href="#contattami" class="btn mb-50">Prenota un appuntamento</a>
                </div>
                <div class="col-50">
                    <figure>
                        <img src="img/test.jpg" alt="Il Dottor Dellasanta">
                    </figure>
                </div>
            </div>
        </section>

        <!-- # CHI SONO -->
        <section id="chi-sono" class="text-align-center">
            <div class="container">

                <h3>chi sono</h3>
                <h2>Dr. Federico Dellasanta Psicologo</h2>
                <p class="mb-30">
                    Pratico la professione di <strong>Psicologo Cognitivo Comportamentale</strong> nel mio studio a Fano e online,
                    dove svolgo attività di prevenzione, valutazione psicodiagnostica e sostegno psicologico per bambini, adolescenti e adulti.
                </p>
                <a href="#" class="btn">Scopri di più</a>
            </div>
        </section>

        <!-- # COSA ASPETTARSI DALLA TERAPIA -->
        <section id="cosa-aspettarsi">
            <div class="container d-flex align-center flex-gap20">
                <div class="col-50">

                    <h3>cosa aspettarsi dalla terapia</h3>
                    <h2>L'approccio congitivo-comportamentale</h2>
                    <p class="mb-30">
                        La terapia cognitivo comportamentale rappresenta attualmente uno dei modelli per la comprensione e il trattamento dei disturbi psicopatologici ritenuti più efficaci a livello internazionale.
                    </p>
                    <a href="#" class="btn">scopri di più sulla terapia</a>
                </div>
                <div class="col-50 tablet">
                    <figure>
                        <img src="img/cognitivo-comportamentale-1.svg" alt="Diagramma dell'approccio congitivo-comportamentale">
                    </figure>
                </div>
            </div>
        </section>

        <!-- # DI COSA MI OCCUPO -->
        <section id="di-cosa-mi-occupo" class="text-align-center">
            <h2>Di cosa mi occupo</h2>
            <div class="container d-flex f-wrap flex-gap20">

                <!-- first column -->
                <div class="col">
                    <div class="col-img">
                        <img src="img/Ansia.webp" alt="Disturbi d'ansia e attacchi di panico">
                    </div>
                    <div class="col-text">
                        <h4>Disturbi d'ansia e attacchi di panico</h4>
                        <p>L'ansia si manifesta in modo molto simile alla paura, compare in risposta ad una minaccia futura percepita o situazioni incerte. Anche se una persona su venti soffre quotidianamente di ansia acuta o cronica, si tende a sminuirne l'impatto e molti ne soffrono in silenzio. L'ansia si manifesta con preoccupazione, stato di allerta e vari sintomi fisici, tra cui tachicardia, tremori e senso di soffocamento e può essere molto invalidante per chi ne soffre.</p>
                    </div>
                </div>

                <!-- second column -->
                <div class="col">
                    <div class="col-img">
                        <img src="img/Depressione.webp" alt="Depressione e disturbi dell'umore">
                    </div>
                    <div class="col-text">
                        <h4>Depressione e disturbi dell'umore</h4>
                        <p>Considerata da molti la malattia del secolo, può gravemente limitare il normale svolgimento delle attività quotidiane, fino ad impedirle del tutto. Oltre al classico abbassamento dell'umore, può manifestarsi anche con un calo dell'energia, dell'autostima, cambiamenti nel sonno e nell'appetito, difficoltà di concentrazione, incapacità di provare piacere da attività che in precedenza ne davano e un pattern di pensieri negativi.</p>
                    </div>
                </div>

                <!-- third column -->
                <div class="col">
                    <div class="col-img">
                        <img src="img/Stress-da-lavoro-correlato.webp" alt="Momenti difficili e disturbo dell'adattamento">
                    </div>
                    <div class="col-text">
                        <h4>Momenti difficili e disturbo dell'adattamento</h4>
                        <p>Nella vita succede di dover affrontare problemi e momenti difficili che sembrano essere più grandi di noi. Problemi che ci schiacciano e non ci permettono di andare avanti. Situazioni come lutti, separazioni, divorzi, licenziamenti o malattie di familiari, affrontate da soli possono sembrare ostacoli insormontabili. Chiedi aiuto ad un terapista specializzato nell'affrontare e superare questi momenti.</p>
                    </div>
                </div>

                <!-- fourth column -->
                <div class="col">
                    <div class="col-img">
                        <img src="img/Insonnia-1.webp" alt="Insonnia e disturbi del sonno">
                    </div>
                    <div class="col-text">
                        <h4>Insonnia e disturbi del sonno</h4>
                        <p>È successo a tutti di non riuscire a prendere sonno, di svegliarsi più volte durante la notte o una solta volta ma molto prima della sveglia. Se lo esperiamo in modo frequente non solo inizieremo la giornata con il “piede sbagliato”: la mancanza prolungata di un buon sonno ristoratore, porta con sé mancanza di energie, deficit di attenzione, concentrazione e memoria oltre a un umore instabile e maggiormente irritabile.</p>
                    </div>
                </div>

                <!-- fifth column -->
                <div class="col">
                    <div class="col-img">
                        <img src="img/Autostima.webp" alt="Autostima e sviluppo autoefficacia">
                    </div>
                    <div class="col-text">
                        <h4>Autostima e sviluppo autoefficacia</h4>
                        <p>Se siamo fortunati, fin da bambini ci è stato insegnato ad avere fiducia in noi stessi. Nel corso della vita, tuttavia, l'idea che abbiamo di noi potrebbe deteriorarsi, portandoci a pensare a noi stessi in modo poco lusinghiero o come incapaci di superare alcune difficoltà. Se siamo meno fortunati, la stessa credenza potrebbe essersi formata in modo già distorto. Un'immagine di sè negativa porta a sofferenza e difficoltà di vario tipo.</p>
                    </div>
                </div>

                <!-- first columns -->
                <div class="col">
                    <div class="col-img">
                        <img src="img/Disturbo-personalita.webp" alt="Disturbi della personalità">
                    </div>
                    <div class="col-text">
                        <h4>Disturbi della personalità</h4>
                        <p>Capita che disturbi d'ansia, depressivi e difficoltà nel regolare le proprie emozioni siano solo la punta dell'iceberg. Quando si inizia a notare (o sono gli altri a farlo presente) di vivere sempre lo stesso tipo di problemi nello stesso genere di situazioni o nelle varie relazioni, potrebbe essere utile una valutazione personologica per individuare i tratti di personalità che non ci aiutano in alcune circostanze, ma ci complicano invece un po' la vita, e iniziare a lavorare per una loro flessibilizzazione.
                        </p>
                    </div>
                </div>

                <a class="btn" href="#contattami">Richiedi un appuntamento</a>

            </div>
        </section>

        <!-- # CONTATTAMI -->
        <section id="contattami">
            <div class="container">

                <div class="container d-flex align-center flex-gap20">
                    <div class="col-33">
                        <h3>Hai bisogno di un consulto?</h3>
                        <h2>Contattami</h2>
                        <p class="mb-30">
                            Scrivi le tue informazioni e ti ricontatterò per fissare un primo consulto.
                        </p>
                        <hr class="mb-30">
                        <ul class="fa-ul">
                            <li><a href="https://www.google.it/maps/place/Via+Cavour,+8,+61032+Fano+PU/@43.8403484,13.0176242,17z/data=!3m1!4b1!4m5!3m4!1s0x132d1058e81f0963:0x77cf665ada2f3879!8m2!3d43.8403484!4d13.0198182?shorturl=1" target="_blank">
                                <span class="fa-li"><i class="fa-solid fa-location-dot"></i></span>
                                Via Cavour, 8 61032 Fano PU 
                            </a></li>
                            <li><a href="mailto:dellasanta.federico@gmail.com ">
                            <span class="fa-li"><i class="fa-solid fa-envelope"></i></span>
                            dellasanta.federico@gmail.com 
                        </a></li>
                        <li><a href="tel:375-7345384">
                            <span class="fa-li"><i class="fa-solid fa-phone"></i></span>
                            375 7345384
                        </a></li>
                        <li><a href="https://wa.me/0393757345384">
                            <span class="fa-li"><i class="fa-brands fa-whatsapp"></i></span>
                            Inviami un messaggio
                        </a></li>
                    </ul>
                </div>
                <!-- # FORM -->
                <div class="col-66">
                    <form class="form-card mb-50" method="post" action="send-email.php">
                        <div class="d-flex flex-gap20">
                            
                            <div class="col-50">
                                <label for="name">Il tuo nome:
                                    <input class="clients-data" type="text" name="name" id="name" placeholder="Nome" required>
                                </label>
                                <label for="phone">Il tuo numero di Telefono:
                                    <input class="clients-data" type="number" name="phone" id="phone" placeholder="Numero di Telefono" required>
                                </label>
                                <label for="mail">La tua Email:
                                    <input class="clients-data" type="email" name="mail" id="mail" placeholder="Email" required >
                                </label>
                                <a href="https://www.iubenda.com/privacy-policy/29156312" class="iubenda-link mb-10" target
                                ="_blank">
                                    Normativa sull'utilizzo dei dati personali
                                </a>
                                <label for="norm-cb">                        
                                    <input type="checkbox" name="norm-cb" id="norm-cb" required checked>
                                    Ho letto e accetto la normativa sui dati personali <sup>*</sup>                            
                                </label>
                            </div>
                            <div class="col-50">
                                <textarea name="message" id="message" rows="15" placeholder="Come posso aiutarti?" required>placeholder</textarea>
                                <label for="miele-cb">
                                    <input type="checkbox" id="miele-cb" name="miele-cb">
                                    sei sicuro di voler inviare il messaggio?
                                </label>
                                <input type="submit" class="btn" name="submit" value="invia il messaggio">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if(isset($_SESSION['status']))
            {
                if ($_SESSION['status'] == 'success'){
                    ?>
                    <div class="response success d-flex align-center justify-space-between" >Email inviata correttamente
                        <i class="fa-solid fa-xmark fa-xl"></i></div>
                    <?php
                }else{
                    ?>
                    <div class="response bad d-flex align-center justify-space-between" ><?php echo $_SESSION['status'] ?>
                    <i class="fa-solid fa-xmark fa-xl"></i></div>    
                    <?php
                }
            }
            unset($_SESSION['status']);
            ?>
            </div>
        </section>
        
        <!-- # CONTATTI -->
        <section id="contatti">
            <div class="container d-flex">
                <div class="col-50">
                    <img src="img/Logo-768x191.webp" alt="">
                </div>
                <div class="col-50 d-flex">
                    <div class="col-50">
                        <h4>Link Utili</h4>
                        <ul>
                            <li><a href="#hero">Home</a></li>
                            <li><a href="#chi-sono">Chi sono</a></li>
                            <li><a href="#cosa-aspettarsi">Cosa aspettarsi dalla Terapia</a></li>
                            <li><a href="#di-cosa-mi-occupo">Di cosa mi occupo</a></li>
                            <li><a href="#contattami">Contatti</a></li>
                        </ul>
                    </div>
                    <address class="col50">
                        <h4>Contatti</h4>
                        <ul class="fa-ul">
                            <li><a href="https://www.google.it/maps/place/Via+Cavour,+8,+61032+Fano+PU/@43.8403484,13.0176242,17z/data=!3m1!4b1!4m5!3m4!1s0x132d1058e81f0963:0x77cf665ada2f3879!8m2!3d43.8403484!4d13.0198182?shorturl=1" target="_blank">
                                <span class="fa-li"><i class="fa-solid fa-location-dot"></i></span>
                                Via Cavour, 8 61032 Fano PU 
                            </a></li>
                            <li><a href="mailto:dellasanta.federico@gmail.com ">
                            <span class="fa-li"><i class="fa-solid fa-envelope"></i></span>
                            dellasanta.federico@gmail.com 
                        </a></li>
                        <li><a href="tel:375-7345384">
                            <span class="fa-li"><i class="fa-solid fa-phone"></i></span>
                            375 7345384
                        </a></li>
                        <li><a href="https://wa.me/0393757345384">
                            <span class="fa-li"><i class="fa-regular fa-clock"></i></span>
                            Dalle 9:00 alle 19:00 <br>
                            Lunedì - Venerdi
                        </a></li>
                    </ul>
                    </address>
                </div>
            </div>
        </section>

    </main>

    <!-- ! FOOTER -->
    <footer>
        <div class="container d-flex align-center">
            <div class="copyright">Federico Dellasanta P.I. 02766970418 | © 2022 tutti i diritti riservati</div>
        </div>
    </footer>    
</body>
</html>