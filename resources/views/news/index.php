<h1>Fun facts about different cities of the world</h1>

<?php foreach ($arr as $key=>$value) : ?>
    <div>
        <h2><a href="<?=route('news.display', ['city' => $key]) ?>"><?= $key ?></a></h2>
    </div>
<?php endforeach; ?>