<?php
/**
 * @var \App\Kernel\View\ViewInterface $view;
 */
?>

<?php $view->component('start')?>
    <main>
        <div class="container">
            <h3 class="mt-3" style="text-align: center; color: white;">Admin Panel</h3>
            <hr style="color: white">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4>Movies</h4>
                <a href="/admin/movies/add" class="btn btn-primary d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    <span>Add</span>
                </a>
            </div>
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th scope="col">Preview</th>
                    <th scope="col">Name</th>
                    <th scope="col">Rating</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
<!--                --><?php
//                foreach ($movies as $movie) {
//                    $view->component('admin/movie', ['movie' => $movie]);
//                }
//                ?>
                </tbody>
            </table>

            <hr>

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4>Genres</h4>
                <a href="/admin/categories/add" class="btn btn-primary d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    <span>Add</span>
                </a>
            </div>
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
<!--                --><?php
//                foreach ($categories as $categories) {
//                    $view->component('admin/categories', ['categories' => $categories]);
//                }
//                ?>
                </tbody>
            </table>
        </div>
    </main>
<?php $view->component('end')?>