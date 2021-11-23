<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */

/* Apablaza Tomas FAI-2640, TUDW, tomas.apablaza@est.fi.uncoma.edu.ar, Hakaiq
* Coassin Fernandez Martina, FAI-2542, TUDW, martina.coassin@est.fi.uncoma.edu.ar, MarCoass 

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Inicializa una estructura de datos con ejemplos de juegos y la retorna;
 * Explicacion 3 - Punto 1
 * @return array
 */
function cargarJuegos()
{
    /**
     * array multidimensional $coleccionJuegos
     */
    $coleccionJuegos = [];
    $coleccionJuegos[0] = ["jugadorCruz" => "PIPO", "jugadorCirculo" => "ALEX", "puntosCruz" => 4, "puntosCirculo" => 0];
    $coleccionJuegos[1] = ["jugadorCruz" => "ALEX", "jugadorCirculo" => "JOSE", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegos[2] = ["jugadorCruz" => "YIYO", "jugadorCirculo" => "FRANCO", "puntosCruz" => 0, "puntosCirculo" => 3];
    $coleccionJuegos[3] = ["jugadorCruz" => "TOMAS", "jugadorCirculo" => "FERNANDO", "puntosCruz" => 4, "puntosCirculo" => 0];
    $coleccionJuegos[4] = ["jugadorCruz" => "MATIAS", "jugadorCirculo" => "FER", "puntosCruz" => 0, "puntosCirculo" => 5];
    $coleccionJuegos[5] = ["jugadorCruz" => "MAJO", "jugadorCirculo" => "PIPO", "puntosCruz" => 3, "puntosCirculo" => 0];
    $coleccionJuegos[6] = ["jugadorCruz" => "ALBERTO", "jugadorCirculo" => "TATA", "puntosCruz" => 0, "puntosCirculo" => 2];
    $coleccionJuegos[7] = ["jugadorCruz" => "YIYO", "jugadorCirculo" => "SONA", "puntosCruz" => 3, "puntosCirculo" => 3];
    $coleccionJuegos[8] = ["jugadorCruz" => "ALEX", "jugadorCirculo" => "PANCHO", "puntosCruz" => 0, "puntosCirculo" => 4];
    $coleccionJuegos[9] = ["jugadorCruz" => "RAUL", "jugadorCirculo" => "NACHO", "puntosCruz" => 6, "puntosCirculo" => 0];


    return $coleccionJuegos;
}



/**
 * Muestra todas las opciones del menu en la pantalla, solicita una opcion valida y retorna el valor.
 * Explicacion 3 - punto 2
 * @return int
 */
function seleccionarOpcion()
{
    /**
     * int $opcion
     */

    echo " MENU: 
        1)Jugar al tateti.
        2)Mostrar un juego.
        3)Mostrar el primer juego ganador.
        4)Mostrar porcentaje de juegos ganados.
        5)Mostrar resumen de jugador.
        6)Mostrar listado de juegos ordenado por jugador O.
        7)Salir.
    Ingrese una opcion: ";
    $opcion = numeroEntre(1, 7);
    return $opcion;
}



/**
 * Función que solicita al usuario un número entre un rango de valores. Si el número
 * ingresado por el usuario no es válido, la función vuelve a pedirlo.
 * Explicacion 3 - Punto 3
 * @param int $min
 * @param int $max
 * @return int
 */
function numeroEntre($min, $max)
{
    /**
     * int $numero
     */
    $numero = solicitarNumeroEntre($min, $max);
    return $numero;
}



/**
 * función que dado un juego, muestre en pantalla los datos del juego.
 * Explicacion 3 - Punto 4
 * @param array $juego
 * @param int $numJuego
 */
function mostrarJuegoPorNumero($juego, $numJuego)
{
    /**
     * string $resultado
     * string $textoResultado
     */

    $resultado = resultado($juego);

    if ($resultado == "X") {
        $textoResultado = "(gano X)";
    } elseif ($resultado == "E") {
        $textoResultado = "(gano O)";
    } else {
        $textoResultado = "(empate)";
    }

    echo "    ***********************************
    Juego TATETI: " . $numJuego . " " . $textoResultado . "
    Jugador X: " . $juego["jugadorCruz"] . " obtuvo " . $juego["puntosCruz"] . " puntos.
    Jugador O: " . $juego["jugadorCirculo"] . " obtuvo " . $juego["puntosCirculo"] . " puntos.
    ***********************************\n";
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
    /**
     * string $resultado
     */
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
 * Agrega un nuevo juego a la coleccion y retorna la coleccion actualizada.
 * Explicacion 3 - Punto 5
 * @param array $listadoJuegos
 * @param array $juego
 * @return array 
 */
function agregarJuego($listadoJuegos, $juego)
{
    /**
     * int $cantJuegos
     */
    $cantJuegos = count($listadoJuegos);
    $listadoJuegos[$cantJuegos] = $juego;
    return $listadoJuegos;
}


/**
 * función que dada una colección de juegos y el nombre de un jugador, retorna el indice del primer juego ganado por este jugador
 * o -1 en caso de que no haya ganado ningun juego.
 * Explicacion 3 - Punto 6
 * @param array $listadoJuegos
 * @param string $jugadorPrimerGanada
 * @return int
 */
function indiceJuegoGanador($listadoJuegos, $jugadorPrimeraGanada)
{
    /**
     * int $acum
     * boolean $primerGanador
     * int $i
     */

    $acum = count($listadoJuegos);
    $i = 0;
    $primerGanador = true;
    do {

        $juegoBuscado = $listadoJuegos[$i];

        if (($juegoBuscado["jugadorCruz"] == $jugadorPrimeraGanada) || ($juegoBuscado["jugadorCirculo"] == $jugadorPrimeraGanada)) {
            if (((($juegoBuscado["puntosCruz"] > $juegoBuscado["puntosCirculo"]) & $juegoBuscado["jugadorCruz"] == $jugadorPrimeraGanada)) || ((($juegoBuscado["puntosCirculo"]) > $juegoBuscado["puntosCruz"]) & ($juegoBuscado["jugadorCirculo"] == $jugadorPrimeraGanada))) {

                $juegoGanado = $i;
                $primerGanador = false;
            }
        } else {
            $juegoGanado = -1;
        }
        $i++;
    } while ($primerGanador && $i < $acum);

    return $juegoGanado;
}



/**
 * Funcion que solicita un simbolo a un usuario y que valida el dato
 * Explicacion 3 - Punto 8
 * @return string
 */
function solicitarSimbolo()
{
    /**
     * string $simbolo
     */
    do {
        echo "Elija uno de los siguientes simbolos (X-O)";
        $simbolo = strtoupper(trim(fgets(STDIN)));
    } while ($simbolo != "X" && $simbolo != "O");

    return $simbolo;
}


/**
 * Funcion que devuelve la cantidad de partidas ganadas sin importar el simbolo.
 * Explicacion 3 - Punto 9
 * @param array $totalJuegosGanados
 * @return int
 */
function totalJuegosGanados($listadoJuegos)
{
    /**
     * int $acum
     * int $juegosGanados
     * int $i -> variable contadora
     */
    $acum = count($listadoJuegos);
    $juegosGanados = 0;

    for ($i = 0; $i <= $acum - 1; $i++) {
        $juegoBuscado = $listadoJuegos[$i];
        if (($juegoBuscado["puntosCruz"] > $juegoBuscado["puntosCirculo"]) || ($juegoBuscado["puntosCirculo"] > $juegoBuscado["puntosCruz"])) {
            $juegosGanados++;
        }
    }
    return $juegosGanados;
}



/**
 * Funcion que devuelve la cantidad de partidas ganadas por el simbolo elegido.
 * Explicacion 3 - Punto 10
 * @param array $listadoJuegos
 * @param string $simbolo
 * @return int
 */
function totalSimboloGanadas($listadoJuegos, $simbolo)
{
    /**
     * int $acum
     * int $jugadorTotalGanadas
     * int $i -> variable contadora
     */
    $acum = count($listadoJuegos);
    $jugadorTotalGanadas = 0;

    for ($i = 0; $i <= $acum - 1; $i++) {
        if (resultado($listadoJuegos[$i]) == $simbolo) {
            $jugadorTotalGanadas++;
        }
    }
    return $jugadorTotalGanadas;
}


/**
 * Funcion que calcula el porcentaje de victorias que representa un simbolo, del total de victorias.
 * @param array $listadoJuegos
 * @param string $simbolo
 * @return float
 */
function porcentajeJuegosGanados($listadoJuegos, $simbolo)
{
    /**
     * float SporcentajeJuegosGanados
     */
    $porcentajeJuegosGanados = (totalSimboloGanadas($listadoJuegos, $simbolo) / totalJuegosGanados($listadoJuegos)) * 100;

    return $porcentajeJuegosGanados;
}



/**
 * Función que dada la colección de juegos y el nombre de un jugador, retorna el resumen del jugador segun la explicacion 2, punto b.
 * Se llama desde el case 5 del programa principal.
 * Explicacion 3 - Punto 7
 * @param array $listadoJuegos
 * @param string $nombre
 * @return array
 */
function resumenJugador($listadoJuegos, $nombre)
{
    /**
     * array asociativo $resumen
     * int $i -> variable contadora
     * int $cantJuegos
     * boolean $esX
     */
    $resumen = [
        "nombre" => $nombre,
        "juegosGanados" => 0,
        "juegosPerdidos" => 0,
        "juegosEmpatados" => 0,
        "puntosAcumulados" => 0,
    ];

    $cantJuegos = count($listadoJuegos);

    for ($i = 0; $i < $cantJuegos; $i++) {
        $juegoActual = $listadoJuegos[$i];
        if ($juegoActual["jugadorCruz"] == $nombre || $juegoActual["jugadorCirculo"] == $nombre) {

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

            $resumen["puntosAcumulados"] += $esX ? $juegoActual["puntosCruz"] : $juegoActual["puntosCirculo"];
        }
    }

    return $resumen;
}

/**
 * Muestra por pantalla el resumen de un jugador.
 * @param array $resumen
 */
function imprimirResumen($resumen)
{
    echo "   ***********************************
    Jugador: " . $resumen["nombre"] . ".
    Gano: " . $resumen["juegosGanados"] . " juegos.
    Perdio: " . $resumen["juegosPerdidos"] . " juegos. 
    Empato: " . $resumen["juegosEmpatados"] . " juegos. 
    Total de puntos acumulados: " . $resumen["puntosAcumulados"] . " puntos.
    ***********************************
                ";
}



/**
 * Funcion que ordena la coleccion de juegos alfabeticamente segun el jugador circulo.
 * Explicacion 3 - Punto 11
 * @param array $listadoJuegos
 */
function ordenarJuegos($listadoJuegos)
{
    //uasort ordena al array con una funcion de comparacion ya definida (cmp) y mantiene la asociacion de indices.
    uasort($listadoJuegos, 'cmp');
    print_r($listadoJuegos);
}


/**
 * Funcion de comparacion, compara alfabeticamente los nombres de los jugadorCirculo
 * @param array @juegoA
 * @param array @juegoB
 * @return int
 */
function cmp($juegoA, $juegoB)
{
    /**
     * int $orden
     */
    $a = $juegoA["jugadorCirculo"];
    $b = $juegoB["jugadorCirculo"];
    if ($a == $b) {
        $orden = 0;
    } elseif ($a < $b) {
        $orden = -1;
    } else {
        $orden = 1;
    }

    return $orden;
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/**
 * int $cantJuegos
 * int $numero
 * int $indice
 * array $coleccionJuegos
 * array $juego
 * array $resumen
 * string $jugadorPrimeraGanada
 * string $simbolo
 * string $nombre
 * 
 */

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
            $cantJuegos = count($coleccionJuegos);
            echo "Ingrese un numero entre: 1 y " . $cantJuegos . ": ";
            $numero = numeroEntre(1, $cantJuegos);
            $juego = $coleccionJuegos[$numero - 1];
            mostrarJuegoPorNumero($juego, $numero);
            break;
        case 3:
            //mostrar el primer juego ganador
            echo "Ingrese el nombre del jugador a buscar: ";
            $jugadorPrimeraGanada = strtoupper(trim(fgets(STDIN)));

            $indice = indiceJuegoGanador($coleccionJuegos, $jugadorPrimeraGanada);

            if ($indice == -1) {

                echo "El jugador " . strtolower($jugadorPrimeraGanada) . " no ganó ningun juego.";
            } else {

                mostrarJuegoPorNumero($coleccionJuegos[$indice], $indice);
            }
            break;
        case 4:
            //mostrar el porcentaje de juegos ganados
            $simbolo = solicitarSimbolo();
            echo $simbolo . " gano el " . round(porcentajeJuegosGanados($coleccionJuegos, $simbolo), 2) . "% de los juegos ganados.
            ";
            break;
        case 5:
            //mostrar resumen de jugador
            echo "Ingrese el nombre de un jugador: ";
            $nombre = strtoupper(trim(fgets(STDIN)));
            $resumen = resumenJugador($coleccionJuegos, $nombre);
            imprimirResumen($resumen);
            break;
        case 6:
            //Mostrar listado de juegos Ordenado por jugador O
            ordenarJuegos($coleccionJuegos);
            break;
    }
} while ($opcion != 7);
