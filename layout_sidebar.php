<?php
    
    $actividades = "nav-link collapsed";
    $etiquetas = "nav-link collapsed";
    $buenos = "nav-link collapsed";
    $malos = "nav-link collapsed";
    $diario = "nav-link collapsed";

    switch($pagActual){
        case 10: //Actividades
            $actividades = "nav-link";
            break;
        case 20: //Etiquetas
            $etiquetas = "nav-link";
            break;
        case 30: //Buenos habitos / Habitos??
            $buenos = "nav-link";
            break;
        case 50: //Diario
            $diario = "nav-link";
            break;
    }
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="<?php echo $actividades;?>" href="actividades.php?view=1">
      <img class="img32" src="assets/imgs/actividades.svg">
      <span>Actividades</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="<?php echo $etiquetas;?>" href="etiquetas.php">
      <img class="img32" src="assets/imgs/tag.svg">
      <span>Etiquetas</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="<?php echo $buenos;?>" href="habitos.php">
      <img class="img32" src="assets/imgs/habitos.svg">
      <span>Hábitos</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="<?php echo $diario;?>" href="diario.php">
      <img class="img32" src="assets/imgs/diario.svg">
      <span>Diario</span>
    </a>
  </li>
</ul>

</aside><!-- End Sidebar-->