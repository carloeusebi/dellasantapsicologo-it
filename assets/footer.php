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
                        <li><a href="https://wa.me/0393757345384" target="_blank">
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
                <div class="col-50 tablet">
                    <img src="img/Logo-768x191.webp" alt="">
                </div>
                <div class="col-50">
                    <div class="col-50 mb-50">
                        <h4>Link Utili</h4>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/chi-sono">Chi sono</a></li>
                            <li><a href="/cosa-aspettarsi">Cosa aspettarsi dalla Terapia</a></li>
                            <li><a href="/di-cosa-mi-occupo">Di cosa mi occupo</a></li>
                            <li><a href="/contatti">Contatti</a></li>
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
                        <li><a href="https://wa.me/0393757345384" target="_blank">
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
    
    <!-- iubenda -->
    <script type="text/javascript">
var _iub = _iub || [];
_iub.csConfiguration = {"consentOnContinuedBrowsing":false,"cookiePolicyId":29156312,"countryDetection":true,"floatingPreferencesButtonDisplay":"bottom-right","gdprAppliesGlobally":false,"invalidateConsentWithoutLog":true,"perPurposeConsent":true,"siteId":2614419,"whitelabel":false,"lang":"it", "banner":{ "acceptButtonCaptionColor":"#FFFFFF","acceptButtonColor":"#0073CE","acceptButtonDisplay":true,"backgroundColor":"#FFFFFF","closeButtonRejects":true,"customizeButtonCaptionColor":"#4D4D4D","customizeButtonColor":"#DADADA","customizeButtonDisplay":true,"explicitWithdrawal":true,"fontSize":"16px","listPurposes":true,"logo":null,"position":"float-bottom-center","textColor":"#000000","content":"Noi e terze parti selezionate utilizziamo cookie o tecnologie simili per finalità tecniche come specificato nella cookie policy","customizeButtonCaption":"Ulteriori informazioni" }};
</script>
<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>