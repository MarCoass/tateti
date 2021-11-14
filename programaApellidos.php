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
 * Dado un juego ingresado por parametro, devuelve el resultado del mismo
 * X --> Gano Cruz
 * O --> Gano Circulo
 * E --> Empate 
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
 * 
 */

/**
 * Solicita un numero valido (debe existir tal posicion en el arreglo de juegos) y muestra por pantalla los datos del juego.
 * ¿podria ser que retorne el echo del final al programa principal? ¿esta bien que sea una function o ponemos el codigo directamente
 * en el case? 
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
    Jugador O: " . $juegoBuscado["jugadorCirculo"] . " obtuvo " . $juegoBuscado["puntosCirculo"] . "puntos.\n";
}
//Carga inicial de datos


function cargaInicialJuegos()
{

    $coleccionJuegos[0] = ["jugadorCruz" => "PIPO", "jugadorCirculo" => "ALEX", "puntosCruz" => 8, "puntosCirculo" => 3];
    $coleccionJuegos[1] = ["jugadorCruz" => "ALEX", "jugadorCirculo" => "JOSE", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegos[2] = ["jugadorCruz" => "YIYO", "jugadorCirculo" => "FRANCO", "puntosCruz" => 2, "puntosCirculo" => 3];
    $coleccionJuegos[3] = ["jugadorCruz" => "TOMAS", "jugadorCirculo" => "FERNANDO", "puntosCruz" => 4, "puntosCirculo" => 1];
    $coleccionJuegos[4] = ["jugadorCruz" => "MATIAS", "jugadorCirculo" => "FER", "puntosCruz" => 2, "puntosCirculo" => 6];
    $coleccionJuegos[5] = ["jugadorCruz" => "MAJO", "jugadorCirculo" => "YONE", "puntosCruz" => 3, "puntosCirculo" => 1];
    $coleccionJuegos[6] = ["jugadorCruz" => "ALBERTO", "jugadorCirculo" => "TATA", "puntosCruz" => 0, "puntosCirculo" => 7];
    $coleccionJuegos[7] = ["jugadorCruz" => "YIYO", "jugadorCirculo" => "SONA", "puntosCruz" => 3, "puntosCirculo" => 3];
    $coleccionJuegos[8] = ["jugadorCruz" => "ALEX", "jugadorCirculo" => "PANCHO", "puntosCruz" => 3, "puntosCirculo" => 4];
    $coleccionJuegos[9] = ["jugadorCruz" => "RAUL", "jugadorCirculo" => "NACHO", "puntosCruz" => 6, "puntosCirculo" => 1];


    return $coleccionJuegos;
}

function juegoGanador($coleccionJuegos, $cantJuegos, $jugadors)
{
    $primerGanador = true;
    $i = 0;

    do {
        for ($i >= 0; $i <= $cantJuegos - 1; $i++) {
            $juegoBuscado = $coleccionJuegos[$i];

            if (($juegoBuscado["jugadorCruz"] == $jugadors || $juegoBuscado["jugadorCirculo"] == $jugadors)) {
                if (((($juegoBuscado["puntosCruz"] > $juegoBuscado["puntosCirculo"]) & $juegoBuscado["jugadorCruz"] == $jugadors)) || ((($juegoBuscado["puntosCirculo"]) > $juegoBuscado["puntosCruz"]) & $juegoBuscado["jugadorCirculo"] == $jugadors)) {

                    mostrarJuegoPorNumero($juegoBuscado, $i);
                    $primerGanador = false;
                }
            }
        }
    } while ($primerGanador);
}



/**
 * Busca un jugador por su nombre, si se encuentra devuelve su posicion, si no lo encuentra devuelve -1
 */
function posicionJugador($nombre, $coleccionJugadores)
{
    $cantJugadores = count($coleccionJugadores);
    $i = 0;
    $posicion = -1;
    $seguir = true;
    while ($i < $cantJugadores && $seguir) {
        if ($coleccionJugadores[$i]["nombre"] == $nombre) {
            $posicion = $i;
            $seguir = false;
        } else {
            $i++;
        }
        return $posicion;
    }
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/**ENTERO $cantJuegos */
$coleccionJuegos = array(); //array para almacenar la informacion de los juegos
$coleccionJugadores = array();

//Inicialización de variables:
$coleccionJuegos = cargaInicialJuegos();

$cantJuegos = count($coleccionJuegos); //variable que almacena la cantidad de elementos del array de juegos para saber en que indice insertar el nuevo
//Proceso:



//print_r($coleccionJugadores);




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

    switch ($opcion) {
        case 1:
            //Se inicia un juego de tateti
            $juego = jugar();
            imprimirResultado($juego);
            //Se almacena la informacion del juego en el array $coleccionJuegos
            $coleccionJuegos[$cantJuegos] = $juego;
            $cantJuegos++;
            break;
        case 2:
            echo "Ingrese un numero de juego: ";
            $numJuego = trim(fgets(STDIN));
            mostrarJuegoPorNumero($coleccionJuegos, $cantJuegos, $numJuego);
            break;
        case 3:
            //mostrar el primer juego ganador

            break;
        case 4:
            //mostrar el porcentaje de juegos ganados
            break;
        case 5:
            //mostrar resumen de jugador

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
