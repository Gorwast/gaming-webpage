<footer class="nk-footer">
    <div class="container">
        <div class="nk-gap-3"></div>
        <div class="row vertical-gap">
            <div class="col-md-6">
                <div class="nk-widget">
                    <h4 class="nk-widget-title text-white">Contactanos</h4>
                    <div class="nk-widget-content">
                        <form action="php/ajax-contact-form.php" class="nk-form nk-form-ajax" novalidate="novalidate">
                            <div class="row vertical-gap sm-gap">
                                <div class="col-md-6">
                                    <input type="email" class="form-control required" name="email" placeholder="Correo *">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control required" name="name" placeholder="Nombre *">
                                </div>
                            </div>
                            <div class="nk-gap"></div>
                            <textarea class="form-control required" name="message" rows="5" placeholder="Mensaje *"></textarea>
                            <div class="nk-gap-1"></div>
                            <button class="nk-btn nk-btn-rounded nk-btn-color-white">
                                <span>Enviar</span>
                                <span class="icon"><i class="ion-paper-airplane"></i></span>
                            </button>
                            <div class="nk-form-response-success"></div>
                            <div class="nk-form-response-error"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="nk-widget">
                    <h4 class="nk-widget-title text-white">En Twitter</h4>
                    <div class="nk-widget-content">
                        <a class="twitter-timeline" data-lang="es" data-height="400" data-theme="dark" href="https://twitter.com/TwitterGaming?ref_src=twsrc%5Etfw">Tweets by TwitterGaming</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-gap-3"></div>
    </div>
    <?php
    include("copyright.inc.php")
    ?>
</footer>