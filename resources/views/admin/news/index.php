<h1>News in admin</h1>
<?php foreach ($newsList as $news) : ?>
    <div>
        <h2><a href="<?= route('news.show', ['id' => $news['id']])?>"><?= $news['title'] ?></a></h2>
        <p><?= $news['description'] ?></p>
    </div>
<?php endforeach; ?>