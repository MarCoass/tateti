<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */





/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/








/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);




do {
    echo "Ingrese una opcion: ";
    $opcion = trim(fgets(STDIN));


    switch ($opcion) {
        case 1:
            //jugar al tateti

            break;
        case 2:
            //mostrar un juego

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
        case 0:
            //salir
            break;
            //...
    }
} while ($opcion != 0);
