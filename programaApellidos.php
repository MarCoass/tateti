<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */

/* Apablaza Tomas FAI-2640 
* Coassin Fernandez Martina, FAI-2542, TUDW, martina.coassin@est.fi.uncoma.edu.ar, MarCoass []
/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Muestra todas las opciones del menu en la pantalla, solicita una opcion valida y retorna el valor.
 * (Explicacion 3, punto 2).
 * @return int
 */
function seleccionarOpcion()
{
    do {
        echo " MENU: 
        1)Jugar al tateti.
        2)Mostrar un juego.
        3)Mostrar el primer juego ganador.
        4)Mostrar porcentaje de juegos ganados.
        5)Mostrar resumen de jugador.
        6)Mostrar listado de juegos ordenado por jugador O.
        7)Salir.
    Ingrese una opcion: ";
        $opcion = trim(fgets(STDIN));
    } while ($opcion > 7 || $opcion < 1);
    return $opcion;
}


/**
 * Dado un juego ingresado por parametro, devuelve el resultado del mismo
 * X --> Gano Cruz
 * O --> Gano Circulo
 * E --> Empate 
 * @param array $juego
 * @return string
 */

function resultado($juego)
{
    if ($juego["puntosCruz"] > $juego["puntosCirculo"]) {
        $resultado = "X";
    } elseif ($juego["puntosCruz"] < $juego["puntosCirculo"]) {
        $resultado = "O";
    } else {
        $resultado = "E";
    }
    return $resultado;
}

/**
 * Dado un numero solicitado al usuario, muestra por pantalla la informacion de dicho juego.
 * @param array $coleccionJuegos
 * @param int $numJuegos
 */
function mostrarJuegoPorNumero($coleccionJuegos, $numJuego)
{

    $juegoBuscado = $coleccionJuegos[$numJuego];
    //comparo los puntajes para ver quien gano
    if ($juegoBuscado["puntosCruz"] > $juegoBuscado["puntosCirculo"]) {
        $resultado = "(gano X)";
    } elseif ($juegoBuscado["puntosCruz"] < $juegoBuscado["puntosCirculo"]) {
        $resultado = "(gano O)";
    } else {
        $resultado = "(empate)";
    }

    echo "Juego TATETI: " . $numJuego . " " . $resultado . "
    Jugador X: " . $juegoBuscado["jugadorCruz"] . " obtuvo " . $juegoBuscado["puntosCruz"] . " puntos.
    Jugador O: " . $juegoBuscado["jugadorCirculo"] . " obtuvo " . $juegoBuscado["puntosCirculo"] . " puntos.\n";
}

/**
 * Inicializa una estructura con datos con ejemplos de juegos y la retorna;
 * @return array
 */
function cargarJuegos()
{
    $coleccionJuegos = [];
    $coleccionJuegos[0] = ["jugadorCruz" => "PIPO", "jugadorCirculo" => "ALEX", "puntosCruz" => 8, "puntosCirculo" => 3];
    $coleccionJuegos[1] = ["jugadorCruz" => "ALEX", "jugadorCirculo" => "JOSE", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegos[2] = ["jugadorCruz" => "YIYO", "jugadorCirculo" => "FRANCO", "puntosCruz" => 2, "puntosCirculo" => 3];
    $coleccionJuegos[3] = ["jugadorCruz" => "TOMAS", "jugadorCirculo" => "FERNANDO", "puntosCruz" => 4, "puntosCirculo" => 1];
    $coleccionJuegos[4] = ["jugadorCruz" => "MATIAS", "jugadorCirculo" => "FER", "puntosCruz" => 2, "puntosCirculo" => 6];
    $coleccionJuegos[5] = ["jugadorCruz" => "MAJO", "jugadorCirculo" => "PIPO", "puntosCruz" => 3, "puntosCirculo" => 1];
    $coleccionJuegos[6] = ["jugadorCruz" => "ALBERTO", "jugadorCirculo" => "TATA", "puntosCruz" => 0, "puntosCirculo" => 7];
    $coleccionJuegos[7] = ["jugadorCruz" => "YIYO", "jugadorCirculo" => "SONA", "puntosCruz" => 3, "puntosCirculo" => 3];
    $coleccionJuegos[8] = ["jugadorCruz" => "ALEX", "jugadorCirculo" => "PANCHO", "puntosCruz" => 3, "puntosCirculo" => 4];
    $coleccionJuegos[9] = ["jugadorCruz" => "RAUL", "jugadorCirculo" => "NACHO", "puntosCruz" => 6, "puntosCirculo" => 1];


    return $coleccionJuegos;
}

/**
 * 
 */
function juegoGanador($coleccionJuegos, $cantJuegos, $jugadores)
{
    $primerGanador = true;
    $i = 0;

    do {
        for ($i >= 0; $i <= $cantJuegos - 1; $i++) {
            $juegoBuscado = $coleccionJuegos[$i];

            if (($juegoBuscado["jugadorCruz"] == $jugadores || $juegoBuscado["jugadorCirculo"] == $jugadores)) {
                if (((($juegoBuscado["puntosCruz"] > $juegoBuscado["puntosCirculo"]) & $juegoBuscado["jugadorCruz"] == $jugadores)) || ((($juegoBuscado["puntosCirculo"]) > $juegoBuscado["puntosCruz"]) & $juegoBuscado["jugadorCirculo"] == $jugadores)) {

                    mostrarJuegoPorNumero($juegoBuscado, $i);
                    $primerGanador = false;
                }
            }
        }
    } while ($primerGanador);
}

/**
 * Agrega un nuevo juego a la coleccion y retorna la coleccion actualizada.
 * @param array $coleccionJuegos
 * @param array $juego
 * @return array
 */
function agregarJuego($coleccionJuegos, $juego)
{
    $cantJuegos = count($coleccionJuegos);
    $coleccionJuegos[$cantJuegos] = $juego;
    return $coleccionJuegos;
}

/**
 * Función que dada la colección de juegos y el nombre de un jugador, retorna el resumen del jugador segun la explicacion 2, punto b.
 * Se llama desde el case 5 del programa principal.
 * @param array $coleccionJuegos
 * @param string $nombre
 * @return array
 */
function resumenJugador($coleccionJuegos, $nombre){
    $resumen = [
        "nombre" => $nombre,
        "juegosGanados" => 0,
        "juegosPerdidos" => 0,
        "juegosEmpatados" => 0,
        "puntosAcumulados" => 0,
    ];

    $cantJuegos = count($coleccionJuegos);

    for($i = 0; $i<$cantJuegos; $i++){
        $juegoActual = $coleccionJuegos[$i]; 
        if($juegoActual["jugadorCruz"] == $nombre || $juegoActual["jugadorCirculo"] == $nombre){
            
            $esX = $juegoActual["jugadorCruz"] == $nombre; //Uso esta variable para saber si el nombre corresponde a jugadorCruz o jugadorCirculo.
            $ganador = resultado($juegoActual);

            if ($ganador == "X" && $esX) {
                $resumen["juegosGanados"]++;
            } elseif ($ganador == "X" && !$esX) {
                $resumen["juegosPerdidos"]++;
            } elseif ($ganador == "O" && $esX) {
                $resumen["juegosPerdidos"]++;
            } elseif ($ganador == "O" && !$esX) {
                $resumen["juegosGanados"]++;
            } else {
                $resumen["juegosEmpatados"]++;
            }

            $resumen["puntosAcumulados"] += $esX? $juegoActual["puntosCruz"] : $juegoActual["puntosCirculo"];
        }
    }

    return $resumen;
}

/**
 * Muestra por pantalla el resumen de un jugador.
 * @param array $resumen
 */
function imprimirResumen($resumen){
    echo "***********************************
Jugador: " . $resumen["nombre"] . ".
Gano: " . $resumen["juegosGanados"] . " juegos.
Perdio: " . $resumen["juegosPerdidos"] . " juegos. 
Empato: " . $resumen["juegosEmpatados"] . " juegos. 
Total de puntos acumulados: " . $resumen["puntosAcumulados"] . " puntos.
***********************************
                ";
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/**ENTERO $cantJuegos */
$coleccionJuegos = array(); //array para almacenar la informacion de los juegos


//Inicialización de variables:
$coleccionJuegos = cargarJuegos();

//Proceso:


do {

    $opcion = seleccionarOpcion();

    switch ($opcion) {
        case 1:
            //Se inicia un juego de tateti
            $juego = jugar();
            imprimirResultado($juego);
            $coleccionJuegos = agregarJuego($coleccionJuegos, $juego);
            break;
        case 2:
            echo "Ingrese un numero de juego: ";
            $numJuego = trim(fgets(STDIN));
            mostrarJuegoPorNumero($coleccionJuegos, $numJuego);
            break;
        case 3:
            //mostrar el primer juego ganador

            break;
        case 4:
            //mostrar el porcentaje de juegos ganados
            break;
        case 5:
            //mostrar resumen de jugador
            echo "Ingrese el nombre del jugador: ";
            $nombre = strtoupper(trim(fgets(STDIN)));//strtoupper, utilizada ya que los nombres se almacenan en mayusculas
            $resumen = resumenJugador($coleccionJuegos, $nombre);
            imprimirResumen($resumen);
            break;
        case 6:
            //Mostrar listado de juegos Ordenado por jugador O
            break;
        case 7:
            //salir
            break;
            //...
    }
} while ($opcion != 7);
