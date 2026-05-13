<?php

namespace controlador;

use Mysqli;
use modelo\Busqueda;

class ControlBD
{
    protected $arrayPost;
    protected $conexion;

    public function __construct($arrayPost = false)
    {
        $this->arrayPost = $arrayPost;
    }

    protected function abrirConexion()
    {
        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $bd = "bdpaperseek";
        $this->conexion = new mysqli($host, $usuario, $contraseña, $bd) or die("Conexión falló: %s\n" . $this->conexion -> error);
    }

    protected function cerrarConexion()
    {
        $this->conexion->close();
    }
    
    public function busquedaCreada()
    {
        return (isset($this->arrayPost) && isset($this->arrayPost["botonBuscar"]));
    }

    public function crearBusqueda($Busqueda)
    {
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
        $resultado = $sql->execute();
        if (!$resultado) {
            echo "Error al registrar la búsqueda";
        }
        $this->cerrarConexion();
    }
}
