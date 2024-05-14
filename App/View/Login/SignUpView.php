<?php

namespace App\View\Login;

class SignUpView {
    public static function render($errors) {
        ob_start();

?>
        <p>
            Welcome! Please enter your details.
            <br>
            Already have an account? <a href="./login">Log In</a>
        </p>


        <form method="post" action="./register" class="__input-group" id="formSignUp">
            <div class="--scroll" data-page='0'>
                <div>
                    <div>
                        <div class="input">
                            <input type="text" id="fullname" name="full name" placeholder=" ">
                            <label for="fullname">Full name</label>
                        </div>
                        <span><?= $errors['full_name'][0] ?? '' ?></span>
                    </div>

                    <div>
                        <div class="input">
                            <input type="text" id="email" name="email" placeholder=" ">
                            <label for="email">Email</label>
                        </div>
                        <span><?= $errors['email'][0] ?? '' ?></span>
                    </div>

                    <div>
                        <div class="input">
                            <input type="date" id="age" name="dob">
                        </div>
                        <span><?= $errors['dob'][0] ?? '' ?></span>
                    </div>

                </div>

                <div>
                    <div>
                        <div class="inputGender">
                            <select name="gender" id="">
                                <option>please select gender</option>
                                <option value="women">women</option>
                                <option value="man">man</option>
                            </select>
                        </div>
                        <span><?= $errors['gender'][0] ?? '' ?></span>
                    </div>

                    <div>
                        <div class="input">
                            <input type="text" id="password" name="password" placeholder=" ">
                            <label for="password">Password</label>
                        </div>
                        <span><?= $errors['password'][0] ?? '' ?></span>
                    </div>

                    <div>
                        <div class="input">
                            <input type="text" id="confirm_password" name="confirm password" placeholder=" ">
                            <label for="confirm_password">Confirm password</label>
                        </div>
                        <span><?= $errors['confirm_password'][0] ?? '' ?></span>
                    </div>
                </div>
            </div>
            <div class="__submit">
                <button class="prev hidden" type="button"><i class="bi bi-chevron-left"></i> previous</button>
                <button class="next" type="button">next <i class="bi bi-chevron-right"></i></button>
                <button class="submit hidden" type="submit">Sign up</button>
            </div>
        </form>
        </div>



<?php
        return ob_get_clean();
    }
}
