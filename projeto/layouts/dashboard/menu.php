<nav class="col-md-2 d-none d-md-block bg-light sidebar position-fixed h-100">
    <div class="sidebar-sticky text-center mt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'productsDashboard.php') echo 'text-warning'; ?>" href="productsDashboard.php">
                    Produtos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'contactUsDashboard.php') echo 'text-warning'; ?>" href="contactUsDashboard.php">
                    Fale Conosco
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'usersDashboard.php') echo 'text-warning'; ?>" href="usersDashboard.php">
                    Usuários
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    Sair
                </a>
            </li>
        </ul>
    </div>
</nav>