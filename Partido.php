<?php
class Partido{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
            $this->idpartido = $idpartido;
            $this->fecha = $fecha;
            $this->objEquipo1 =$objEquipo1;
            $this->cantGolesE1 = $cantGolesE1;
            $this->objEquipo2 = $objEquipo2;
            $this->cantGolesE2 = $cantGolesE2;
            $this->coefBase = 0.5;


    }

    //OBSERVADORES
    public function setidpartido($idpartido){
         $this->idpartido= $idpartido;
    }

    public function getIdpartido(){
        return $this->idpartido;
    }

    public function setFecha($fecha){
        $this->fecha= $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }


 public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1= $cantGolesE1;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
 public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2= $cantGolesE2;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }



 public function setObjEquipo1($objEquipo1){
        $this->objEquipo1= $objEquipo1;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }


 public function setObjEquipo2($objEquipo2){
        $this->objEquipo2= $objEquipo2;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }




     public function setCoefBase($coefBase){
         $this->coefBase = $coefBase;
    }
      public function getCoefBase(){
        return $this->coefBase;
    }



public function __toString(){
        //string $cadena
        $cadena = "idpartido: ".$this->getIdpartido()."\n";
        $cadena = $cadena. "Fecha: ".$this->getFecha()."\n";
        $cadena = $cadena."\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 1> "."\n".$this->getObjEquipo1()."\n";
        $cadena = $cadena. "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
          $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 2> "."\n".$this->getObjEquipo2()."\n";
        $cadena = $cadena. "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        return $cadena;
    }




    /*
    En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5  y es aplicado a la cantidad de goles y a la cantidad de jugadores de cada equipo. Es decir:
    coef =  0,5 * cantGoles * cantJugadores  donde cantGoles : es la cantidad de goles;   cantJugadores : es la cantidad de jugadores.

    */
    public function coeficienteBase() {

        $coeficienteTotal= 0 ;
        $cantJugadoresE1 = $this->objEquipo1->getCantJugadores();
        $cantJugadoresE2 = $this->objEquipo2->getCantJugadores();

        $coefE1 = $this->coefBase * $this->cantGolesE1 * $cantJugadoresE1;
        $coefE2 = $this->coefBase * $this->cantGolesE2 * $cantJugadoresE2;

        $coeficienteTotal= $coefE1 + $coefE1 ;
        return 
            $coeficienteTotal;
        
    }



    public function darEquipoGanador() {
        $golesEquipo1 = $this->getCantGolesE1();
        $golesEquipo2 = $this->getCantGolesE2();
    
        $equipoGanador = []; // arreglo por si empatan
    
        if ($golesEquipo1 > $golesEquipo2) {
            $equipoGanador = $this->getObjEquipo1();
        } elseif ($golesEquipo1 < $golesEquipo2) {
            $equipoGanador = $this->getObjEquipo2();
        } else {
            
            $equipoGanador[] = $this->getObjEquipo1();
            $equipoGanador[] = $this->getObjEquipo2();
        }
        return $equipoGanador;
    }
}


public function coeficientePartido() {
    // Calcular el coeficiente base multiplicado por la cantidad de goles y jugadores
    $coeficiente = $this->getCoefBase() * ($this->getCantGolesE1() + $this->getCantGolesE2()) * 
                   ($this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores());

    return $coeficiente;
}
?>