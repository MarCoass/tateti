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


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/**ENTERO $cantJuegos */
$coleccionJuegos = array(); //array para almacenar la informacion de los juegos


//Inicialización de variables:

$cantJuegos = count($coleccionJuegos); //variable que almacena la cantidad de elementos del array de juegos para saber en que indice insertar el nuevo
//Proceso:


//print_r($juego);




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
