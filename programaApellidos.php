<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */

/* Apablaza Tomas FAI-2640 



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Solicita un numero valido (debe existir tal posicion en el arreglo de juegos) y muestra por pantalla los datos del juego.
 * ¿podria ser que retorne el echo del final al programa principal? ¿esta bien que sea una function o ponemos el codigo directamente
 * en el case?
 */


function mostrarJuegoPorNumero($coleccionJuegos , $cantJuegos)
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

function cargarJuegos(){

    $coleccionJuegos[0] = ["jugadorCruz"=> "pipo" , "jugadorCirculo" => "alex", "puntosCruz"=> 8, "puntosCirculo" => 3];
    $coleccionJuegos[1] = ["jugadorCruz"=> "alex" , "jugadorCirculo" => "jose", "puntosCruz"=> 5, "puntosCirculo" => 0];
    $coleccionJuegos[2] = ["jugadorCruz"=> "yiyo" , "jugadorCirculo" => "franco", "puntosCruz"=> 2, "puntosCirculo" => 3];
    $coleccionJuegos[3] = ["jugadorCruz"=> "tomas" , "jugadorCirculo" => "fernando", "puntosCruz"=> 4, "puntosCirculo" => 1];
    $coleccionJuegos[4] = ["jugadorCruz"=> "matias" , "jugadorCirculo" => "fer", "puntosCruz"=> 2, "puntosCirculo" => 6];
    $coleccionJuegos[5] = ["jugadorCruz"=> "majo" , "jugadorCirculo" => "yone", "puntosCruz"=> 3, "puntosCirculo" => 1];
    $coleccionJuegos[6] = ["jugadorCruz"=> "alberto" , "jugadorCirculo" => "tata", "puntosCruz"=> 0, "puntosCirculo" => 7];
    $coleccionJuegos[7] = ["jugadorCruz"=> "yiyo" , "jugadorCirculo" => "sona", "puntosCruz"=> 3, "puntosCirculo" => 3];
    $coleccionJuegos[8] = ["jugadorCruz"=> "alex" , "jugadorCirculo" => "pancho", "puntosCruz"=> 3, "puntosCirculo" => 4];
    $coleccionJuegos[9] = ["jugadorCruz"=> "raul" , "jugadorCirculo" => "nacho", "puntosCruz"=> 6, "puntosCirculo" => 1];
    $coleccionJuegos[10] = ["jugadorCruz"=> "tomas" , "jugadorCirculo" => "mar", "puntosCruz"=> 3, "puntosCirculo" => 4];
    $coleccionJuegos[11] = ["jugadorCruz"=> "pipo" , "jugadorCirculo" => "ander", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[12] = ["jugadorCruz"=> "jose" , "jugadorCirculo" => "franco", "puntosCruz"=> 4, "puntosCirculo" => 0];
    $coleccionJuegos[13] = ["jugadorCruz"=> "paty" , "jugadorCirculo" => "mel", "puntosCruz"=> 2, "puntosCirculo" => 2];
    $coleccionJuegos[14] = ["jugadorCruz"=> "nacho" , "jugadorCirculo" => "mauro", "puntosCruz"=> 2, "puntosCirculo" => 4];
    
return $coleccionJuegos;

}

function juegoGanador($primerGanador){



}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/**ENTERO $cantJuegos */
$coleccionJuegos = array(); //array para almacenar la informacion de los juegos


//Inicialización de variables:
$coleccionJuegos = cargarJuegos();
$cantJuegos = count($coleccionJuegos); //variable que almacena la cantidad de elementos del array de juegos para saber en que indice insertar el nuevo
//Proceso:


//print_r($juego);

print_r ($coleccionJuegos);


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
