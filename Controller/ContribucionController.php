<?php
require_once("model/MdlContribucion.php");

class ContribucionController {
  public function __construct() {
    if (!isset($_SESSION["usuario"])) {
        header("Location: login.php");
        exit;
    }
  }

  public function index() {
    $esAdmin = $_SESSION["esAdmin"] ?? false;

    if (!$esAdmin) {
        header("Location: contribuciones.php?accion=crear");
        exit;
    }

    $contribuciones = Contribucion::obtenerTodas();
    include("view/contribuciones/lista.php");
    }

    public function crear() {
    $esAdmin = $_SESSION["esAdmin"] ?? false;
    if ($esAdmin) {
        header("Location: contribuciones.php?accion=index");
        exit;
    }

    $mensaje = "";
    $contribucion = [
        "NOMBRE" => "", "APELLIDOPATERNO" => "", "APELLIDOMATERNO" => "",
        "PAIS" => "", "TIPODECONTRIBUCION" => ""
    ];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST["nombre"];
        $appaterno = $_POST["appaterno"];
        $apmaterno = $_POST["apmaterno"];
        $pais = $_POST["pais"];
        $tipo = $_POST["tipo"];
        $id_voluntario = $_SESSION["id_voluntario"] ?? "NULL";

        Contribucion::crear($nombre, $appaterno, $apmaterno, $pais, $tipo, $id_voluntario);
        $mensaje = "Contribución registrada con éxito.";
    }

    include("view/contribuciones/formulario.php");
    }

    public function eliminar() {
    $esAdmin = $_SESSION["esAdmin"] ?? false;
    $id = $_GET["id"] ?? null;

    if ($esAdmin && $id) {
        Contribucion::eliminar($id);
    }

    header("Location: contribuciones.php?accion=index");
    exit;
  }

  public function editar() {
    $esAdmin = $_SESSION["esAdmin"] ?? false;
    $id = $_GET["id"] ?? null;

    if (!$esAdmin || !$id) {
        header("Location: contribuciones.php?accion=index");
        exit;
    }

    $contribucion = Contribucion::obtenerPorId($id);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST["nombre"];
        $appaterno = $_POST["appaterno"];
        $apmaterno = $_POST["apmaterno"];
        $pais = $_POST["pais"];
        $tipo = $_POST["tipo"];

        Contribucion::actualizar($id, $nombre, $appaterno, $apmaterno, $pais, $tipo);
        header("Location: contribuciones.php?accion=index");
        exit;
    }

    include("view/contribuciones/formulario.php");
  }

}
