<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Webvio Inhouse CMS</title>
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/summernote/dist/summernote-bs4.css"/>
  <link href="<?php echo base_url();?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="<?php echo base_url();?>assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="<?php echo base_url();?>assets/css/app-style.css" rel="stylesheet"/>
  <!-- skins CSS-->
  <link href="<?php echo base_url();?>assets/css/skins.css" rel="stylesheet"/>
  <!-- skins CSS-->
  <!-- <link href="<?php echo base_url();?>assets/css/skins.css" rel="stylesheet"/> -->
  <link href="<?php echo base_url();?>assets/css/TextboxList.css" rel="stylesheet"/>
  <link href="<?php echo base_url();?>assets/css/TextboxList.Autocomplete.css" rel="stylesheet"/>
 <style>
  .successmsg
  {
    color: #2eb52e;
  }
  .errormsg
  {
    color: #e13a2e;
  }
  </style>
</head>

<body>

  <!-- start loader -->
  <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner"><div class="loader"></div></div></div></div>
  <!-- end loader -->

<!-- Start wrapper-->
<div id="wrapper">

 <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <img src="<?php echo base_url();?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">CMS Admin</h5>
     </a>
   </div>
   <div class="user-details">
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar"><img class="mr-3 side-user-img" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
       <div class="media-body">
       <h6 class="side-user-name"><?php echo $this->session->userdata('name'); ?></h6>
      </div>
       </div>
     <div id="user-dropdown" class="collapse">
      <ul class="user-setting-menu">
     
        <li><a href="<?php echo base_url('auth/changepassword'); ?>"><i class="icon-power"></i> Change Password</a></li>
        <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="icon-power"></i> Logout</a></li>
      </ul>
     </div>
      </div>

      <?php include('menu.php'); ?>

   
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav id="header-setting" class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i><span class="badge badge-primary badge-up">12</span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
         <li class="list-group-item d-flex justify-content-between align-items-center">
          You have 12 new messages
          <span class="badge badge-primary">12</span>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Jhon Deo</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            <small>Today, 4:10 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Sara Jen</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            <small>Yesterday, 8:30 AM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Dannish Josh</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
             <small>5/11/2018, 2:50 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Katrina Mccoy</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet.</p>
            <small>1/11/2018, 2:50 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item text-center"><a href="javaScript:void();">See All Messages</a></li>
        </ul>
        </div>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
    <i class="fa fa-bell-o"></i><span class="badge badge-info badge-up">14</span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
          You have 14 Notifications
          <span class="badge badge-info">14</span>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Registered Users</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="zmdi zmdi-coffee fa-2x mr-3 text-warning"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Received Orders</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="zmdi zmdi-notifications-active fa-2x mr-3 text-danger"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Updates</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item text-center"><a href="javaScript:void();">See All Notifications</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item language">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">Sarajhon Mccoy</h6>
            <p class="user-subtitle">mccoy@example.com</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
<?php echo $contents; ?>
<!--End content-wrapper-->


   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2021 Webvio Inhouse CMS
        </div>
      </div>
    </footer>
	<!--End footer-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">
	
	
	 <p class="mb-0">Header Colors</p>
      <hr>
	  
	  <div class="mb-3">
	    <button type="button" id="default-header" class="btn btn-outline-primary">Default Header</button>
	  </div>
      
      <ul class="switcher">
        <li id="header1"></li>
        <li id="header2"></li>
        <li id="header3"></li>
        <li id="header4"></li>
        <li id="header5"></li>
        <li id="header6"></li>
      </ul>

      <p class="mb-0">Sidebar Colors</p>
      <hr>
	  
      <div class="mb-3">
	    <button type="button" id="default-sidebar" class="btn btn-outline-primary">Default Sidebar</button>
	  </div>
	  
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
	
</div><!--End wrapper-->
  

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="<?php echo base_url();?>assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="<?php echo base_url();?>assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="<?php echo base_url();?>assets/js/app-script.js"></script>

  <!-- Chart js -->
  <script src="<?php echo base_url();?>assets/plugins/Chart.js/Chart.min.js"></script>
  <!--Peity Chart -->
  <script src="<?php echo base_url();?>assets/plugins/peity/jquery.peity.min.js"></script>
  <!-- Index2 js -->
  <!--<script src="<?php echo base_url();?>assets/js/dashboard-service-support.js"></script>-->
  <script src="<?php echo base_url();?>assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
  <script src="<?php echo base_url('assets/js/GrowingInput.js');?>"></script>
  <script src="<?php echo base_url('assets/js/TextboxList.js');?>"></script>
  <script src="<?php echo base_url('assets/js/TextboxList.Autocomplete.js');?>"></script>
  <script src="<?php echo base_url('assets/js/TextboxList.Autocomplete.Binary.js');?>"></script>
  <script>
   $('#summernoteEditor').summernote({
            height: 400,
            tabsize: 2
        });
        $(document).ready(function(){
          $("#subject").on("blur",function(){
            var pagename = $(this).val();
            if(pagename != '')
            {
             // var slug = pagename.replace(/[^a-zA-Zd ]/g, "").replace(/\s/g , "-").toLowerCase();
             var slug = pagename.replace(/\s/g , "-").toLowerCase();
              $("#s_url").val(slug);
            }
           
          });
          $("#Name").on("blur",function(){
            var pagename = $(this).val();
            if(pagename != '')
            {
              var slug = pagename.replace(/[^a-zA-Z ]/g, "").replace(/\s/g , "-").toLowerCase();
              $("#Slug").val(slug);
            }
           
          });
        });

      $(document).ready(function(){
        if($('#blogtags').length > 0)
        {
          new $.TextboxList('#blogtags', {bitsOptions:{editable:{addKeys: 188}}});
        }
        setTimeout(() => {
          var id = $('#carId').val();
          if(id > 0)
          {
            $("#CatSlug").change();
          }
          //alert(id);
        }, 500);
        $("#CatSlug").on("change",function()
        {
          var pagename = $(this).val();
          if(pagename != '')
          {
            // var slug = pagename.replace(/[^a-zA-Zd ]/g, "").replace(/\s/g , "-").toLowerCase();
            var slug = pagename.replace(/\s/g , "-").toLowerCase();
            $("#CatSlug").val(slug);
            var id = $('#carId').val();
            $.ajax({
              method : "GET",
              url : '<?php  echo base_url('blog/check_blog_category');?>',
              data : {slug:slug,id:id},
              success : function(resp){
              // alert(resp);
                var obj = jQuery.parseJSON(resp);
               // alert(obj.status);
                if(obj.status == 1)
                {
                  var respcls = "successmsg";
                  $('#check_slug').removeClass("errormsg");
                  $('#checkurl').val(obj.status);
                }
                else
                {
                  var respcls = "errormsg";
                  $('#check_slug').removeClass("successmsg");
                  $('#checkurl').val(obj.status);
                }
                $('#check_slug').addClass(respcls);
                $('#check_slug').html(obj.messasge);
                
              }
            });
          }
      
        });
        $(".del-blog-category").click(function(){
          var id = $(this).attr('rel');
          var userresp = window.confirm("Are you sure to delete?");
          if(userresp)
          {
            window.location = '<?php echo base_url('delete-blog-category/'); ?>'+id;
          }          
        });
        $("#CatName").on("change",function()
        {
          var pagename = $(this).val();
          if(pagename != '')
          {
            // var slug = pagename.replace(/[^a-zA-Zd ]/g, "").replace(/\s/g , "-").toLowerCase();
            var slug = pagename.replace(/\s/g , "-").toLowerCase();
            var id = $('#carId').val();
            if(id == 0)
            {
              $("#CatSlug").val(slug);
              $("#CatSlug").change();
            }
            
          }
      
        });

      $("#blog_category_frm").validate({
      rules: {
        Name: "required",              
        slug: "required"
      },
      submitHandler: function (form) {
        if($('#checkurl').val() == 1)
        {
          document.blog_category_frm.submit();			
        }
        else
        {
          return false;
        }
        
      }
    });
      $("#blog_frm").validate({
          ignore : [],
          rules: {
            date: "required",              
            subject: "required",              
            s_url: "required"
          },
          submitHandler: function (form) {
            //alert("ddd");
            if($('#checkurl').val() == 1)
            {
              document.blog_frm.submit();			
            }
            else
            {
              return false;
            }
            
          }
        });

        $("#blog_subject").on("change",function()
        {
          var pagename = $(this).val();
          if(pagename != '')
          {
            
            //var slug = pagename.replace(/[^a-zA-Zd ]/g, "").replace(/\s/g , "-").toLowerCase();
            var slug = pagename.replace(/[^a-zA-Zd0-9]/g, '-').toLowerCase();
            
            var id = $('#blogid').val();
            
            if(id == 0)
            {
              //alert(id);
              $("#blog_url").val(slug);
              $("#blog_url").change();
            }
          }
        });

        $("#blog_url").on("change",function()
        {
          var pagename = $(this).val();
          if(pagename != '')
          {
            // var slug = pagename.replace(/[^a-zA-Zd ]/g, "").replace(/\s/g , "-").toLowerCase();
            var slug = pagename.replace(/[^a-zA-Zd0-9]/g , "-").toLowerCase();
            $("#blog_url").val(slug);
            var id = $('#blogid').val();
            $.ajax({
              method : "GET",
              url : '<?php  echo base_url('blog/check_blog_url');?>',
              data : {slug:slug,id:id},
              success : function(resp){
              //alert(resp);
                var obj = jQuery.parseJSON(resp);
               // alert(obj.status);
                if(obj.status == 1)
                {
                  var respcls = "successmsg";
                  $('#check_slug').removeClass("errormsg");
                  $('#checkurl').val(obj.status);
                }
                else
                {
                  var respcls = "errormsg";
                  $('#check_slug').removeClass("successmsg");
                  $('#checkurl').val(obj.status);
                }
                $('#check_slug').addClass(respcls);
                $('#check_slug').html(obj.messasge);
                
              }
            });
          }
      
        });
        
        $("#airlineflightsbooking_cat_frm").validate({
          rules: {
            Name: "required",              
            slug: "required"
          },
          submitHandler: function (form) {
            document.blog_category_frm.submit();		
           /* if($('#checkurl').val() == 1)
            {
              document.blog_category_frm.submit();			
            }
            else
            {
              return false;
            }*/
            
          }
        });
        $("#airlineCatName").keyup(function() {
            //alert('fgfhfh');
            var currentValue = $(this).val();
            var replacedValue = currentValue.replace(/[^a-zA-Z0-9]/g, '-').toLowerCase();
            var id = $('#airlineCarId').val();
            if(id == 0)
            {
              $('#airlineCatSlug').val(replacedValue);
            }
        });

      //go Get a trip
      $("#goGetAtrip_category_frm").validate({
          rules: {
            Name: "required",              
            slug: "required"
          },
          submitHandler: function (form) {
            document.blog_category_frm.submit();		
            
          }
        });
        $("#goGetCatName").keyup(function() {
            //alert('fgfhfh');
            var currentValue = $(this).val();
            var replacedValue = currentValue.replace(/[^a-zA-Z0-9]/g, '-').toLowerCase();
            var id = $('#goGetcatId').val();
            if(id == 0)
            {
              $('#goGetCatSlug').val(replacedValue);
              $("#goGetCatSlug").change();

            }
        });
        $("#goGetCatSlug").on("change",function()
        {
          var pagename = $(this).val();
         
          if(pagename != '')
          {
            var slug = pagename.replace(/[^a-zA-Z0-9]/g , "-").toLowerCase();
            //alert(slug);
            $("#goGetCatSlug").val(slug);
            var id = $('#goGetcatId').val();
            //alert(pagename);
            $.ajax({
              method : "GET",
              url : '<?php  echo base_url('gogetatrip/check_blog_category');?>',
              data : {slug:slug,id:id},
              success : function(resp){
              // alert(resp);
                var obj = jQuery.parseJSON(resp);
               // alert(obj.status);
                if(obj.status == 1)
                {
                  var respcls = "successmsg";
                  $('#check_slug').removeClass("errormsg");
                  
                }
                else
                {
                  var respcls = "errormsg";
                  $('#check_slug').removeClass("successmsg");
                }
                $('#check_slug').addClass(respcls);
                $('#check_slug').html(obj.messasge);
                
              }
            });
          }
        });



      });
      
  </script>
 
 
</body>
</html>
