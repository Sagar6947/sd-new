<?php include 'includes/header-link.php';
include 'db_connect.php';

$blog_id = $_GET['blog'];
?>





<div id="main-wrapper">


    <!-- Start Navigation -->
    <?php include 'includes/header2.php' ?>
    <!-- End Navigation -->

    <section>

        <div class="container">

            <!-- row Start -->
            <div class="row">

                <!-- Blog Detail -->

                <?php
                $blog_id = $_GET['blog'];
                $sql2 = "SELECT * FROM blog WHERE blog_id = {$blog_id}";
                $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");
                if (mysqli_num_rows($result2) > 0) {
                    while ($row = mysqli_fetch_assoc($result2)) {
                ?>
                        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="article_detail_wrapss single_article_wrap format-standard">
                                <div class="article_body_wrap">

                                    <div class="article_featured_image">
                                        <img class="img-fluid" src="uploads/blogs/<?php echo 'blog-min.jpg'; ?>" alt="">
                                    </div>
                                    <div class="article_top_info">
                                        <ul class="article_middle_info">
                                            <li><a href="#"><span class="icons"><i class="ti-calendar"></i></span><?php echo date_format(date_create($row['created_date']), 'd--M--Y') ?></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="post-title"><?php echo $row['blog_name']; ?></h2>
                                    <p><?php echo $row['blog_content'] ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">

                    <!-- Trending Posts -->
                    <div class="single_widgets widget_thumb_post">
                        <h4 class="title">Latest Blog</h4>
                        <ul>

                            <?php
                            $all_blog = "SELECT * FROM `blog`";
                            $blog_result = mysqli_query($conn, $all_blog) or die("Query Failed");
                            if (mysqli_num_rows($blog_result) > 0) {
                                while ($list = mysqli_fetch_assoc($blog_result)) {
                            ?>

                                    <li>
                                        <span class="left">
                                            <img src="uploads/blogs/<?php echo 'blog-min.jpg'; ?>" alt="" class="">
                                        </span>
                                        <span class="right">
                                            <a class="feed-title" href="blog-detail.php?blog=<?php echo $list['blog_id']; ?>"><?php echo $list['blog_name'] ?></a>
                                            <span class="post-date"><i class="ti-calendar"><?php echo date_format(date_create($list['created_date']), ' d-M-Y') ?></i></span>
                                        </span>
                                    </li>
                            <?php
                                }
                            }
                            ?>

                        </ul>
                    </div>

                </div>

            </div>
            <!-- /row -->

        </div>

    </section>

    <?php include 'includes/footer.php' ?>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<?php include 'includes/footer-link.php' ?>