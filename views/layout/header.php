<!DOCTYPE html>
<html lang="es">
<title>No Tan Barats</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../uploads/css/styles.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>

<div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="#home" class="w3-bar-item w3-button w3-wide">TRANSPORTECH</a>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">
            <a href="index.php" class="w3-bar-item w3-button">NOSOTROS</a>
            <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> EQUIPO</a>
            <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> TRABAJOS</a>
            <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACTO</a>
            <?php if(!isset($_SESSION['identity'])): ?>
            <a href="<?=base_url?>views/usuario/login.php" class="w3-bar-item w3-button"><i class="fa fa-lock"></i> LOGIN </a>
            <a href="<?=base_url?>views/usuario/registro.php" class="w3-bar-item w3-button"><i class="fa fa-user-plus"></i> REGISTRO </a>
            <?php else: ?>
                <a href="<?=base_url?>usuario/logout" class="w3-bar-item w3-button">Cerrar sesión</a>
            <?php endif; ?>
            <?php if(isset($_SESSION['identity'])&&isset($_SESSION['admin'])): ?>
                <br>
                <br>
                <br>
                <br>
                <a href="<?=base_url?>views/usuario/gestion.php" class="w3-display-left w3-text-black">Ver usuarios</a>
            <?php endif; ?>

        </div>
        <!-- Hide right-floated links on small screens and replace them with a menu icon -->


    </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">NOSOTROS</a>
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">EQUIPO</a>
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">TRABAJOS</a>
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">CONTACTO</a>
    <a href="<?=base_url?>usuario/login"   class="w3-bar-item w3-button">LOGIN</a>
    <a href="<?=base_url?>usuario/registro"  class="w3-bar-item w3-button">REGISTRO</a>


</nav>