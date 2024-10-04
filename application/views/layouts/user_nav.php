<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
      <div class="sidebar-sticky pt-5 mt-5">
        <ul class="nav  flex-lg-column">
          <!-- <li class="nav-item">
            <a class="nav-link <?php //echo ($page == "dashboard") ? "active" : ""; ?>" href="<?php //echo base_url('dashboard'); ?>">
              <span data-feather="home"></span>
              Overview <span class="sr-only">(current)</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == "myprofile") ? "active" : ""; ?>" href="<?php echo base_url('myprofile'); ?>">
              <span data-feather="file"></span>
              My Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == "changepassword") ? "active" : ""; ?>" href="<?php echo base_url('changepassword'); ?>">
              <span data-feather="shopping-cart"></span>
              Change Password
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == "mybooking") ? "active" : ""; ?>" href="<?php echo base_url('mybooking'); ?>">
              <span data-feather="users"></span>
              Flight Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == "myhotelbooking") ? "active" : ""; ?>" href="<?php echo base_url('myhotelbooking'); ?>">
              <span data-feather="bar-chart-2"></span>
              Hotel Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('logout'); ?>">
              <span data-feather="layers"></span>
              Logout
            </a>
          </li>
        </ul>

       
      </div>
    </nav>  