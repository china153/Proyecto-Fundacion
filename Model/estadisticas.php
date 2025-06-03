<!--estadisticas.php-->

<?php
class estadisticas {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=tsito1;charset=utf8", "root", "");
    }

    // Gráfico 1: contar voluntarios por sexo
    public function getVoluntariosPorGenero() {
        $sql = "SELECT sexo AS genero, COUNT(*) as cantidad
                FROM voluntarios
                GROUP BY sexo";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Gráfico 2: contar eventos por fecha
    public function getFechasMasEventos() {
        $sql = "SELECT fecha, COUNT(*) as cantidad 
                FROM eventos 
                GROUP BY fecha 
                ORDER BY cantidad DESC 
                LIMIT 5";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
a