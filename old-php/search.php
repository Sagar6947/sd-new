<?php include 'includes/header-link.php';
include 'db_connect.php';
?>





<div id="main-wrapper">


    <!-- Start Navigation -->
    <?php include 'includes/header2.php' ?>
    <!-- End Navigation -->


    <section class="space min gray">
        <div class="container">
            <?php
            if (isset($_GET['listing-name'])) {
                $search_name = mysqli_real_escape_string($conn, $_GET['listing-name']);
            ?>
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="sec_title position-relative text-center mb-5 search_title">
                            <h6 class="mb-0 theme-cl">Showing results for : <h2 class="ft-bold"><?php echo $search_name; ?></h2>
                            </h6>
                        </div>
                    </div>
                </div>
                <?php
                $serch_sql = "SELECT website_subservice.id, website_subservice.name, website_subservice.description, website_subservice.featured FROM website_subservice
            LEFT JOIN company_subcategory ON website_subservice.service_id = company_subcategory.category_id
            WHERE website_subservice.name LIKE '%{$search_name}%' OR website_subservice.description LIKE '%{$search_name}%'";

                $serch_result = mysqli_query($conn, $serch_sql) or die("Query Failed.");
                if (mysqli_num_rows($serch_result) > 0) {
                ?>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <?php include 'filter.php' ?>
                            <!-- Sidebar End -->

                        </div>


                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">

                            <!-- row -->
                            <div class="row justify-content-center gx-3">

                                <?php
                                while ($serch_row = mysqli_fetch_assoc($serch_result)) {
                                ?>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="Goodup-grid-wrap">
                                            <div class="Goodup-grid-upper">
                                                <div class="Goodup-pos ab-left">
                                                    <?php
                                                    if ($serch_row['featured'] == 0) {
                                                    ?>
                                                        <div class="Goodup-featured-tag">Featured</div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="Goodup-grid-thumb">
                                                    <a href="" class="d-block text-center m-auto"><img src="assets/images/default-image.png" class="img-fluid" alt=""></a>
                                                </div>

                                            </div>
                                            <div class="Goodup-grid-fl-wrap">
                                                <div class="Goodup-caption px-3 py-2">

                                                    <h4 class="mb-0 ft-medium medium"><a href="" class="text-dark fs-md"><?php echo $serch_row['name'] ?></a></h4>
                                                    <div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i>Delhi, India</div>
                                                    <div class="Goodup-middle-caption mt-3">
                                                        <!-- <p> <?php echo $serv['description'] ?> </p> -->
                                                        <p> <?php echo mb_strimwidth($serch_row['description'], 0, 10, "...") ?> </p>
                                                    </div>
                                                </div>
                                                <div class="Goodup-grid-footer py-2 px-3">
                                                    <div class="Goodup-ft-first">
                                                        <a href="" class="Goodup-cats-wrap">
                                                            <div class="cats-ico bg-5"><i class="lni lni-eye"></i></div><span class="cats-title">View Now</span>
                                                        </a>
                                                    </div>
                                                    <div class="Goodup-ft-last">
                                                        <div class="Goodup-inline">

                                                            <div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-heart-filled position-absolute"></i></button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                }

                                ?>

                            </div>

                        </div>
                    </div>
            <?php

                } else {
                    echo '<h2 class="ft-bold text-center"> ☹️ Sorry!.. No Result Found</h2>';
                }
            }

            ?>




        </div>
    </section>



    <?php include 'includes/footer.php' ?>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<?php include 'includes/footer-link.php' ?>