<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | Petcare Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
</head>
<body>
 <div class="container">
     <div class="row">
         <div class="col-12">
                <!-- Navbar -->
                <!-- Quitar main-header y barraLateral para quitar espacio vacio de boton de categorias--> 
                <nav class="main-header navbar navbar-expand navbar-dark">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <!-- BarraLateral -->
                        <li class="nav-item">
                            <a class="nav-link nav-item navbar-nav" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>       
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index.php" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link">Nosotros</a>
                        </li>
                    </ul>
                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-3" action="index.php?modulo=productos">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar bg-gray" type="search" placeholder="Search" aria-label="Search" name="nombre" value = <?php echo $_REQUEST['nombre']??'';?>>
                            <input type="hidden" name="modulo" value="productos">
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
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <!--Icono de carrito de compra -->
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                <span class="badge badge-danger navbar-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Brad Diesel
                                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">Call me whenever you can...</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                John Pierce
                                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">I got your message bro</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Nora Silvester
                                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">The subject goes here</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                            </div>
                        </li>
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <!-- Icono de usuario -->
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header">15 Notifications</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                                    <span class="float-right text-muted text-sm">3 mins</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-users mr-2"></i> 8 friend requests
                                    <span class="float-right text-muted text-sm">12 hours</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-file mr-2"></i> 3 new reports
                                    <span class="float-right text-muted text-sm">2 days</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                            </div>
                        </li>
                    </ul>
                </nav> 
                <div class="row mt-1">
                    <?php
                        //ONLY_FULL_GROUP_BY Se desactivo desde mysql ya que la consulta no funcionaba 
                        // con el GROUP BY, esto se menciona en comentario de video15
                        //https://es.stackoverflow.com/questions/158552/error-relacionado-con-sql-mode-only-full-group-by-al-ejecutar-consulta-mysql 
                        //Lo desactive con lo que sale en el link de arriba
                        include_once "admin/db_ecommerce.php";
                        $con = mysqli_connect($host, $user, $dbpass, $db);
                        $where=" where 1=1";
                        $nombre = mysqli_real_escape_string($con,$_REQUEST['nombre']??'');

                        if(empty($nombre)==false){
                            $where ="and nomProducto like '%".$nombre."%'";
                        }

                        $queryCuenta='SELECT COUNT(*) as cuenta FROM Productos  $where ;';
                        $resCuenta=mysqli_query($con,$queryCuenta);
                        $rowCuenta=mysqli_fetch_assoc($resCuenta);
                        $totalRegistros=$rowCuenta['cuenta'];

                        $elementosPorPagina = 3;
                        $totalPaginas=ceil($totalRegistros/$elementosPorPagina);
                        $paginaSel=$_REQUEST['pagina']??false;
                        
                        if($paginaSel==false){
                            $inicioLimite=0;
                            $paginaSel=1;
                        }else{
                            $inicioLimite=($paginaSel-1)*$elementosPorPagina;
                        }
                        $limite ="limit $inicioLimite,$elementosPorPagina ";


                        $query = "SELECT 
                        p.idProducto,
                        p.nomProducto,
                        p.precio,
                        p.stock,
                        ip.imagenProducto
                        FROM
                        Productos AS p
                        INNER JOIN ImagenesProductos AS ip ON ip.idProducto = p.idProducto
                        $where
                        GROUP BY p.idProducto
                        $limite
                        ";
                        $res = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                      <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card border-primary">
                              <img class="card-img-top img-thumbnail" src="data:image/jpeg;base64,<?php echo base64_encode( $row['imagenProducto']); ?>" width="100" height="100" alt=""/>

                              <div class="card-body">




                                <h2 class="card-title"><strong><?php echo $row['nomProducto'] ?></strong></h2>
                                <p class="card-text"><strong>Precio:</strong><?php echo $row['precio'] ?></p>
                                <p class="card-text"><strong>Stock:</strong><?php echo $row['stock'] ?></p>
                                <a href="#" class="btn btn-primary" >Ver</a>
                              </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <?php
                if($totalPaginas>0){
                ?>
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <?php
                            if( $paginaSel!=1 ){
                        ?>
                        <li class="page-item">
                          <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel-1); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <?php
                        }
                        ?>

                        <?php
                        for($i=1;$i<=$totalPaginas;$i++){
                        ?>
                        <li class="page-item <?php echo ($paginaSel==$i)?" active ":" "; ?>">
                            <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                            if( $paginaSel!=$totalPaginas ){
                        ?>
                        <li class="page-item">
                          <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel+1); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                        <?php
                            }
                        ?>
                      </ul>
                    </nav>
                <?php
                }
                ?>
         </div>
     </div>
 </div>    




    <!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
</body>
</html>