<!-- Navbar -->
<nav class="navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- BarraLateral -->
        
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Nosotros</a>
        </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" id = "iconoCarrito">
                <!--Icono de carrito de compra -->
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                <span class="badge badge-danger navbar-badge" id="badgeProducto"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id = "listaCarrito">
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <!-- Icono de usuario -->
                <i class="fa fa-user" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <?php
                if (isset($_SESSION['idCliente']) == false) {
                ?>
                    <a href="login.php" class="dropdown-item">
                        <i class="fas fa-door-open mr-2 text-primary"></i>Loguearse
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="registro.php" class="dropdown-item">
                        <i class="fas fa-sign-in-alt mr-2 text-primary"></i>Registrarse
                    </a>
                <?php
                } else {
                ?>
                    <a href="index.php?modulo=usuario" class="dropdown-item">
                        <i class="fas fa-user mr-2 text-primary"></i>Hola <?php echo $_SESSION['nombreCliente']; ?>
                    </a>
                    <form action="index.php" method="post">
                        <button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
                            <i class="fas fa-door-closed mr-2 text-danger"></i>Cerrar sesión
                        </button>
                    </form>
                <?php
                }
                ?>
            </div>
        </li>
    </ul>
</nav>
