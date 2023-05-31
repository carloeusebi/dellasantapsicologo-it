<?php include __DIR__ . '/../components/head.php' ?>
<?php if ($page !== 'home' && $page !== '404') include __DIR__ . '/../components/hero-secondary.php' ?>

<main>
    <?= $content ?>
</main>


<!-- # CONTATTAMI -->
<section id="contattami">
    <div class="container">

        <div class="d-flex-lg flex-gap20 align-end mb-20">
            <div class="col-33 mb-20">
                <h3>Hai bisogno di un consulto?</h3>
                <h2>Contattami</h2>
                <p class="mb-30">
                    Scrivi le tue informazioni e ti ricontatterò per fissare un primo consulto.
                </p>
                <hr class="mb-30">
                <address>
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
                        <li class="mb-0"><a href="https://wa.me/0393757345384" target="_blank">
                                <span class="fa-li"><i class="fa-brands fa-whatsapp"></i></span>
                                Inviami un messaggio
                            </a></li>
                    </ul>
                </address>
            </div>

            <!-- # FORM -->
            <div class="col-66 mb-20">
                <form id="contact-form" method="post">
                    <div class="d-flex-lg flex-gap20">

                        <div class="col-50 p-20-lg d-flex flex-column justify-space-between mb-20">
                            <input class="contact-info" type="text" name="name" id="name" placeholder="Nome" autocomplete="name" <?= (isset($formRefill['name'])) ? "value='{$formRefill['name']}'" : '' ?> equired>

                            <input class="contact-info" type="tel" minlength="7" name="phone" id="phone" placeholder="Numero di Telefono" <?= (isset($formRefill['phone'])) ? "value='{$formRefill['phone']}'" : '' ?> required>

                            <input class="contact-info" type="email" name="mail" id="mail" placeholder="Email" <?= (isset($formRefill['mail'])) ? "value='{$formRefill['mail']}'" : '' ?> required>


                        </div>
                        <div class="col-50 p-20-lg mb-20">
                            <textarea class="contact-info" name="message" id="message" rows="15" placeholder="Come posso aiutarti?" required><?= (isset($formRefill['message'])) ? ($formRefill)['message'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="d-flex-lg flex-gap20">
                        <div class="col-50 p-20-lg">
                            <div>
                                <a href="https://www.iubenda.com/privacy-policy/29156312" class="iubenda-link mb-10" target="_blank">
                                    Normativa sull'utilizzo dei dati personali
                                </a>
                            </div>
                            <input class="c-pointer" type="checkbox" name="norm-cb" id="norm-cb" required>
                            <label for="norm-cb" class="c-pointer"> Ho letto e accetto la normativa sui dati personali <sup>*</sup></label>
                        </div>
                        <div class="col-50 p-20-lg">
                            <input type="checkbox" id="miele-cb" name="miele-cb">
                            <button class="btn unclickable mt-20" name="submit" id="formButton" value="Invia il messaggio">Invia il messaggio</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php unset($formRefill); ?>

        <?php if (isset($status)) : ?>
            <?php if ($status == 'success') : ?>
                <div class="response success mt-20">Email inviata correttamente
                    <i class="fa-solid fa-xmark fa-xl"></i>
                </div>
            <?php else : ?>
                <div class="response bad mt-20"><?php echo $status ?>
                    <i class="fa-solid fa-xmark fa-xl"></i>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</section>

<!-- ! FOOTER -->

<footer>

    <!-- # CONTATTI -->
    <div id="response-anchor"></div>
    <?php if (isset($status)) : ?>
        <script>
            document.getElementById('response-anchor').scrollIntoView(true);
        </script>
        <?php unset($status); ?>
    <?php endif ?>

    <section id="contatti">
        <div class="container d-flex-lg">
            <div class="col-50 tablet">
                <img src="img/Logo-768x191.webp" alt="">
            </div>
            <div class="col-50 d-flex-lg">
                <div class="col-50 mb-50">
                    <h4 class="text-align-start">Link Utili</h4>
                    <ul class="fa-ul underline-on-hover">
                        <li><span class="fa-li"><i class="fa-solid fa-caret-right"></i></span><a href="/">Home</a></li>
                        <li><span class="fa-li"><i class="fa-solid fa-caret-right"></i></span><a href="/chi-sono">Chi sono</a></li>
                        <li><span class="fa-li"><i class="fa-solid fa-caret-right"></i></span><a href="/cosa-aspettarsi">Cosa aspettarsi dalla Terapia</a></li>
                        <li><span class="fa-li"><i class="fa-solid fa-caret-right"></i></span><a href="/di-cosa-mi-occupo">Di cosa mi occupo</a></li>
                        <li><span class="fa-li"><i class="fa-solid fa-caret-right"></i></span><a href="/contatti">Contatti</a></li>
                    </ul>
                </div>
                <div class="col50">
                    <h4 class="text-align-start">Contatti</h4>
                    <address>
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
                            <li> <span class="fa-li"><i class="fa-regular fa-clock"></i></span>
                                Dalle 9:00 alle 19:00 <br>
                                Lunedì - Venerdi
                            </li>
                        </ul>
                    </address>
                </div>
            </div>
        </div>
    </section>

    <div class="ftr-bottom">
        <div class="container d-flex align-center">
            <div class="copyright">Federico Dellasanta P.I. 02766970418 | © 2022 tutti i diritti riservati</div>
        </div>
    </div>
</footer>


<!-- iubenda -->
<script type="text/javascript">
    var _iub = _iub || [];
    _iub.csConfiguration = {
        "consentOnContinuedBrowsing": false,
        "cookiePolicyId": 29156312,
        "countryDetection": true,
        "floatingPreferencesButtonDisplay": "bottom-right",
        "gdprAppliesGlobally": false,
        "invalidateConsentWithoutLog": true,
        "perPurposeConsent": true,
        "siteId": 2614419,
        "whitelabel": false,
        "lang": "it",
        "banner": {
            "acceptButtonCaptionColor": "#FFFFFF",
            "acceptButtonColor": "#0073CE",
            "acceptButtonDisplay": true,
            "backgroundColor": "#FFFFFF",
            "closeButtonRejects": true,
            "customizeButtonCaptionColor": "#4D4D4D",
            "customizeButtonColor": "#DADADA",
            "customizeButtonDisplay": true,
            "explicitWithdrawal": true,
            "fontSize": "16px",
            "listPurposes": true,
            "logo": null,
            "position": "float-bottom-center",
            "textColor": "#000000",
            "content": "Noi e terze parti selezionate utilizziamo cookie o tecnologie simili per finalità tecniche come specificato nella cookie policy",
            "customizeButtonCaption": "Ulteriori informazioni"
        }
    };
</script>
<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8"  async></script>