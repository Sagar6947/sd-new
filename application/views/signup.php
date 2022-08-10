<?php include 'includes/header-link.php';
?>

<div id="main-wrapper">


    <!-- Start Navigation -->
    <?php include 'includes/header2.php' ?>
    <!-- End Navigation -->
    <section class="gray">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-12">

                    <div class="signup-screen-wrap">
                        <div class="signup-screen-single light">
                            <div class="text-center mb-4">
                                <h4 class="m-0 ft-medium">Create An Account</h4>
                            </div>
                            <?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>
                            <form class="submit-form" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="mb-1">Your Name</label>
                                            <input type="text" class="form-control rounded" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="mb-1">Mobile No <i><span style="color:red;font-size:12px;" id="mainphone"></span></i></label>
                                            <input type="number" class="form-control rounded" name="mobile" maxlength="10" id="company_contact" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1">Email ID</label>
                                    <input type="email" class="form-control rounded" name="email" required>
                                </div>

                                <div class="form-group password">
                                    <label class="mb-1">Password</label>
                                    <input type="password" class="form-control rounded" name="password" required>
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="form-group cpassword">
                                    <label class="mb-1">Confirm Password</label>
                                    <input type="password" class="form-control rounded" name="cpassword" required>
                                    <i class="fas fa-eye"></i>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width bg-sky text-light rounded ft-medium">Sign Up</button>
                                </div>

                                <div class="form-group text-center mt-4 mb-0">
                                    <p class="mb-0">Have You Already An account? <a href="<?= base_url('login') ?>" class="ft-medium text-success">Sign In</a></p>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <?php include 'includes/footer.php' ?>

</div>



<script>
    var err = [];
    $('.form-control').keyup(function() {
        runval();
    });
    $('#check').click(function() {
        runval();
    });

    $(function() {
        $("input[name='mobile']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });

    $('input').attr('autocomplete', 'off');

    const pswrdField = document.querySelector(".submit-form .form-group input[type='password']"),
        toggleIcon = document.querySelector(".submit-form .form-group i");

    toggleIcon.onclick = () => {
        if (pswrdField.type === "password") {
            pswrdField.type = "text";
            toggleIcon.classList.add("active");
        } else {
            pswrdField.type = "password";
            toggleIcon.classList.remove("active");
        }
    }
    const pswrdField2 = document.querySelector(".submit-form .cpassword input[type='password']"),
        toggleIcon2 = document.querySelector(".submit-form .cpassword i");

    toggleIcon2.onclick = () => {
        if (pswrdField2.type === "password") {
            pswrdField2.type = "text";
            toggleIcon2.classList.add("active");
        } else {
            pswrdField2.type = "password";
            toggleIcon2.classList.remove("active");
        }
    }
</script>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<?php include 'includes/footer-link.php' ?>