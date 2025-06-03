<?php
require_once("AccesoDatos.php");

class Contribucion {
    public static function obtenerTodas() {
    $db = new AccesoDatos();
    $db->conectar();
    $res = $db->ejecutarConsulta("SELECT * FROM contribuciones ORDER BY ID DESC");
    $db->desconectar();
    return $res;
    }

    public static function crear($nombre, $app, $apm, $pais, $tipo, $id_voluntario = null) {
        $db = new AccesoDatos();
        $db->conectar();

        $nombre = addslashes($nombre);
        $app = addslashes($app);
        $apm = addslashes($apm);
        $pais = addslashes($pais);
        $tipo = addslashes($tipo);

        $idVol = is_numeric($id_voluntario) ? $id_voluntario : "NULL";

        $sql = "INSERT INTO contribuciones 
                (NOMBRE, APELLIDOPATERNO, APELLIDOMATERNO, PAIS, TIPODECONTRIBUCION, ID_VOLUNTARIO)
                VALUES ('$nombre', '$app', '$apm', '$pais', '$tipo', $idVol)";
        
        $res = $db->ejecutarComando($sql);
        $db->desconectar();

        return $res;
    }
    
    public static function eliminar($id) {
    $db = new AccesoDatos();
    $db->conectar();
    $res = $db->ejecutarComando("DELETE FROM contribuciones WHERE ID = " . intval($id));
    $db->desconectar();
    return $res;
    }
    public static function obtenerPorId($id) {
    $db = new AccesoDatos();
    $db->conectar();
    $res = $db->ejecutarConsulta("SELECT * FROM contribuciones WHERE ID = " . intval($id));
    $db->desconectar();
    return $res[0] ?? null;
  }

  public static function actualizar($id, $nombre, $app, $apm, $pais, $tipo) {
      $db = new AccesoDatos();
      $db->conectar();

      $nombre = addslashes($nombre);
      $app = addslashes($app);
      $apm = addslashes($apm);
      $pais = addslashes($pais);
      $tipo = addslashes($tipo);

      $sql = "UPDATE contribuciones SET 
              NOMBRE = '$nombre',
              APELLIDOPATERNO = '$app',
              APELLIDOMATERNO = '$apm',
              PAIS = '$pais',
              TIPODECONTRIBUCION = '$tipo'
              WHERE ID = " . intval($id);
      
      $res = $db->ejecutarComando($sql);
      $db->desconectar();
      return $res;
  }

}
