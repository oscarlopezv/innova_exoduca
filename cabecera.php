<?php
// session_start();
include_once("php/conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);
$queryrpendientes="select *,CONCAT(tnombres,' ',tapellidos) titular1,CONCAT(tnombres2,' ' ,tapellidos2) titular2 from reservas a 
inner join htrabajo b on a.contrato=b.idhtrabajo
where estado='RESERVADO' and fechaida between date(now()) and DATE_ADD(date(now()), INTERVAL 5 DAY)";

$resultado = $dbh->prepare($queryrpendientes);
$resultado->execute();

$numrpen  = $resultado->fetch();


$querycpendientes="select a.* from contrato_pagos a 
inner join htrabajo b on a.contrato=b.idhtrabajo
where  a.fecha between  date(now()) and DATE_ADD(date(now()), INTERVAL 1 DAY)";

$resultado = $dbh->prepare($querycpendientes);
$resultado->execute();

$numcpen = $resultado->fetchColumn();
?>


<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/flaec.png" alt=""><?php echo $_SESSION["usuario-name"] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="contrasena.php"><i class="fa fa-cogs pull-right"></i> Cambio de contraseña</a></li>
                    
                    <li><a href="php/login-out.php?id=sign-out"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                <!--
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/user.png" alt="Profile Image" /></span>
                        <span>
                          <span>Jordy Cardenas</span>
                          <span class="time">Hace 2 min</span>
                        </span>
                        <span class="message">
                          Buen inicio de semana...
                        </span>
                      </a>
                    </li>
                    
                  </ul>
                </li>
                -->
                  
                <?php
                    $per = strpos($_SESSION["usuario-permisos"], 'rpendientes.php');
                    if ($per!==false || $_SESSION["usuario-permisos"]=='todos'){
                ?>
                <li role="presentation" class="dropdown">
                  <a href="rpendientes.php" class="dropdown-toggle info-number" >
                    <i class="fa fa-plane"></i>
                    <span class="badge bg-orange"><?php echo $numrpen ?></span>
                    
                  </a>
                  
                </li> 
                <?php } ?>
                  
                <?php
                    $per = strpos($_SESSION["usuario-permisos"], 'cpendientes.php');
                    if ($per!==false || $_SESSION["usuario-permisos"]=='todos'){
                ?>
                <li role="presentation" class="dropdown">
                  <a href="cpendientes.php" class="dropdown-toggle info-number" >
                    <i class="fa fa-money"></i>
                    <span class="badge bg-red"><?php echo $numcpen ?></span>
                    
                  </a>
                  
                </li> 
                  
                <?php } ?>
                  
                  
              </ul>
            </nav>
          </div>
        </div>