<?php
                    if(count((array)$latestBlog) > 0)
                            {
                    ?>
            <div class="col-xl-3">
                <div class="blogOptions">
                    <div class="optionItem">
                    <form action="" name="searchfrm" id="searchfrm" method="get">
                            <label for="">Search</label>
                            <div class="d-flex searchBar">
                                <input type="text" require placeholder="Search" name="searchcriteria">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="optionItem">
                        <label for="">Catergories</label>
                        <div class="d-flex flex-wrap mt-2 gy-1">
                            
                            <?php 
                                if(!empty($blogCategories))
                                {
                                 foreach($blogCategories as $blogCategorieRow){
                                    $c_id = $blogCategorieRow->id;
                                ?>
                                <div class="col-auto pl-0 pr-2 pb-2">
                                <a class="categoryText" href="<?php echo base_url('blog/category/'.$blogCategorieRow->slug); ?>"><?php echo ucwords($blogCategorieRow->name); ?></a>
                                <!-- <a class="categoryText">
                                    Some Rando Category
                                </a> -->
                                </div>
                                <?php }
                                 }
                                ?> 
                            
                        </div>
                    </div>
                    <div class="optionItem">
                        <label for="">Latest Posts</label>
                        <ul class="latestPosts mt-2">
                        <?php 
                                if(!empty($latestBlog))
                                {
                                 foreach($latestBlog as $latestBlogRow){
                                    $blog_id = $latestBlogRow->id;
                                ?>
                                <a style="color:#000;" href="<?php echo base_url('blog/'.$latestBlogRow->s_url); ?>">
                            <li>
                                <div class="imgWrapper">
                                <img src="<?php echo base_url('control/assets/images/blog/'.$latestBlogRow->thumb);?>" alt="<?php echo $latestBlogRow->alttag; ?>">
                                </div>
                                <div class="content">
                                    <h5><?php echo $latestBlogRow->subject; ?></h5>
                                    <p><i class="fa-regular fa-clock me-1"></i> <?php echo date("M-d-Y", strtotime($latestBlogRow->date)); ?></p>
                                </div>
                            </li>
                            </a>
                            <?php }
                                 }
                                ?>
                        </ul>
                    </div>
                    <div class="optionItem">
                        <label for="">Tags</label>
                        <div class="d-flex flex-wrap mt-2 gy-1">
                            
                            <?php
                            if(!empty($getTags))
                                {
                                 foreach($getTags as $tagsRow){
                                    $tag_id = $tagsRow->id;
                            ?>
                                <div class="col-auto pl-0 pr-2 pb-2">
                                <a class="categoryText" href="<?php echo base_url('blog/tag/'.$tagsRow->slug); ?>"><?php echo ucwords($tagsRow->name); ?> </a>
                                <!-- <a class="categoryText">
                                    Some Rando Category
                                </a> -->
                                </div>
                                <?php }
                                 }
                                ?> 
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php
                            }
                    ?>