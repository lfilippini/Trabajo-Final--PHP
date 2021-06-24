
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar usuario <?=$pro->nombre?></h1>
    <?php $url_action = base_url."usuario/save&id=".$pro->id; ?>

<?php endif; ?>

<div class="container">
<br>
<br>
<br>
    <div class="signin">
        <h1 >Editar</h1>
        <p>Seleccione los campos que desee editar</p>
        <hr>
    </div>

    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"required/>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="<?=isset($pro) && is_object($pro) ? $pro->apellidos : ''; ?>" required/>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?=isset($pro) && is_object($pro) ? $pro->email : ''; ?>" required/>

        <label for="password">Contraseña</label>
        <input type="text" name="password" value="<?=isset($pro) && is_object($pro) ? $pro->password : ''; ?>" required/>

        <label for="rol">Rol</label>
        <input type="text" name="rol" value="<?=isset($pro) && is_object($pro) ? $pro->rol : ''; ?>" required/>
        <br>
        <input type="submit" class="registerbtn" value="Guardar" />
</div>
    </form>
