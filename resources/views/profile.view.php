<main class="container">
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title"><?= $user->username ?></h1>
            <h2 class="subtitle"><?= $user->description ?></h2>
            <hr>
        </div>
    </div>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <?php if (!empty($user->pictures)): ?>
                <?php foreach ($user->pictures as $picture): ?>
                    <a href="/picture?picture=<?= $picture->id ?>">
                        <figure class="image is-square">
                            <img src="<?= $picture->path ?>">
                        </figure>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <h3>No pictures found! Publishe your first picture!</h3>
            <?php endif; ?>
        </div>
    </div>
</main>
