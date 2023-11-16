<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 */
?>

<?php $view->component('start_simple'); ?>

    <main class="form-signin w-100 m-auto">
        <form action="/login" method="post">
            <?php if ($session->has('error')) { ?>
                <div class="alert alert-danger">
                    <?php echo $session->getFlash('error') ?>
                </div>
            <?php } ?>
            <div class="d-flex" style="align-items: center; justify-content: space-between">
                <h2 style="color:white">Login</h2>
                <a href="/" class="d-flex align-items-center mb-5 mb-lg-0 text-white text-decoration-none">
                    <h5 class="m-0"><span class="badge bg-warning warn__badge">IMDB</span></h5>
                </a>
            </div>
            <div class="form-floating mt-3">
                <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="floatingInput"
                        placeholder="E-mail"
                >
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating">
                <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="floatingPassword"
                        placeholder="Password"
                >
                <label for="floatingPassword"">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit"  style="background-color: #ffc107;color:black">Sign In</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; IMDB Lite 2023</p>
        </form>
    </main>

<?php $view->component('end_simple'); ?>