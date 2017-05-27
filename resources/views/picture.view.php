<main class="container">
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title">
                <?= $user[0]->username ?>
            </h1>
            <hr>
        </div>
    </div>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <figure class="image is-square">
                <img src="<?= $picture->path ?>">
            </figure>
            <?php if(!empty($picture->description)): ?>
                <hr>
                <small><strong>Published at </strong><?= $picture->created_at ?></small>
                <p><?= $picture->description ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>
