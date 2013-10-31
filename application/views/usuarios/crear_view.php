<div>
    <?php echo validation_errors(); ?>
</div>
<div>
    <?php echo $this->session->flashdata('mensaje'); ?>
</div>

<div style="margin-top:10px">
    <form action="" method="POST">
        <div style="">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo set_value('nombre') ?>" required />
        </div>
        <div style="">
            <label>Usuario</label>
            <input type="text" name="usuario" value="<?php echo set_value('usuario') ?>" required />
        </div>
        <div style="">
            <label>Password</label>
            <input type="password" name="password" required />
        </div>
        <div>
            <input type="submit" value="Grabar" />
        </div>
    </form>
</div>



