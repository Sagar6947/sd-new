<div class="header header-transparent change-logo">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand static-logo floating_logo" href="./index.php"><img src="assets/images/logo-white.png" class="logo" alt="" /></a>
                <a class="nav-brand fixed-logo" href="#"><img src="assets/images/logo-white.png" class="logo" alt="" /></a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                            <a href="login.php" class="crs_yuo12 w-auto text-white theme-bg">
                                <span class="embos_45"><i class="fas fa-user me-2"></i>Login</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu pabs">
                    <li class=""><a href="<?= base_url() ?>">Home</a>
                    </li>
                    <li><a href="blog.php">Blogs</a>
                    </li>
                    <li><a href="view-services.php">Listing</a>
                    </li>

                    <?php
                    if ($this->session->has_userdata('login_user_id')) {
                    ?>
                        <li><a href="<?= base_url('dashboard') ?>">Dashboard</a>
                        </li>
                    <?php
                    }
                    ?>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <!-- <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#login" class="ft-bold">
                            <i class="fas fa-sign-in-alt me-1 theme-cl"></i>Sign In
                        </a>
                    </li> -->
                    <?php
                    if ($this->session->has_userdata('login_user_id')) {
                    ?>
                        <li class="add-listing gray">
                            <a href="<?= base_url() ?>logout">
                                <i class="lni lni-user mr-1"></i> Logout
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="add-listing gray">
                            <a href="<?= base_url('login') ?>">
                                <i class="lni lni-power-switch mr-1"></i> Login
                            </a>
                        </li>
                    <?php
                    }

                    ?>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="clearfix"></div>