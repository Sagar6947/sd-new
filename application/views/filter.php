<div class="bg-white rounded mb-4 fliter-box">

    <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
        <h4 class="ft-medium fs-lg mb-0">Filter</h4>
        <div class="ssh-header">
            <a href="javascript:void(0);" class="clear_all ft-medium text-muted">Clear All</a>
            <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="lni lni-text-align-right"></i></a>
        </div>
    </div>

    <!-- Find New Property -->
    <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
        <div class="search-inner">

            <div class="side-filter-box">
                <div class="side-filter-box-body">

                    <!-- Suggested -->
                    <div class="inner_widget_link">
                        <h6 class="ft-medium">Suggested</h6>
                        <ul class="no-ul-list filter-list">
                            <li>
                                <input id="a1" class="checkbox-custom" name="open" type="checkbox">
                                <label for="a1" class="checkbox-custom-label">Open Now</label>
                            </li>
                            <li>
                                <input id="a2" class="checkbox-custom" name="reservations" type="checkbox">
                                <label for="a2" class="checkbox-custom-label">Featured</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Features -->
                    <div class="inner_widget_link">
                        <h6 class="ft-medium">categories</h6>
                        <form action="" method="GET">
                            <ul class="no-ul-list filter-list category-list">

                                <?php
                                foreach ($category as $row1) {
                                ?>
                                    <li>
                                        <input id="<?php echo $row1['cate_id']; ?>" value="<?php echo $row1['cate_id']; ?>" class="checkbox-custom" name="category[]" type="checkbox">
                                        <label for="<?php echo $row1['cate_id']; ?>" class="checkbox-custom-label"><?php echo $row1['category']; ?></label>
                                        <?php
                                        $num = getNumRows('website_subservice', array('service_id' => $row1['cate_id']));
                                        echo '<label class="text-muted">' . $num . '</label>';
                                        ?>
                                    </li>

                                <?php
                                }
                                ?>

                            </ul>
                    </div>
                    <div class="form-group filter_button">
                        <button type="submit" class="btn theme-bg text-light rounded full-width">Show</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>