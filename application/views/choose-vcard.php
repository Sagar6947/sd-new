<?php include 'includes/header-link.php'; ?>
<style>
    input[type="radio"][id^="myCheckbox"] {
        display: none;
    }

    .theme-label {
        border: 1px solid #fff;
        padding: 10px;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .theme-label:before {
        background-color: red;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    .theme-label img {
        width: 200px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    :checked+.theme-label {
        border-color: #ddd;
    }

    :checked+.theme-label:before {
        content: "\f00c";
        background-color: green;
        transform: scale(1);
    }

    :checked+.theme-label img {
        transform: scale(0.9);
        /* box-shadow: 0 0 5px #333; */
        z-index: 999;
    }
</style>

<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5">
        <?php include 'includes/dash-side-header.php' ?>
        <div class="goodup-dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"><?= sessionId('web') ? "Choose Vcard Theme" : "Choose Vcard/Website"; ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">Vcard Theme</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">
                        <form method="POST" id="myform" enctype="multipart/form-data">
                            <?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>

                            <div class="submit-form">
                                <!-- Listing Info -->
                                <?php
                                if (!sessionId('web')) {
                                ?>
                                    <div class="dashboard-list-wraps bg-white rounded mb-4">
                                        <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                            <div class="dashboard-list-wraps-flx">
                                                <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file me-2 theme-cl fs-sm"></i>Vcard Details</h4>
                                            </div>
                                        </div>

                                        <div class="dashboard-list-wraps-body py-3 px-3">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="mb-1">Your Vcard/website URL
                                                            <i><span style="color:red;font-size:12px;" id="web_company_name_msg"></span><span style="color:green;font-size:12px;" id="web_company_name_msgs"></span></i>
                                                        </label>
                                                        <input type="text" class="form-control rounded" placeholder="Enter your Vcard/website URL" name="company_web_title" id="company_web_title" required />
                                                        <label class="mt-2"><span style="color: red;">Note:</span> It won’t be changeable so please choose carefully.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <!-- Select theme -->
                                <div class="dashboard-list-wraps bg-white rounded mb-4">
                                    <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                        <div class="dashboard-list-wraps-flx">
                                            <h4 class="mb-0 ft-medium fs-md"><i class="lni lni-postcard me-2 theme-cl fs-sm"></i>Select theme</h4>
                                          
                                            
                                        </div>
                                    </div>

                                    <div class="dashboard-list-wraps-body py-3 px-3 br-bottom">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group d-flex align-items-center flex-column">
                                                    <span class="mb-1">Style 1</span>
                                                    <input type="radio" name="vcard_style" value="1" id="myCheckbox1" <?= (($selectstyle[0]['vcard_style'] == '1') ? 'checked' : '' )?> />
                                                    <label for="myCheckbox1" class="theme-label fa fa-check"></i> <img src="<?= base_url() ?>assets/images/vcard/style-1.jpg" /></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group d-flex align-items-center flex-column">
                                                    <span class="mb-1">Style 2</span>
                                                    <input type="radio" name="vcard_style" value="2" id="myCheckbox2" <?= (($selectstyle[0]['vcard_style'] == '2') ? 'checked': '') ?> />
                                                    <label for="myCheckbox2" class="theme-label fa fa-check"></i> <img src="<?= base_url() ?>assets/images/vcard/style-2.jpg" /></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group d-flex align-items-center flex-column">
                                                    <span class="mb-1">Style 3</span>
                                                    <input type="radio" name="vcard_style" value="3" id="myCheckbox3" <?= (($selectstyle[0]['vcard_style'] == '3') ? 'checked' : '') ?>/>
                                                    <label for="myCheckbox3" class="theme-label fa fa-check"></i> <img src="<?= base_url() ?>assets/images/vcard/style-3.jpg" /></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 br-top pt-2">
                                            <div class="form-group">
                                                <button type="submit" id="check" class="btn theme-bg rounded text-light"><?= sessionId('sahar') && sessionId('web') ? "Update" : "Submit"; ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <!-- footer -->


        </div>



    </div>


    <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>



    <?php include 'includes/footer-bottom.php' ?>

</div>
<?php include 'includes/footer-link.php' ?>
<script>
    var err = [];
    $('.form-control').keyup(function() {
        runval();
    });
    $('#check').click(function() {
        runval();
    });

    function runval() {
        err = [];
        if (!$('#company_web_title').val()) {
            err.push('true');
            $('#web_company_name_msg').text('Company web name is required');
        } else {
            var str = $('#company_web_title').val();
            // str = str.replace('--', '-');
            str = str.replace(/\W$/, '-');
            $('#company_web_title').val(str);

            $('#web_company_name_msg').text('');
            $.ajax({
                url: "<?= base_url('home/getvalue') ?>",
                method: "POST",
                data: {
                    nm: str
                },
                success: function(data) {
                    console.log(data)
                    if (data == 'Y') {
                        $('#web_company_name_msgs').text('Username is Available');
                        $('#web_company_name_msg').text('');
                    } else {
                        err.push('true');
                        $('#web_company_name_msg').text('Username Not Available');
                        $('#web_company_name_msgs').text('');
                    }

                }
            });

        }
    }

    // $(document).on('', '#company_web_title', function() {

    // });

    $(document).on('change', '#state', function() {
        var state = $(this).val();
        $.ajax({
            method: "POST",
            url: "<?= base_url('home/getcity') ?>",
            data: {
                state: state
            },
            success: function(response) {
                // console.log(response);
                $('#city').html(response);
            }
        });
    });

    $(document).on('change', '#company_category', function() {
        var company_category = $(this).val();
        $.ajax({
            method: "POST",
            url: "<?= base_url('home/select_subcat') ?>",
            data: {
                company_category: company_category
            },
            success: function(datas) {
                // console.log(response);
                $('#company_subcategory').html(datas);
            }
        });
    });



    Dropzone.options.singleLogo = {
        maxFiles: 1,
        accept: function(file, done) {
            console.log("uploaded");
            done();
        },
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                alert("No more files please!");
            });
        }
    };

    Dropzone.options.featuredImage = {
        maxFiles: 1,
        accept: function(file, done) {
            console.log("uploaded");
            done();
        },
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                alert("No more files please!");
            });
        }
    };

    Dropzone.options.gallery = {
        accept: function(file, done) {
            console.log("uploaded");
            done();
        },
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                alert("No more files please!");
            });
        }
    };
</script>