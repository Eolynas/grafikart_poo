<?php

$post = $db->prepare('SELECT * FROM blog WHERE id = ?', [$_GET['id']], 'App\Table\Article', true);

?>
<h1> <?= $post->title ?></h1>
<p><?= $post->content ?></p>

<p><a href="index.php">Retour à la home page</a></p>




