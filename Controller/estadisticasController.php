<!--estadisticasController.php-->


<?php
include_once 'Model/estadisticas.php';

class estadisticasController {
    public $dataGenero;
    public $dataFechas;

    public function obtenerDatos() {
        $estadisticas = new estadisticas();
        $this->dataGenero = $estadisticas->getVoluntariosPorGenero();
        $this->dataFechas = $estadisticas->getFechasMasEventos();
    }
}
?>
