<ul>
    <li class="<?php echo ($page == "" || $page == "index") ? "select" : ""; ?>"> <a href="<?php echo base_url('/'); ?>" class="show-submenu">Home</a></li>
    <li class="<?php echo ($page == "flight") ? "select" : ""; ?>"> <a href="<?php echo base_url('flight'); ?>" class="show-submenu">Flight</a></li>
    <li class="<?php echo ($page == "hotel") ? "select" : ""; ?>"> <a href="<?php echo base_url('hotel'); ?>" class="show-submenu">Hotel</a></li>
    <li class="<?php echo ($page == "hotel-flight") ? "select" : ""; ?>"> <a href="<?php echo base_url('hotel-flight'); ?>" class="show-submenu">Flight + Hotel</a></li>
    <li class="<?php echo ($page == "about") ? "select" : ""; ?>"> <a href="<?php echo base_url('about'); ?>" class="show-submenu">About Us </a></li>
    <li class="<?php echo ($page == "contact") ? "select" : ""; ?>"><a href="<?php echo base_url('contact'); ?>" class="show-submenu">Contact us </a> </li>
    <li class="<?php echo ($page == "blog") ? "select" : ""; ?>"><a href="<?php echo base_url('blog'); ?>" class="show-submenu">Blog</a> </li>
    <!-- <?php if(empty($this->session->userdata('user_logged_id'))){ ?>
        <li class="<?php //echo ($page == "login") ? "select" : ""; ?>"><a href="<?php //echo base_url('login');?>" class="show-submenu"><i class="fa fa-lock"></i> Login </a> </li>
    <li class="<?php //echo ($page == "signup") ? "select" : ""; ?>"><a href="<?php //echo base_url('signup');?>" class="show-submenu signup"><i class="fa fa-user"></i> Signup</a> </li>							<?php } else{ ?>
            <li class="<?php //echo ($page == "dashboard") ? "active" : ""; ?>"><a href="<?php //echo base_url('dashboard');?>"><i class="fa fa-user"></i> Welcome <?php //echo $this->session->userdata('name'); ?></a></li>
    <?php } ?> -->
</ul>