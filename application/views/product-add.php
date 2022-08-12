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
                        <h1 class="ft-medium"><?= $tag ?> product</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl"><?= $tag ?> Product</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">

                        <form method="post" class="row" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">Item Name</label>
                                        <input type="text" class="form-control rounded" name="product_title" value="<?= (($tag == 'Edit') ? $product_list['0']['product_title'] : '') ?>" placeholder="Enter name" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">Category</label>
                                        <select name="product_subcate" class="form-control">

                                            <option value="">Select Category</option>
                                            <?php
                                            foreach ($subcate as $row) {
                                            ?>
                                                <option value="<?= $row['subcategory'] ?>" <?php if ($tag == 'Edit') { ?> <?= (($row['subcategory'] == $product_list['0']['product_subcate'] ? 'selected' : '')) ?> <?php } ?>>
                                                    <?= $row['subcategory'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">Image</label>
                                        <input type="file" class="form-control rounded" name="product_image_temp" />
                                        <?php if ($tag == 'Edit') { ?>
                                            <input type="hidden" class="form-control" name="product_image" value="<?= $product_list[0]['product_image']  ?>" />
                                            <img src="<?= base_url() ?>uploads/product/<?= $product_list[0]['product_image'] ?>" width="100px" />
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">Price</label>
                                        <input type="text" class="form-control rounded" placeholder="₹399" name="product_price" value="<?= (($tag == 'Edit') ? $product_list['0']['product_price'] : '') ?>" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">Offer Price</label>
                                        <input type="text" class="form-control rounded" placeholder="₹350" name="offer_price" value="<?= (($tag == 'Edit') ? $product_list['0']['offer_price'] : '') ?>" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">discount Percent</label>
                                        <input type="number" class="form-control rounded" placeholder="10%" name="price_discount" value="<?= (($tag == 'Edit') ? $product_list['0']['price_discount'] : '') ?>" />
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">About Item</label>
                                        <textarea class="form-control rounded ht-80" name="product_description" placeholder="Describe your Product"><?= (($tag == 'Edit') ? $product_list['0']['product_description'] : '') ?></textarea>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn theme-bg text-light rounded"><?= $tag ?> Product</button>
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