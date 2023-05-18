    <?php
    session_start();

    include 'layouts/head.php';?>
    
        <!-- ! MAIN -->
    <main>

        <!-- # HERO -->
        <header id="hero">
            <div class="container d-flex-lg flex-gap20">                
                <div class="col-50">
                    <h3>DR. Dellasanta Federico</h3>
                    <h1>Psicologo Psicoterapeuta Cognitivo Comportamentale</h1>
                    <p class="mb-20">
                        Mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online.
                    </p>
                    <a href="/contatti" class="btn mb-50">Prenota un appuntamento</a>
                </div>
                <div class="col-50">
                    <figure>
                        <img src="img/test.jpg" alt="Il Dottor Dellasanta">
                    </figure>
                </div>
            </div>
        </header>

        <!-- # CHI SONO -->
        <section id="chi-sono" class="text-align-center">
            <div class="container">

                <h3>chi sono</h3>
                <h2>Dr. Federico Dellasanta Psicologo</h2>
                <p class="mb-30">
                    Pratico la professione di <strong>Psicologo Cognitivo Comportamentale</strong> nel mio studio a Fano e online,
                    dove svolgo attività di prevenzione, valutazione psicodiagnostica e sostegno psicologico per bambini, adolescenti e adulti.
                </p>
                <a href="/chi-sono" class="btn">Scopri di più</a>
            </div>
        </section>

        <!-- # COSA ASPETTARSI DALLA TERAPIA -->
        <section id="cosa-aspettarsi">
            <div class="container d-flex-lg align-center flex-gap20">
                <div class="col-50">

                    <h3>cosa aspettarsi dalla terapia</h3>
                    <h2>L'approccio congitivo-comportamentale</h2>
                    <p class="mb-30">
                        La terapia cognitivo comportamentale rappresenta attualmente uno dei modelli per la comprensione e il trattamento dei disturbi psicopatologici ritenuti più efficaci a livello internazionale.
                    </p>
                    <a href="/cosa-aspettarsi" class="btn">scopri di più sulla terapia</a>
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

                <a class="btn" href="/contatti">Richiedi un appuntamento</a>

            </div>
        </section>
    </main>
    
    <?php include "layouts/form.php" ?>    
    <?php include "layouts/footer.php" ?>    
</body>
</html>