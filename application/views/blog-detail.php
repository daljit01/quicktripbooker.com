<section class="blogDetail">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="imgWrapper">
                    <img src="<?php echo base_url('control/assets/images/blog/'.$thumb); ?>" alt="<?php echo $alttag; ?>">
                </div>
                <div class="content">
                    <h1><?php echo $subject; ?></h1>
                    <span class="date"><i class="fa-solid fa-calendar-days me-1"></i> <?php echo date("M-d-Y", strtotime($date)); ?></span>
                    <hr>
                    <?php echo $description; ?>
                </div>
            </div>
            <?php
            include("blog-sidebar.php");
            ?>
        </div>
    </div>
</section>