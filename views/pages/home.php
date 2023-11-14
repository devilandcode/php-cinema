<?php
/**
 * @var \App\Kernel\View\ViewInterface $view;
 */
?>

<?php $view->component('start')?>
    <main>
        <div class="container">
            <h3 class="mt-3">Новинки</h3>
            <hr>
            <div class="movies">

                    <?php $view->component('movie'); ?>

            </div>
        </div>
    </main>
<?php $view->component('end')?>