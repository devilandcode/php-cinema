<?php
/**
 * @var \App\Kernel\View\ViewInterface $view;
 * @var \App\Kernel\Session\SessionInterface $session;
 */
?>

<?php $view->component('start')?>
    <div class="container">
        <h1>Register</h1>
        <form action="/register" method="post">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
            <label for="login">Login</label>
            <input type="text" id="login" name="password">
            <input type="submit" value="Register">
        </form>
        <div class="">
                <ul>
                    <?php if ($session->has('email')): ?>
                    <?php foreach ($session->getFlash('email') as $error): ?>
                        <li style="color:red;"><?= $error?></li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($session->has('password')): ?>
                        <?php foreach ($session->getFlash('password') as $error): ?>
                            <li style="color:red;"><?= $error?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
        </div>
    </div>
<?php $view->component('end')?>