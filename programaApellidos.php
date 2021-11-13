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

function mostrarJuegoPorNumero($coleccionJuegos, $cantJuegos)
{
    //Se solicita un numero de juego y se muestra la informacion de dicho juego
    do {
        echo "Ingrese un numero de juego entre 1 y " . $cantJuegos . " : ";
        $numeroJuego = trim(fgets(STDIN));
        if ($numeroJuego < 1 || $numeroJuego > $cantJuegos) {
            $continuar = true;
            echo "El juego buscado no existe.\n";
        } else {
            $continuar = false;
        }
    } while ($continuar);

    //guardo el juego solicitado en una variable
    $juegoBuscado = $coleccionJuegos[$numeroJuego - 1];
    //comparo los puntajes para ver quien gano
    if ($juegoBuscado["puntosCruz"] > $juegoBuscado["puntosCirculo"]) {
        $resultado = "(gano X)";
    } elseif ($juegoBuscado["puntosCruz"] < $juegoBuscado["puntosCirculo"]) {
        $resultado = "(gano O)";
    } else {
        $resultado = "(empate)";
    }

    echo "Juego TATETI: " . $numeroJuego . " " . $resultado . "
    Jugador X: " . $juegoBuscado["jugadorCruz"] . " obtuvo " . $juegoBuscado["puntosCruz"] . " puntos.
    Jugador O: " . $juegoBuscado["jugadorCirculo"] . " obtuvo " . $juegoBuscado["puntosCirculo"] . "puntos.\n";
}

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
    $coleccionJuegos[10] = ["jugadorCruz" => "TOMAS", "jugadorCirculo" => "MAR", "puntosCruz" => 3, "puntosCirculo" => 4];
    $coleccionJuegos[11] = ["jugadorCruz" => "PIPO", "jugadorCirculo" => "ANDER", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegos[12] = ["jugadorCruz" => "JOSE", "jugadorCirculo" => "FRANCO", "puntosCruz" => 4, "puntosCirculo" => 0];
    $coleccionJuegos[13] = ["jugadorCruz" => "PATY", "jugadorCirculo" => "MEL", "puntosCruz" => 2, "puntosCirculo" => 2];
    $coleccionJuegos[14] = ["jugadorCruz" => "NACHO", "jugadorCirculo" => "MAURO", "puntosCruz" => 2, "puntosCirculo" => 4];

    return $coleccionJuegos;
}

function cargaInicialJugadores($coleccionJuegos){
    $jugadores = [];
    $cantidadJuegos = count($coleccionJuegos);
    for($i = 0; $i< $cantidadJuegos; $i++){
        echo "
        ACA: " . $i;
        $juego = $coleccionJuegos[$i];
        $jugadores = actualizarJugadores($jugadores, $juego);
        print_r($jugadores[$i]);
    }
    return $jugadores;
}

function juegoGanador($primerGanador)
{
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
    }
    return $posicion;
}

/**
 * Funcion que actualiza la coleccion de jugadores, agrega un nuevo jugador en caso de ser necesario.
 */
function actualizarJugadores($coleccionJugadores, $juego)
{
    //Se determina el resultado del juego y para sumar el punto donde corresponda
    $ganador = resultado($juego);

    $coleccionJugadores = actualizarDatosJugadores($juego["jugadorCruz"], $juego["puntosCruz"], $coleccionJugadores, $ganador, true);
    $coleccionJugadores = actualizarDatosJugadores($juego["jugadorCirculo"], $juego["puntosCirculo"], $coleccionJugadores, $ganador, false);


    return $coleccionJugadores;
}

function actualizarDatosJugadores($nombre, $puntos, $coleccionJugadores, $ganador, $esX)
{

    do {
        $posicion = posicionJugador($nombre, $coleccionJugadores);
        if ($posicion == -1 || count($coleccionJugadores) == 0) {
            $nuevoJugador = [
                "nombre" => $nombre,
                "juegosGanados" => 0,
                "juegosPerdidos" => 0,
                "juegosEmpatados" => 0,
                "puntosAcumulados" => 0,
            ];
            //print_r($nuevoJugador);
            $coleccionJugadores[count($coleccionJugadores)] = $nuevoJugador;
        } else {

            /**No entiendo por que si uso el siguiente codigo no se actualizan los valores en el array:
             * $jugador = $coleccionJugadores[$posicion];
             * $jugador[$puntaje] += $puntos;
             */

            $coleccionJugadores[$posicion]["puntosAcumulados"] += $puntos;
            
            if ($ganador == "X" && $esX) {
                $coleccionJugadores[$posicion]["juegosGanados"]++;
            } elseif ($ganador == "X" && !$esX) {
                $coleccionJugadores[$posicion]["juegosPerdidos"]++;
            } elseif ($ganador == "O" && $esX) {
                $coleccionJugadores[$posicion]["juegosPerdidos"]++;
            } elseif ($ganador == "O" && !$esX) {
                $coleccionJugadores[$posicion]["juegosGanados"]++;
            } else {
                $coleccionJugadores[$posicion]["juegosEmpatados"]++;
            }
        }
    } while ($posicion == -1);
    return $coleccionJugadores;
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
$coleccionJugadores = cargaInicialJugadores($coleccionJuegos);
$cantJuegos = count($coleccionJuegos); //variable que almacena la cantidad de elementos del array de juegos para saber en que indice insertar el nuevo
//Proceso:



//print_r($coleccionJugadores);

/*


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
            actualizarJugadores($coleccionJugadores, $juego);
            $cantJuegos++;
            break;
        case 2:
            mostrarJuegoPorNumero($coleccionJuegos, $cantJuegos);
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
*/