<?php

/* 1.	Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del premio. 
Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.*/


class Torneo {
    private $colPartidos;
    private $importe;

    public function __construct($importe) {
        $this->colPartidos = array(); // vacio
        $this->importe = $importe;
    }

    public function getColPartidos() {
        return $this->colPartidos;
    }

    public function getImporte() {
        return $this->importe;
    }

    public function setColPartidos($colPartidos) {
        $this->colPartidos = $colPartidos;
    }

    public function setImporte($importe) {
        $this->importe = $importe;
    }

    public function agregarPartido($partido) {
        $this->colPartidos[] = $partido;
    }

    public function colPartidosAstring() {
        $cadena = "";
        $num = 0;
        foreach ($this->getColPartidos() as $partido) {
            $cadena .= "Partido n° " . $num . ":\n" . $partido . "\n";
            $num++;
        }
        return $cadena;
    }

    public function __toString() {
        $cadena = "Colección de partidos:\n" . $this->colPartidosAstring() . "\n" . 
                  "Importe del premio: " . $this->getImporte() . "\n";
        return $cadena;
    }






    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) {
        // Verifico si los equipos tienen la misma categoría y la misma cantidad de jugadores
        if ($OBJEquipo1->getObjCategoria() != $OBJEquipo2->getObjCategoria() || 
            $OBJEquipo1->getCantJugadores() != $OBJEquipo2->getCantJugadores()) {
            // Si no tienen la misma cat o canti de jugadores retorna null
            return null;
        }

        // Crear instancia  partido 
        if ($tipoPartido === 'futbol') {
            $partido = new Partido($this->getIdpartido(), $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
        } elseif ($tipoPartido === 'basquetbol') {
            $partido = new Basket($this->getIdpartido(), $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
        } else {
            return null;
        }

        $this->colPartidos[] = $partido;

        return $partido;
    }



    
       
    
        public function darGanadores($deporte) {
            $ganadores = []; // Coleccion equips ganadores
    
          
            foreach ($this->colPartidos as $partido) {
                
                if ($partido instanceof Partido ) {
                    $equipoGanador = $partido->darEquipoGanador();
                    if (!in_array($equipoGanador, $ganadores)) {
                        $ganadores[] = $equipoGanador;
                    }
                }
            }
    
            return $ganadores;
        }
    }












