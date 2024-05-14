<?php

namespace App\View\Login;

define('SCRIPT_ROOT', 'http://localhost/hackathon');

class MainView {
    public static function render($form = null) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>
            <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT ?>/public/css/reset.css">
            <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT ?>/public/css/style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        </head>

        <body>

            <main>


                <header>
                    <div class="__tab">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.9" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        </svg>
                    </div>
                </header>


                <section>
                    <div class="__userInfo">
                        <header>
                            <img src="<?php echo SCRIPT_ROOT ?>/public/images/logo.png" width="120">
                            <h1>Support The Dawah By Contributing In Man Power!</h1>
                        </header>
                        <hr>



                        <?= $form ?>



                    </div>

                    <div class="__image">
                        <p>
                            Following Islam, our purpose in life becomes very clear. It is based upon what Allah has revealed. That is our guiding light to get through life.
                        </p>
                    </div>
                </section>


            </main>


            <script src="<?php echo SCRIPT_ROOT ?>/public/js/script.js"></script>
        </body>

        </html>

<?php
    }
}
