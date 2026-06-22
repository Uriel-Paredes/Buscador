<?php

namespace Modelo;

class Busqueda
{
    protected $formInput;
    protected $id;
    protected $cadenaBusqueda;
    protected $checkACM;
    protected $checkScienceDirect;
    protected $checkIEEEXplore;
    protected $checkSpringerLink;
    protected $añoInicio;
    protected $añoFin;
    protected $fechaBusqueda;

    public function __construct($formInput)
    {
        $this->formInput = $formInput;
        $this->setCheckACM(true);
        $this->setCheckScienceDirect(true);
        $this->setCheckIEEEXplore(true);
        $this->setCheckSpringerLink(true);
        if (!empty($this->formInput["idBusqueda"])) {
            $this->setID($this->formInput["idBusqueda"]);
        }
        if (!empty($this->formInput["buscar"])) {
            $this->setCadenaBusqueda($this->formInput["buscar"]);
        }
        if (!isset($this->formInput["bd"]["acm"])) {
            $this->setCheckACM(false);
        }
        if (!isset($this->formInput["bd"]["scienceDirect"])) {
            $this->setCheckScienceDirect(false);
        }
        if (!isset($this->formInput["bd"]["ieeeXplore"])) {
            $this->setCheckIEEEXplore(false);
        }
        if (!isset($this->formInput["bd"]["springerLink"])) {
            $this->setCheckSpringerLink(false);
        }
        if (!empty($this->formInput["anioInicio"])) {
            $this->setAñoInicio($this->formInput["anioInicio"]);
        }
        if (!empty($this->formInput["anioFin"])) {
            $this->setAñoFin($this->formInput["anioFin"]);
        }
        if (!empty($this->formInput["fechaBusqueda"])) {
            $this->setFechaBusqueda($this->formInput["fechaBusqueda"]);
        }
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setCadenaBusqueda($cadenaBusqueda)
    {
        $this->cadenaBusqueda = $cadenaBusqueda;
    }

    public function setCheckACM($checkACM)
    {
        $this->checkACM = $checkACM;
    }

    public function setCheckScienceDirect($checkScienceDirect)
    {
        $this->checkScienceDirect = $checkScienceDirect;
    }

    public function setCheckIEEEXplore($checkIEEEXplore)
    {
        $this->checkIEEEXplore = $checkIEEEXplore;
    }

    public function setCheckSpringerLink($checkSpringerLink)
    {
        $this->checkSpringerLink = $checkSpringerLink;
    }

    public function setAñoInicio($añoInicio)
    {
        $this->añoInicio = $añoInicio;
    }

    public function setAñoFin($añoFin)
    {
        $this->añoFin = $añoFin;
    }

    public function setFechaBusqueda($fechaBusqueda)
    {
        $this->fechaBusqueda = $fechaBusqueda;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getCadenaBusqueda()
    {
        return $this->cadenaBusqueda;
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

    public function getAñoInicio()
    {
        return $this->añoInicio;
    }

    public function getAñoFin()
    {
        return $this->añoFin;
    }

    public function getFechaBusqueda()
    {
        return $this->fechaBusqueda;
    }
}
