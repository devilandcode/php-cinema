<?php

/**
 * @var \App\Kernel\View\View $view;
 */
?>

<?php $view->component('start')?>
    <h1>Add movie page</h1>

    <form action="/admin/movies/add" method="post">
        <p>Name</p>
        <div class="">
            <input type="text" name="name">
        </div>
        <div class="">
            <button>Add</button>
        </div>
    </form>
<?php $view->component('end')?>