<?php

class Fotbool extends Partido {
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $coefMenores = 0.13, $coefJuveniles = 0.19, $coefMayores = 0.27) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->coefMenores = $coefMenores;
        $this->coefJuveniles = $coefJuveniles;
        $this->coefMayores = $coefMayores;
    }

    public function getCoefMenores() {
        return $this->coefMenores;
    }

    public function getCoefJuveniles() {
        return $this->coefJuveniles;
    }

    public function getCoefMayores() {
        return $this->coefMayores;
    }

    public function setCoefMenores($coefMenores) {
        $this->coefMenores = $coefMenores;
    }

    public function setCoefJuveniles($coefJuveniles) {
        $this->coefJuveniles = $coefJuveniles;
    }

    public function setCoefMayores($coefMayores) {
        $this->coefMayores = $coefMayores;
    }

    public function calcularCoeficiente() {

        $coeficienteTotal= 0 ;
        $categoria1 = $this->objEquipo1->getObjCategoria()->getDescripcion();
        $categoria2 = $this->objEquipo2->getObjCategoria()->getDescripcion();

        $coef1 = $this->determinarCoeficientePorCategoria($categoria1);
        $coef2 = $this->determinarCoeficientePorCategoria($categoria2);

        $cantJugadoresE1 = $this->objEquipo1->getCantJugadores();
        $cantJugadoresE2 = $this->objEquipo2->getCantJugadores();

        $coefFinal1 = $coef1 * $this->cantGolesE1 * $cantJugadoresE1;
        $coefFinal2 = $coef2 * $this->cantGolesE2 * $cantJugadoresE2;

        $coeficienteTotal= $coefFinal1 + $coefFinal2 ;
        return $coeficienteTotal;
    }

    private function determinarCoeficientePorCategoria($categoria) {
        switch ($categoria) {
            case 'Menores':
                return $this->coefMenores;
            case 'Juveniles':
                return $this->coefJuveniles;
            case 'Mayores':
                return $this->coefMayores;
            default:
                return 0;
        }
    }

    public function __toString() {
        $coeficientes = $this->calcularCoeficiente();
        return parent::__toString() . 
               "Coeficiente : " .  $coeficientes . "\n" .
        
    }



}