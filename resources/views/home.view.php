<section class="hero is-dark is-fullheight">
    <!-- Hero header: will stick at the top -->

    <?php includeView('layouts/partials/navigation'); ?>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                <?= config('app', 'app-name') ?>
            </h1>
            <h2 class="subtitle">
                The clean Share pictures
            </h2>
        </div>
    </div>
</section>

<register-login :visible="isLogin" @login-close="isLogin = !isLogin"></register-login>
