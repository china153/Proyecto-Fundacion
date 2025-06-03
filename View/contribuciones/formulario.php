<?php include("HTML/cabecera.html"); ?>
<?php include("menu.php"); ?>

<div class="contenedor">
  <main>
    <h2 style="text-align:center;">Registro de contribuciones</h2>
    
    <?php if (!empty($mensaje)): ?>
        <p style="text-align:center; color:green;"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <!-- <form class="formulario" action="contribuciones.php?accion=crear" method="POST"> -->
      <form class="formulario" action="" method="POST">

        <div class="form-row">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required value="<?= $contribucion['NOMBRE'] ?>">
        </div>

        <div class="form-row">
            <label for="appaterno">Apellido Paterno:</label>
            <input type="text" id="appaterno" name="appaterno" required value="<?= $contribucion['APELLIDOPATERNO'] ?>">
        </div>

        <div class="form-row">
            <label for="apmaterno">Apellido Materno:</label>
            <input type="text" id="apmaterno" name="apmaterno" required value="<?= $contribucion['APELLIDOMATERNO'] ?>">
        </div>

        <div class="form-row">
            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required value="<?= $contribucion['PAIS'] ?>">
        </div>

        <div class="form-row">
            <label for="tipo">Tipo de contribución:</label>
            <select id="tipo" name="tipo" required>
                <option value="">Selecciona una opción</option>
                <option value="Mesas">Mesas</option>
                <option value="Sillas">Sillas</option>
                <option value="Voluntariado">Voluntariado</option>
                <option value="Servicios">Servicios</option>
            </select>
        </div>

        <div style="text-align:center;">
           <button type="submit"><?= isset($contribucion["ID"]) ? "Actualizar" : "Registrar" ?></button>

        </div>
    </form>
  </main>

    <?php include 'HTML/aside.html'; ?>
</div>

<?php include 'HTML/pie.html'; ?>
