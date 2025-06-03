<?php include("HTML/cabecera.html"); ?>
<?php include("menu.php"); ?>

<div class="contenedor">
    <main class="contenido">
        <h2 style="text-align:center;">Listado de Voluntarios</h2>

        <table class="tabla-contribuciones" style="margin: auto;">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($voluntarios as $voluntario): ?>
                <tr>
                    <td><?= htmlspecialchars($voluntario["id"]) ?></td>
                    <td><?= htmlspecialchars($voluntario["NOMBRE"]) ?></td>
                    <td><?= htmlspecialchars($voluntario["CORREO"]) ?></td>
                    <td><?= htmlspecialchars($voluntario["TELEFONO"]) ?></td>
                    <td>
                        <a  class="btn-editar" href="voluntarios.php?accion=eliminar&id=<?= urlencode($voluntario["id"]) ?>" class="accion-popup">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>
</div>

<?php include("HTML/pie.html"); ?>

<!-- Incluir el script para manejar los popups -->
<script src="js/popup.js"></script>
