<?php session_start();?>

<div class="form_wraper_registration">
    <h3 class="form_wraper_registration__title">Registration</h3>
    <form action="obj-reg.php" method="post">
        <div class="form_wraper_input">
            <label for="mail">Email</label>
            <input class="form_email" type="email" id="mail" name="email">
            <label for="password">Password</label>
            <input class="form_password" type="password" id="password" name="password">
        </div>
        <button class="form__button" type="submit">Registration</button>
    </form>
</div>
<br>
<br>

<div class="form__wraper__authorisation">
    <?php if(isset($_SESSION['error'])):?>
        <div class="flesh_info"> <?php echo $_SESSION['error'];?> </div>
        <?php unset($_SESSION['error']);?>
    <?php endif;?>
    <h3 class="form__wraper__authorisation__title">Authorisation</h3>
    <form action="obj-auth.php" method="post">
        <div class="form__wraper__input__auth">
            <label for="mail">Email</label>
            <input class="form_email" type="email" id="mail" name="email">
            <label for="password">Password</label>
            <input class="form_password" type="password" id="password" name="password">
        </div>
        <button class="form__button" type="submit"><a href="#"></a> Войти</button>
<!--        --><?php //if(isset($_SESSION['email'])):?>
<!--            <button class="form__button" type="submit"><a href="log-out.php">Выйти</button>-->
<!--        --><?php //else:?>
<!--            <button class="form__button" type="submit">Войти</button>-->
<!--        --><?php //endif;?>

    </form>
</div>
