<?php
session_start();

require_once 'User.php';
require_once 'Registration.php';
require_once 'Auth.php';

use ORM\User;
$user = new User();

?>
<?php if (isset($_SESSION['email'])):?>
    <h3 class="form__wraper__auth__title">Здравствуйте!</h3>
    <?php echo $_SESSION['email'];?>
<?php else:?>
    <h3 class="form__wraper__auth_log_in__title">Вы не авторизованы.</h3>
<?php endif;?>

<div class="form__wraper__auth_log_in">
    <?php if(isset($_SESSION['email'])):?>
        <button class="form__button" type="submit"><a href="logout.php">Log out</button>
    <?php else:?>
    <button class="form__button" type="submit"><a href="form.php">Log in</button>
    <?php endif;?>
</div>


<?php
//var_dump($user->all());
//var_dump($user->find(1));
//var_dump($user->create();
?>
