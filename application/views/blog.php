<section class="blogBanner">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1>Blogs</h1>
                <span><a href="<?php echo base_url(); ?>">Home</a> / <a href="<?php echo base_url('blog'); ?>">Blog</a></span>
            </div>
        </div>
    </div>
</section>

<section class="blogList">
    <div class="container">
        <div class="row gy-3">
            <div class="col-xl-9">
                <div class="row g-3">
                <?php
                            if(count((array)$blogs) > 0)
                            {
                            foreach($blogs as $blogsrow){
                                $id = $blogsrow->id;
                        ?>
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="cruise_list">
                            <figure class="wrapper mb-0">
                            <a style="color:#000;" href="<?php echo base_url('blog/'.$blogsrow->s_url); ?>">
                                <img loading="lazy" src="<?php echo base_url('control/assets/images/blog/'.$blogsrow->thumb); ?>" alt="<?php echo $blogsrow->alttag; ?>" width="383" height="402">
                                <figcaption class="position-relative">
                                    <div class="blogListdate">
                                        <p class="my-0 date"><i class="fa-solid fa-calendar-days me-1"></i> <?php echo date("M-d-Y", strtotime($blogsrow->date)); ?></p>
                                    </div>
                                    <h5> <?php echo $blogsrow->subject; ?></h5>
                                    <p class="mt-1"><?php echo substr(strip_tags($blogsrow->description),0,65); ?>...</p>
                                    <div class="cazInfo">
                                        <div>
                                            <a href="<?php echo base_url('blog/'.$blogsrow->s_url); ?>" class="blogLink">Read More <i class="fa-solid fa-arrow-trend-up"></i></a>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
			            </div>
                    </div>
                    <?php }  ?> 
                    <?php }else{ ?>
                                <div class="col-xl-6 col-md-6 col-12"> <h4 class="text-center">Blog Not Found</h4></div>
                            <?php } 
                            ?>
                </div>
            </div>
            <?php
            include("blog-sidebar.php");
            ?>
        </div>
    </div>
</section>