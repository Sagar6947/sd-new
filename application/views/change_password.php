<?php include 'includes/header-link.php'; ?>

<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5">
        <?php include 'includes/dash-side-header.php' ?>
        <div class="goodup-dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium">Change Password</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">Change Password</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">

                        <?php if ($cmsg = $this->session->flashdata('cmsg')) :
                            $cmsg_class = $this->session->flashdata('cmsg_class') ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert  <?= $cmsg_class; ?>"><?= $cmsg; ?></div>
                                </div>
                            </div>
                        <?php
                            $this->session->unset_userdata('cmsg');
                        endif; ?>
                        <br>
                        <form method="post" class="row" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="">Old Password</label>
                                        <input type="text" class="form-control rounded" name="oldpassword" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label class="">New Password</label>
                                        <input type="text" class="form-control rounded" name="password" required>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label class="">Confirm Password</label>
                                        <input type="text" class="form-control rounded" name="confirmpassword" required>
                                    </div>
                                </div>



                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn theme-bg text-light rounded">Update Passowrd</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>



    <?php include 'includes/footer-bottom.php' ?>

</div>

<?php include 'includes/footer-link.php' ?>