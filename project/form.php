<?php session_start(); ?>

<div class="form_wraper_registration">
    <h3 class="form_wraper_registration__title">Registration</h3>

    <form action="create.php" method="post">
        <div class="form_wraper_input">
            <label for="mail">Email</label>
            <input class="form_email" type="email" id="mail" name="login">
            <label for="password">Password</label>
            <input class="form_password" type="password" id="password" name="password">
        </div>
        <button class="form__button" type="submit">Registration</button>
    </form>
</div>
<br>
<br>
<div class="form__wraper__authorisation">
    <h3 class="form__wraper__authorisation__title">Authorisation</h3>
    <form action="auth.php" method="post">
        <div class="form__wraper__input__auth">
            <label for="mail">Email</label>
            <input class="form_email" type="email" id="mail" name="form_email">
            <label for="password">Password</label>
            <input class="form_password" type="password" id="password" name="form_password">
        </div>
        <button class="form__button" type="submit">Authorisation</button>
    </form>
</div>
