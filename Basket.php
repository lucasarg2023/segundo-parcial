<?php

class Basket extends Partido {
    private $coefPenalizacion; 
    private $cantInfracciones; 

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones = 0, $coefPenalizacion = 0.75) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
        $this->coefPenalizacion = $coefPenalizacion;
    }

    public function getCantInfracciones() {
        return $this->cantInfracciones;
    }

    public function setCantInfracciones($cantInfracciones) {
        $this->cantInfracciones = $cantInfracciones;
    }

    public function getCoefPenalizacion() {
        return $this->coefPenalizacion;
    }

    public function setCoefPenalizacion($coefPenalizacion) {
        $this->coefPenalizacion = $coefPenalizacion;
    }

    public function calcularCoeficiente() {
        $coefBase = $this->getCoefBase();
        $cantInfracciones = $this->getCantInfracciones();

        $coeficiente = $coefBase - ($this->coefPenalizacion * $cantInfracciones);
        return $coeficiente;
    }

    public function __toString() {
        $coeficiente = $this->calcularCoeficiente();
        return parent::__toString() . 
               "Coeficiente: " .  $coeficiente . "\n";
    }
}
