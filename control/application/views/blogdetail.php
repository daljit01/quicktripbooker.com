<style>
    .textboxlist-bit-editable
    {
        border:none !important;
    }
    .textboxlist-bits
    {
        zoom: 1;
        overflow: hidden;
        margin: 0;
        border: none !important;
        padding-bottom: 10px;
        border: 1px solid rgba(255, 255, 255, 0.06);
        background-color: #3a3b3c;
        color: #e4e6eb !important;
    }
    .textboxlist-bit-editable-input {
        background: transparent;
        color: #fff;
        font-size: 1rem;
    }
    
</style>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Blog Add</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
         </ol>
	   </div>
     <br>
			 <?php if ($this->session->flashdata('status') == 1) { ?>
                <h6 style="color: #9e1a1a; text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
            <?php } else {
                ?>
                <h6 style="color: #1e7e34;  text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
                <?php

            }
            ?>
	   <div class="col-sm-3">
      <!-- <div class="btn-group float-sm-right">-->
      <!--  <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>-->
      <!--  <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">-->
      <!--  <span class="caret"></span>-->
      <!--  </button>-->
      <!--  <div class="dropdown-menu">-->
      <!--    <a href="javaScript:void();" class="dropdown-item">Action</a>-->
      <!--    <a href="javaScript:void();" class="dropdown-item">Another action</a>-->
      <!--    <a href="javaScript:void();" class="dropdown-item">Something else here</a>-->
      <!--    <div class="dropdown-divider"></div>-->
      <!--    <a href="javaScript:void();" class="dropdown-item">Separated link</a>-->
      <!--  </div>-->
      <!--</div>-->
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
            <div class="card-body">
            <form action="<?php echo base_url('save-blog'); ?>" name="blog_frm" id="blog_frm" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id; ?>" name="blogid" id="blogid" >
                <div class="form-group">
                    <label for="input-1">Date</label>
                    <input type="date" value="<?php echo $date; ?>" class="form-control" name="date" id="date" required>
                </div>
                
                 <div class="form-group">
                    <label for="input-2">Title</label>
                    <input type="text" class="form-control" value="<?php echo $subject; ?>"  name="subject" id="blog_subject" required>
                </div>
                <div class="form-group">
                    <label for="input-2">URL</label>
                    
                    <input type="text" class="form-control" name="blog_url" id="blog_url" value="<?php echo $s_url; ?>" required>
                   <?php $slug_data = $this->uri->segment(2); ?>
                    <input type="hidden" name="checkurl" id="checkurl" value="<?php if($id > 0){ echo 1; }else{echo 0;} ?>">
                    <label id="check_slug"></label>
                  </div>
                <?php
                if(!empty($thumb))
                {
                ?>
                <div class="form-group">
                    <img height="100px" src="<?php echo $thumb; ?>"/>
                </div>
                <?php   }   ?>
                
                <div class="form-group">
                  <label for="input-8" class="col-sm-2">Select File</label>                  
                  <input type="file" class="form-control" id="thumb" name="thumb" <?php echo ($id == 0) ? "required" : ""; ?> >  
                  <div style="font-size:10px">Image size should be 825x465</div> 
                </div> 
                <div class="form-group">
                    <label for="input-2">Meta Keywords</label>
                    <textarea class="form-control" name="metakeywords" id="metakeywords" required><?php echo $metakeywords; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="input-2">Meta Description</label>
                    <textarea class="form-control" name="metadescription" id="metadescription"required><?php echo $metadescription; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="input-2">Image Alt Tag</label>
                    <textarea class="form-control" name="alttag" id="alttag"required><?php echo $alttag; ?></textarea>
                </div>
                <?php
                    $tag_names = array();
                   // echo $tags."===========";
                    if(is_array($tags))
                    {   
                        $tag_names = array();
                        if(count((array)$tags) > 0)
                        { 
                            foreach($tags as $tag) 
                            {
                                $tag_names[] = $tag->name;
                            }
                        }
                        $tag_string = implode(',', $tag_names);
                    }
                    else
                    {
                        $tag_string = $tags;
                    }
                    
                    
                    //echo $tag_string;
                    ?>
                <div class="form-group">
                    <label for="input-2">Tags</label>
                    <input type="text" class="form-control" name="tags" id="blogtags" value="<?php echo $tag_string; ?>" required>
                </div>
                <div class="form-group">
                    <label for="input-2">Category</label>
                    <!--<input type="text" class="form-control" name="s_url" id="s_url" value="<?php echo $s_url; ?>" required>-->
                    <select name="Category" id="Category" class="form-control" required>
                        <option value="">Select One</option>
                        <?php
                        if(count($blogcategories) > 0)
                        {
                            foreach($blogcategories as $category)
                            {
                        ?>
                            <option value="<?php echo $category->id; ?>" <?php echo ($blogcategory == $category->id) ? "selected='selected'" : ""; ?>><?php echo $category->name; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <textarea class="ckeditor" name="description" id="summernoteEditor"><?php echo $description; ?></textarea>
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