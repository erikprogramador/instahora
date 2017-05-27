<div class="hero-head">
    <header class="nav">
        <div class="container">
            <div class="nav-left">
                <a href="/" class="nav-item">
                    <i class="fa fa-superpowers"></i>
                </a>
            </div>
            <span class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </span>
            <div class="nav-right nav-menu">
                <a href="/" class="nav-item">
                    Home
                </a>

                <?php if (auth()->check()): ?>
                    <a href="/profile/username" class="nav-item">
                        My name
                    </a>
                <?php endif; ?>

                <?php if (!auth()->check()): ?>
                    <span class="nav-item">
                        <button class="button is-primary is-inverted" @click="isLogin = !isLogin">
                            <span class="icon">
                                <i class="fa fa-user-o"></i>
                            </span>
                            <span>Register or Login</span>
                        </button>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </header>
</div>
