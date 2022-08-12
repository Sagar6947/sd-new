<div class="goodup-dashboard-wrap gray px-4 py-5">
    <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
        <i class="fas fa-bars me-2"></i>Dashboard Navigation
    </a>
    <div class="collapse" id="MobNav">
        <div class="goodup-dashboard-nav sticky-top">

            <?php
            $get_pro = runQuery("SELECT company_name, company_web_title FROM company WHERE rgid = '" . sessionId('login_user_id') . "' ");
            foreach ($get_pro as $sss) {
                $this->session->set_userdata(array('sahar' => $sss['company_name'], 'web' => $sss['company_web_title']));
            }
            ?>

            <div class="goodup-dashboard-inner dash-nav <?= sessionId('sahar') && sessionId('web') ? "" : "disable"; ?>">
                <?php
                if (!sessionId('sahar') || !sessionId('web')) {
                ?>
                    <div class="disable-msg">
                        <i class="lni lni-lock-alt"></i>
                        <p>Complete your profile to unlock your dashboard</p>
                    </div>
                <?php
                }
                ?>

                <div class="nav-head d-flex justify-content-between align-items-center "><span>Main Navigation</span>
                </div>
                <ul data-submenu-title="Main Navigation">
                    <li class=""><a href="<?= base_url('dashboard') ?>"><i class="lni lni-dashboard me-2"></i>Dashboard</a></li>
                </ul>
                <div class="nav-head d-flex justify-content-between align-items-center border-top"><span>Vcard/Website</span>
                </div>
                <ul data-submenu-title="Vcard/Website">
                    <li><a href="<?= base_url('choose-vcard') ?>"><i class="lni lni-postcard me-2"></i>Vcard Theme</a></li>
                    <li><a href=""><i class="lni lni-circle-plus me-2"></i>Add Section </a></li>
                    <li><a href=""><i class="lni lni-money-protection me-2"></i>Add Payment Details </a></li>
                </ul>
                <div class="nav-head d-flex justify-content-between align-items-center border-top"><span>My Business</span>
                    <div id="business-toggle" class="fas fa-plus"></div>
                </div>
                <ul data-submenu-title="My Business" class="business">
                    <li><a href="<?= base_url('product-list') ?>"><i class="lni lni-files me-2"></i>My Prodcut</a></li>
                    
                    <li><a href=""><i class="lni lni-alarm-clock me-2"></i>Workin Hours</a></li>
                    <li><a href=""><i class="lni lni-coffee-cup me-2"></i>Amenties Options</a></li>
                    <li><a href=""><i class="lni lni-information me-2"></i>About Us</a></li>
                    <li><a href="<?= base_url('enquiry') ?>"><i class="lni lni-list me-2"></i>Enquiry</a></li>
                    <li><a href="<?= base_url('reviews') ?>"><i class="lni lni-star me-2"></i>Reviews</a></li>
                </ul>
                <div class="nav-head d-flex justify-content-between align-items-center border-top"><span>Banners</span>
                    <div id="banner-toggle" class="fas fa-plus"></div>
                </div>
                <ul data-submenu-title="Banners" class="banner">
                    <li><a href=""><i class="lni lni-files me-2"></i>Festive</a></li>
                    <li><a href=""><i class="lni lni-files me-2"></i>Motivational</a></li>
                    <li><a href=""><i class="lni lni-files me-2"></i>Business</a></li>
                </ul>
                <div class="nav-head d-flex justify-content-between align-items-center border-top "><span>My Account</span>
                    <div id="account-toggle" class="fas fa-plus"></div>
                </div>
                <ul data-submenu-title="My Accounts" class="account">
                    <li><a href="<?= base_url('my-profile') ?>"><i class="lni lni-user me-2"></i>My Profile </a></li>
                    <li><a href="<?= base_url('changePassword') ?>"><i class="lni lni-lock-alt me-2"></i>Change Password</a></li>
                    <li><a href="<?= base_url('logout') ?>"><i class="lni lni-power-switch me-2"></i>Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>