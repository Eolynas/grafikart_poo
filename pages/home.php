<div class="row">
    <div class="col-8">
        <h1> Je suis la home page </h1>


        <?php foreach (App\Table\Article::getLast() as $post): ?>

            <h2><a href="<?= $post->url ?>"><?= $post->title ?></a></h2>
            <p><em><?= $post->category ?></em></p>
            <?= $post->extrait ?>



        <?php endforeach; ?>

        <p><a href="index.php?p=single">Single</a></p>
    </div>
    
    <div class="col-4">

        <ul>
        <?php foreach (App\Table\Category::all() as $categories): ?>
            <?php var_dump($categories); ?>
            <li><?= $category->url ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>


