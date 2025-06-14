<?php

namespace controlador;

class ControlGUIForm
{
    /**
     * Atributo que calcula por defecto la cantidad de años para el rango de búsqueda.
     * @since 1.4.0
     */
    protected const DEFAULT_SEARCH_YEARS = 5;

    protected $arrayPost;
    protected $checkACM;
    protected $checkScienceDirect;
    protected $checkIEEEXplore;
    protected $checkSpringerLink;
    protected $inputBuscar;

    public function __construct($arrayPost = false)
    {
        $this->arrayPost = $arrayPost;
        $this->checkACM = "checked";
        $this->checkScienceDirect = "checked";
        $this->checkIEEEXplore = "checked";
        $this->checkSpringerLink = "checked";
        if (!$this->esBusquedaValida()) {
            return true;
        }
        if (!isset($this->arrayPost["bd"]["acm"])) {
            $this->checkACM = null;
        }
        if (!isset($this->arrayPost["bd"]["scienceDirect"])) {
            $this->checkScienceDirect = null;
        }
        if (!isset($this->arrayPost["bd"]["ieeeXplore"])) {
            $this->checkIEEEXplore = null;
        }
        if (!isset($this->arrayPost["bd"]["springerLink"])) {
            $this->checkSpringerLink = null;
        }
        $this->inputBuscar = htmlspecialchars($this->arrayPost["buscar"]);
    }

    public function getCheckACM()
    {
        return $this->checkACM;
    }

    public function getCheckScienceDirect()
    {
        return $this->checkScienceDirect;
    }

    public function getCheckIEEEXplore()
    {
        return $this->checkIEEEXplore;
    }

    public function getCheckSpringerLink()
    {
        return $this->checkSpringerLink;
    }

    public function getInputBuscar()
    {
        return $this->inputBuscar;
    }

    public function esBusquedaValida()
    {
        return (isset($this->arrayPost) && isset($this->arrayPost["bd"]));
    }

    /**
     * @since 1.4.0
     */
    public static function getAnioCorriente()
    {
        return date("Y");
    }

    /**
     * @return Integer Año inicial de la búsqueda. Por defecto, el año actual menos la cantidad de años por defecto. Ej.: def = 5, año actual = 2024, este método devuelve 2019. Se remplaza por lo que el usuario complete en el form.
     * @since 1.4.0
     */
    public function getAnioInicioBusqueda()
    {
        return (isset($this->arrayPost["anioInicio"])) ? $this->arrayPost["anioInicio"] : self::getAnioCorriente() - self::DEFAULT_SEARCH_YEARS;
    }

    /**
     * @return Integer Año final de la búsqueda. Por defecto, el año actual. Ej.: 2024. Se remplaza por lo que el usuario complete en el form.
     * @since 1.4.0
     */
    public function getAnioFinBusqueda()
    {
        return (isset($this->arrayPost["anioFin"])) ? $this->arrayPost["anioFin"] : self::getAnioCorriente();
    }
}
