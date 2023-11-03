<?php
/**
 * @var \App\Kernel\View\ViewInterface $view;
 * @var \App\Kernel\Session\SessionInterface $session;
 */
?>

<?php $view->component('start')?>
<div class="container">
    <h1>Login</h1>
    <form action="/login" method="post">
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
        <label for="login">Login</label>
        <input type="text" id="login" name="password">
        <input type="submit" value="Login">
    </form>
    <div class="">
            <?php if ($session->has('error')): ?>
                    <p style="color:red;"><?= $session->has('error')?></p>
            <?php endif; ?>
    </div>
</div>
<?php $view->component('end')?>
