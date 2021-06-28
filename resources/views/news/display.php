<h1>Fun facts about <?= $key ?></h1>
<?php foreach ($values as $value) : ?>
    <div>
        <h2><a href="<?= route('news.detail', ['city' => $key, 'id' => $value['id']]) ?>"><?= $value['title'] ?></a></h2>
        <p><?= $value['description'] ?></p>
    </div>
<?php endforeach; ?>