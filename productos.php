<div class="row mt-1">
                    <?php
                        //ONLY_FULL_GROUP_BY Se desactivo desde mysql ya que la consulta no funcionaba 
                        // con el GROUP BY, esto se menciona en comentario de video15
                        //https://es.stackoverflow.com/questions/158552/error-relacionado-con-sql-mode-only-full-group-by-al-ejecutar-consulta-mysql 
                        //Lo desactive con lo que sale en el link de arriba
                        $where=" where 1=1";
                        $nombre = mysqli_real_escape_string($con,$_REQUEST['nombre']??'');

                        if(empty($nombre)==false){
                            $where ="and nomProducto like '%".$nombre."%'";
                        }

                        $queryCuenta='SELECT COUNT(*) as cuenta FROM Productos  $where ;';
                        $resCuenta=mysqli_query($con,$queryCuenta);
                        $rowCuenta=mysqli_fetch_assoc($resCuenta);
                        $totalRegistros=$rowCuenta['cuenta'];

                        $elementosPorPagina = 6;
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
                                <a href="index.php?modulo=detalleproducto&id=<?php echo $row['idProducto'] ?>" class="btn btn-primary" >Ver</a>
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
