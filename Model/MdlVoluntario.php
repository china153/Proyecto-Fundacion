<?php
require_once("AccesoDatos.php");

class Voluntario {
    
    public static function obtenerPorId($id) {
      $db = new AccesoDatos();
      $db->conectar();
      $res = $db->ejecutarConsulta("SELECT * FROM voluntarios WHERE ID = " . intval($id));
      $db->desconectar();
      return $res[0] ?? null;
    }

    public static function actualizar($id, $nombre, $correo, $telefono) {
      $db = new AccesoDatos();
      $db->conectar();
      $nombre = addslashes($nombre);
      $correo = addslashes($correo);
      $telefono = addslashes($telefono);

      $sql = "UPDATE voluntarios SET NOMBRE='$nombre', CORREO='$correo', TELEFONO='$telefono' WHERE ID=$id";
      $res = $db->ejecutarComando($sql);
      $db->desconectar();
      return $res;
    }

    public static function obtenerTodos() {
    $db = new AccesoDatos();
    $db->conectar();
    $res = $db->ejecutarConsulta("SELECT * FROM voluntarios ORDER BY ID DESC");
    $db->desconectar();
    return $res;
    }

    public static function eliminar($id) {
    $db = new AccesoDatos();
    $db->conectar();
    $res = $db->ejecutarComando("DELETE FROM voluntarios WHERE ID = " . intval($id));
    $db->desconectar();
    return $res;
    }


    public static function actualizarPassword($id, $nuevoHash) {
    $db = new AccesoDatos();
    $db->conectar();
    $sql = "UPDATE voluntarios SET CONTRASEÑA = '$nuevoHash' WHERE ID = $id";
    $res = $db->ejecutarComando($sql);
    $db->desconectar();
    return $res;
    }

   

}
