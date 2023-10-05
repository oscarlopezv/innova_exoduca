<?php
session_start();

?>

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
      <?php      
      $array1    = explode(",","empleados.php");      
      $array2    = explode(",",$_SESSION["usuario-permisos"]);
      $resultado = array_diff($array2, $array1);      
      //$per = strpos($_SESSION["usuario-permisos"], "empleados.php");
      if (count($resultado)<count($array2) || $_SESSION["usuario-permisos"]=="todos") {     
      ?>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-users"></i> EMPLEADOS <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php if (in_array("empleados.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
          <li><a href="empleados.php">Registros</a></li>
          <?php } ?>
          
        </ul>
      </li>

     </ul>
      <?php } ?>
      <?php      
      $array1    = explode(",","htrabajo.php,llamadas.php,rpendientes.php,convenios.php,amadeus.php,novedadese.php,manifiesto.php,manifiestobar.php,comisiones.php,prenomina-tmk.php");      
      $array2    = explode(",",$_SESSION["usuario-permisos"]);
      $resultado = array_diff($array2, $array1);      
      //$per = strpos($_SESSION["usuario-permisos"], "empleados.php");
      if (count($resultado)<count($array2) || $_SESSION["usuario-permisos"]=="todos") {     
      ?>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-file"></i> ADMINISTRATIVO <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <?php if (in_array("htrabajo.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="htrabajo.php">Contratos</a></li>
            <?php } ?>

            <?php if (in_array("clientesSinDeuda.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="clientesSinDeuda.php">Clientes sin deuda</a></li>
            <?php } ?>
            
            <?php if (in_array("novedadese.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="novedadese.php">Nov. Empleados</a></li>
            <?php } ?>
            <?php if (in_array("llamadas.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="llamadas.php">Llamadas y Reservas</a></li>
            <?php } ?>
            <?php if (in_array("rpendientes.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="rpendientes.php">Reservas Pendiente</a></li>
            <?php } ?>
            <?php if (in_array("convenios.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="convenios.php">Convenios</a></li>
            <?php } ?>
            <?php if (in_array("amadeus.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="amadeus.php">Amadeus</a></li>
            <?php } ?>
            <?php if (in_array("manifiesto.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="manifiesto.php">Manifiesto</a></li>
            <?php } ?>
            <?php if (in_array("manifiestobar.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="manifiestobar.php">Efectividad</a></li>
            <?php } ?>
            <?php if (in_array("descuentos.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="descuentos.php">Descuentos</a></li>
            <?php } ?>
            <?php if (in_array("adicionales.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="adicionales.php">Adicionales</a></li>
            <?php } ?>
            <?php if (in_array("bonotmk.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="bonotmk.php">Bonos Tmk</a></li>
            <?php } ?>
            <?php if (in_array("porcomision.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="porcomision.php">Valor Comisión</a></li>
            <?php } ?>
            <?php if (in_array("packs.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="packs.php">Valor Packs</a></li>
            <?php } ?>
            <?php if (in_array("comisiones.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="comisiones.php">PreNomina General</a></li>
            <?php } ?>
            <?php if (in_array("prenomina-tmk.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="prenomina-tmk.php">PreNomina TMK</a></li>
            <?php } ?>
        </ul>
      </li>

     </ul>
      
      <?php } ?>
      <?php      
      $array1    = explode(",","cobcontratos.php,cpendientes.php");      
      $array2    = explode(",",$_SESSION["usuario-permisos"]);
      $resultado = array_diff($array2, $array1);      
      //$per = strpos($_SESSION["usuario-permisos"], "empleados.php");
      if (count($resultado)<count($array2) || $_SESSION["usuario-permisos"]=="todos") {     
      ?>
      <ul class="nav side-menu">
      <li><a><i class="fa fa-money"></i> COBRANZAS <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <?php if (in_array("cobcontratos.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="cobcontratos.php">Contratos</a></li>
            <?php } ?>
            <?php if (in_array("cpendientes.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="cpendientes.php">Pendientes</a></li>
            <?php } ?>
            <?php if (in_array("cpendientes2.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="cpendientes2.php">Vencidos</a></li>
            <?php } ?>
            
          
            
        </ul>
        
        
          
        
      </li>

     </ul>
    <?php } ?>
      <?php      
      $array1    = explode(",","inventario.php,mantvehiculos.php,balance.php");      
      $array2    = explode(",",$_SESSION["usuario-permisos"]);
      $resultado = array_diff($array2, $array1);      
      //$per = strpos($_SESSION["usuario-permisos"], "empleados.php");
      if (count($resultado)<count($array2) || $_SESSION["usuario-permisos"]=="todos") {     
      ?>
      <ul class="nav side-menu">
      <li><a><i class="fa fa-cogs"></i> CONTABILIDAD <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            
            <?php if (in_array("inventario.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="inventario.php">Inventario</a></li>
            <?php } ?>
            
            <?php if (in_array("mantvehiculos.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="mantvehiculos.php">Mantenimiento vehiculos</a></li>
            <?php } ?>
            
            <?php if (in_array("balance.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="balance.php">Balance</a></li>
            <?php } ?>
            
             
            
            
            
          
            
        </ul>
        
        
          
        
      </li>

     </ul>
      <?php } ?>
      
      
      <?php      
      $array1    = explode(",","artes.php,mailing.php");      
      $array2    = explode(",",$_SESSION["usuario-permisos"]);
      $resultado = array_diff($array2, $array1);      
      //$per = strpos($_SESSION["usuario-permisos"], "empleados.php");
      if (count($resultado)<count($array2) || $_SESSION["usuario-permisos"]=="todos") {     
      ?>
      <ul class="nav side-menu">
      <li><a><i class="fa fa-paint-brush"></i> DISEÑO <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            
            <?php if (in_array("artes.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="artes.php">Artes</a></li>
            <?php } ?>
            <?php if (in_array("mailing.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="mailing.php">Mailing</a></li>
            <?php } ?>
            
            
            
            
          
            
        </ul>
        
        
          
        
      </li>

     </ul>
      <?php } ?>
      
       
      <?php      
      $array1    = explode(",","importar.php,concurso.php");      
      $array2    = explode(",",$_SESSION["usuario-permisos"]);
      $resultado = array_diff($array2, $array1);      
      //$per = strpos($_SESSION["usuario-permisos"], "empleados.php");
      if (count($resultado)<count($array2) || $_SESSION["usuario-permisos"]=="todos") {     
      ?>
      <ul class="nav side-menu">
      <li><a><i class="fa fa-tty"></i> MARKETING <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            
            <?php if (in_array("importar.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="importar.php">Importar</a></li>
            <?php } ?>
            <?php if (in_array("concurso.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="concurso.php">Raspadita</a></li>
            <?php } ?>
           
            
        </ul>
        
      </li>

     </ul>
      <?php } ?>
      
      
      <?php      
      $array1    = explode(",","callstmk.php,detallecalls.php,detallelogin.php,salastmk.php");      
      $array2    = explode(",",$_SESSION["usuario-permisos"]);
      $resultado = array_diff($array2, $array1);      
      //$per = strpos($_SESSION["usuario-permisos"], "empleados.php");
      if (count($resultado)<count($array2) || $_SESSION["usuario-permisos"]=="todos") {     
      ?>
      <ul class="nav side-menu">
      <li><a><i class="fa fa-tty"></i> CALL CENTER <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            
            <?php if (in_array("salastmk.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="salastmk.php">Salas</a></li>
            <?php } ?>
            <?php if (in_array("callstmk.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="callstmk.php">LLamadas Tmk</a></li>
            <?php } ?>
            <?php if (in_array("detallecalls.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="detallecalls.php">Detalle llamadas</a></li>
            <?php } ?>
            <?php if (in_array("detallelogin.php", $array2) || $_SESSION["usuario-permisos"]=='todos') { ?>
                <li><a href="detallelogin.php">Movimientos empleados</a></li>
            <?php } ?>
           
            
        </ul>
        
      </li>

     </ul>
      <?php } ?>
      
      
  </div>
  <!--<div class="menu_section">
    <h3>CATEGORIA</h3>
    <ul class="nav side-menu">

      <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i>PAGINA <span class="label label-success pull-right">MUY PRONTO</span></a></li>
    </ul>
  </div>-->

</div>
<!-- /sidebar menu -->