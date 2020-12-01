<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview">
      <a href="/home" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <li class="nav-item">
        <a href="/product" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Product
          </p>
        </a>
      </li>
      <?php if(session()->get('role') == 1) : ?>
      <li class="nav-item">
        <a href="/mahasiswa" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Mahasiswa
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/uploads" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Multi Uploads
          </p>
        </a>
      </li>
      <?php endif; ?>
      <!-- <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="../../index.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v1</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../index2.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v2</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../index3.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dashboard v3</p>
          </a>
        </li>
      </ul> -->
    </li>
    <li class="nav-item">
      <a href="/auth/logout" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
    
    
    <!-- <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tree"></i>
        <p>
          UI Elements
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="../UI/general.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>General</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../UI/icons.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Icons</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../UI/buttons.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Buttons</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../UI/sliders.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Sliders</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../UI/modals.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Modals & Alerts</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../UI/navbar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Navbar & Tabs</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../UI/timeline.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Timeline</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../UI/ribbons.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Ribbons</p>
          </a>
        </li>
      </ul>
    </li> -->
    
    
    <li class="nav-header">EXAMPLES</li>
    <li class="nav-item">
      <a href="../calendar.html" class="nav-link">
        <i class="nav-icon far fa-calendar-alt"></i>
        <p>
          Calendar
          <span class="badge badge-info right">2</span>
        </p>
      </a>
    </li>
    
    
    
    <!-- <li class="nav-item has-treeview menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon far fa-plus-square"></i>
        <p>
          Extras
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="../examples/login.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Login</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/register.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Register</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/forgot-password.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Forgot Password</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/recover-password.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Recover Password</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/lockscreen.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Lockscreen</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/legacy-user-menu.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Legacy User Menu</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/language-menu.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Language Menu</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/404.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Error 404</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/500.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Error 500</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/pace.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Pace</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../examples/blank.html" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>Blank Page</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../starter.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Starter Page</p>
          </a>
        </li>
      </ul>
    </li> -->
  </ul>
</nav>