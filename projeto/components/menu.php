<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.html">
              <span> Feane </span>
            </a>

            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'menu.php') echo 'active'; ?>">
                        <a class="nav-link" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'active'; ?>">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <div class="user_option">
                    <a href="login.php" class="order_online"> Login </a>
                </div>
            </div>
        </nav>
    </div>
</header>