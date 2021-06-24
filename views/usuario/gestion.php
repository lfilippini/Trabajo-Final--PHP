<?php
session_start();
require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
require_once '../layout/header.php';
?>
<?php
require_once '../../models/usuario.php';?>

<?php
Utils::isAdmin();
$usuario = new Usuario();
$usuarios = $usuario->getAll(); ?>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="tablita">

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>APELLIDOS</th>
        <th>EMAIL</th>
        <th>ROL</th>
    </tr>
<?php while($pro = $usuarios->fetch_object()): ?>

        <tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->nombre;?></td>
            <td><?=$pro->apellidos;?></td>
            <td><?=$pro->email;?></td>
            <td><?=$pro->rol;?>
            </td>
            <td>
                <a href="<?=base_url?>usuario/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>usuario/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>

            </td>

        </tr>
    <?php endwhile; ?>
</table>
</div>
