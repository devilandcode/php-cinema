<?php
/**
 * @var \App\Kernel\View\ViewInterface $view;
 */
?>

<?php $view->component('start')?>
    <main>
        <div class="container">
            <h3 class="mt-3" style="color:white;">Movie Novelties</h3>
            <hr style="color:white;">
            <div class="movies">

                    <?php $view->component('movie'); ?>

            </div>
        </div>
    </main>
<?php $view->component('end')?>