<?php

namespace modelo;

class Parser
{
    protected $urlBase;
    protected $formInput;
    protected $inputAnioInicio;
    protected $inputAnioFin;
    protected $inputCadenaBusqueda;

    public function __construct($formInput)
    {
        $this->urlBase = "http://.../";
        $this->formInput = $formInput;
        $this->setInputCadenaBusqueda();
        $this->setInputAnioInicio();
        $this->setInputAnioFin();
    }

    public function setInputCadenaBusqueda()
    {
        $this->inputCadenaBusqueda = htmlspecialchars($this->formInput["buscar"]);
    }

    public function setInputAnioInicio()
    {
        if (!empty($this->formInput["anioInicio"])) {
            $this->inputAnioInicio = $this->formInput["anioInicio"];
        }
    }

    public function setInputAnioFin()
    {
        if (!empty($this->formInput["anioFin"])) {
            $this->inputAnioFin = $this->formInput["anioFin"];
        }
    }

    public function getUrlBusqueda()
    {
        return $this->urlBase . $this->inputCadenaBusqueda;
    }
}
