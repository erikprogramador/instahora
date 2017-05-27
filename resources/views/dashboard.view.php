<main class="container">
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title">All Photos</h1>
            <hr>
        </div>
    </div>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <?php if (!empty($pictures)): ?>
                <?php foreach ($pictures as $picture): ?>
                    <article>
                        <h2 class="subtitle"><a href="/profile?username=<?= $picture->username ?>"><?= $picture->username ?></a></h2>
                        <figure class="image is-square">
                          <img src="<?= $picture->path; ?>">
                        </figure>
                        <?php if (!empty($picture->description)): ?>
                            <hr>
                            <p>
                                <?= $picture->description ?>
                            </p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <h3>No pictures found! Be the first to have a picture published!</h3>
            <?php endif; ?>
        </div>
    </div>
    </main>
