<?php
/**
 * @var \App\Kernel\Storage\StorageInterface $storage
 * @var \App\Models\Movie $movie
 */
?>

<a href="/movie?id=<?php echo $movie->id(); ?>" class="card text-decoration-none movies__item">
    <img src="<?php echo $storage->url($movie->image()) ?>" height="200px" class="card-img-top" alt="MI">
    <div class="card-body">
        <h5 class="card-title"><?php echo $movie->name(); ?></h5>
        <p class="card-text">Rating <span class="badge bg-warning warn__badge">+++</span></p>
        <p class="card-text"><?php echo $movie->description(); ?></p>
    </div>
</a>
