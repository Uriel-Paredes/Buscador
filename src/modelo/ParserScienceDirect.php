<?php

namespace modelo;

class ParserScienceDirect extends Parser
{
    public function __construct($formInput)
    {
        $this->urlBase = "https://www.sciencedirect.com/search?qs=";
        $this->formInput = $formInput;
        $this->setInputCadenaBusqueda();
        $this->setInputAnioInicio();
        $this->setInputAnioFin();
    }

    public function setInputCadenaBusqueda()
    {
        $this->inputCadenaBusqueda = htmlspecialchars(str_replace(' ', '%20', $this->formInput["buscar"]));
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

    /**
     * @since 1.4.2
     */
    public function getUrlBusqueda()
    {
        if (!$this->inputAnioInicio && !$this->inputAnioFin) {
            return $this->urlBase . $this->inputCadenaBusqueda;
        }
        if ($this->inputAnioInicio == $this->inputAnioFin) {
            return $this->urlBase . $this->inputCadenaBusqueda . "&date=" . $this->inputAnioInicio;
        }
        if (!$this->inputAnioInicio) {
            return $this->urlBase . $this->inputCadenaBusqueda . "&date=0000-" . $this->inputAnioFin;
        }
        if (!$this->inputAnioFin) {
            return $this->urlBase . $this->inputCadenaBusqueda . "&date=" . $this->inputAnioInicio . "-" . date("Y");
        }
        return $this->urlBase . $this->inputCadenaBusqueda . "&date=" . $this->inputAnioInicio . "-" . $this->inputAnioFin;
    }
}
