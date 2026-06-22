<?php

namespace Controlador;

use Mysqli;
use mysqli_sql_exception;
use Modelo\Busqueda;

class ControlBD
{
    protected $arrayPost;
    protected $conexion;

    public function __construct($arrayPost = false)
    {
        $this->arrayPost = $arrayPost;
    }

    /**
     * @return void
     * @throws mysqli_sql_exception En el caso de que ocurra un error al conectarse con la base de datos
     */
    protected function abrirConexion()
    {
        try {
            $host = "localhost";
            $usuario = "root";
            $contraseña = "";
            $bd = "bdpaperseek";
            $this->conexion = new mysqli($host, $usuario, $contraseña, $bd);
        } catch (mysqli_sql_exception $e) {
            error_log("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }

    protected function cerrarConexion()
    {
        $this->conexion->close();
    }
    
    public function busquedaCreada()
    {
        return (isset($this->arrayPost) && isset($this->arrayPost["botonBuscar"]));
    }

    /**
     * @param  Busqueda $Busqueda Datos de busqueda recibidos en el formulario
     * 
     * @return void
     * @throws mysqli_sql_exception En el caso de que no permita registrar la búsqueda en la base de datos
     */
    public function crearBusqueda($Busqueda)
    {
        try {
            $cadenaBusqueda = $Busqueda->getCadenaBusqueda();
            $checkACM = $Busqueda->getCheckACM();
            $checkScienceDirect = $Busqueda->getCheckScienceDirect();
            $checkIEEEXplore = $Busqueda->getCheckIEEEXplore();
            $checkSpringerLink = $Busqueda->getCheckSpringerLink();
            $añoInicio = $Busqueda->getAñoInicio();
            $añoFin = $Busqueda->getAñoFin();
            $this->abrirConexion();
            $sql = $this->conexion->prepare("INSERT INTO busqueda(cadena_busqueda, check_acm, check_sciencedirect, check_ieee_xplore, check_springerlink, año_inicio, año_fin) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $sql->bind_param("siiiiii", $cadenaBusqueda, $checkACM, $checkScienceDirect, $checkIEEEXplore, $checkSpringerLink, $añoInicio, $añoFin);
            $sql->execute();
        } catch (mysqli_sql_exception $e) {
            error_log("Error al registrar la búsqueda: " . $e->getMessage());
        } finally {
            $this->cerrarConexion();
        }
    }
}
