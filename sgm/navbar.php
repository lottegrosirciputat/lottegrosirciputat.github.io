<header id="nav-menu" aria-label="navigation bar">
  <div class="container">
    <div class="nav-start">
      <a class="logo" href="../../lsi06/">
        <img src="../include/assets/img/icons/logo.png" width="35" height="35" alt="Inc Logo" />
      </a>
      <nav class="menu">
        <ul class="menu-bar">
          <!-- <li><a class="nav-link" href="../sgm/">Dashboard</a></li> -->
          <li>
            <button class="nav-link dropdown-btn" data-dropdown="dropdown1" aria-haspopup="true" aria-expanded="false" aria-label="discover">
              Patrol
            </button>
            <div id="dropdown1" class="dropdown">
              <ul role="menu">
                <li role="menuitem" id="link">
                  <a class="dropdown-link" href="../applications/sgm_patrol/upload">Upload</a>
                </li>
                <li role="menuitem" id="link">
                  <a class="dropdown-link" href="../applications/sgm_patrol/summary">Summary</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- <li>
            <button class="nav-link dropdown-btn" data-dropdown="dropdown2" aria-haspopup="true" aria-expanded="false" aria-label="discover">
              Inventory
            </button>
            <div id="dropdown2" class="dropdown">
              <ul role="menu">
                <li>
                  <span class="dropdown-link-title">Notsold</span>
                </li>
                <li role="menuitem" id="link">
                  <a class="dropdown-link" href="#branding">Notsold 2 Month</a>
                </li>
                <li role="menuitem" id="link">
                  <a class="dropdown-link" href="#illustrations">Notsold 3 Month</a>
                </li>
              </ul>
            </div>
          </li> -->
          <li><a class="nav-link" href="../include/config/logout_sgm">Logout</a></li>
        </ul>
      </nav>
    </div>

    <div class="nav-end">
      <div class="right-container">
        <!-- <form class="search" role="search">
          <input type="search" name="search" placeholder="Search" />
          <i class="bx bx-search" aria-hidden="true"></i>
        </form> -->
        <h3 style="text-transform: capitalize;"><?= $_SESSION['emp_nm'] ?></h3>
        <a href="#profile">
          <img src="../include/assets/img/user/100065504.jpg" width="35" height="35" alt="user image" />
        </a>
        <!-- <button class="btn btn-primary">Create</button> -->
      </div>

      <button id="hamburger" aria-label="hamburger" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-bars" style="color: #636363;"></i>
      </button>
    </div>
  </div>
</header>