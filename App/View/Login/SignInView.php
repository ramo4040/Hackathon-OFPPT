<?php

namespace App\View\Login;

class SignInView {
    public static function render($errors) {
        ob_start();
?>
        <p>
            Welcome! Please enter your details.
            <br>
            Create an account? <a href="./register">Sign Up</a>
        </p>

        <form method="post" action="./login" class="__input-group">
        <form method="post" action="./login" class="__input-group">
            <div>
                <div>
                    <span><?= $errors['null'] ?? '' ?></span>
                    <div>
                        <div class="input">
                            <input type="text" id="email" name="email" placeholder=" ">
                            <label for="email">Email</label>
                        </div>
                        <span><?= $errors['email'][0] ?? '' ?></span>
                    </div>
                    <div>
                        <div class="input">
                            <input type="text" id="password" name="password" placeholder=" ">
                            <label for="password">Password</label>
                        </div>
                        <span><?= $errors['password'][0] ?? '' ?></span>
                    </div>
                </div>
            </div>
            <div class="__submit">
                <button class="submit" type="submit">Sign In</button>
            </div>
        </form>
        </div>



<?php
        return ob_get_clean();
    }
}
