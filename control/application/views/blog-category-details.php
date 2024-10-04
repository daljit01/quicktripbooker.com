<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
      
     <div class="row pt-2 pb-2">
        
        <div class="col-sm-9">
		    <h4 class="page-title">Blog Category Details</h4>
		    <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="javaScript:void();">Adeeba Tour & Travels</a></li> -->
            <li class="breadcrumb-item"><a href="javaScript:void();">Blog Details</a></li>
            <?php
            if($Id > 0)
            {
            ?>
            <li class="breadcrumb-item" aria-current="page"><?php echo $Name; ?></li>
            <?php
            }
            ?>            
            <li class="breadcrumb-item active" aria-current="page"><?php echo ($Id > 0) ? "Edit Blog Categories" :"Add Blog Categories"; ?></li>
         </ol>
	   </div>
     <br>
	   <div class="col-sm-3">
     </div>
     </div>
    <!-- End Breadcrumb-->
     <?php
         if(!empty($msg))
            {
             ?>
             <h6 style="color: #9e1a1a;  text-align: center;"><?php echo $msg; ?></h6>
             <?php
            }
            ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header text-uppercase">Category Information</div>
            <div class="card-body">
            <form action="<?php echo base_url('save-blog-category'); ?>" name="blog_category_frm" id="blog_category_frm" method="post" enctype="multipart/form-data">
               <input type="hidden" name="Id" id="carId" value="<?php echo $Id; ?>">
                  <div class="form-group">
                    <label for="input-1">Name</label>
                    <input type="text" value="<?php echo $Name; ?>" placeholder="Name"  class="form-control" name="Name" id="CatName" required>
                </div>
                <div class="form-group">
                    <label for="input-2">Slug</label>
                    <input type="text" class="form-control" placeholder="Slug"  value="<?php echo $Slug; ?>" name="Slug" id="CatSlug" required>
                    <input type="hidden" name="checkurl" id="checkurl" value="0">
                    <label id="check_slug"></label>
                  </div>
                <div class="form-group">
                    <label for="input-2">Is Active</label>
                    <select class="form-control" id="IsActive" name="IsActive">
                        <option value="1" <?php echo ($IsActive == 1) ? "selected='selected'" : "" ?>>Yes</option>
                        <option value="0" <?php echo ($IsActive == 0) ? "selected='selected'" : "" ?>>No</option>
                     </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
                </div>

                
              </div>
            </div>
          </div>
    <!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->
    
</div>