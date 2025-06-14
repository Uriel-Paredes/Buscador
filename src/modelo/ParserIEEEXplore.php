<?php

namespace modelo;

class ParserIEEEXplore extends Parser
{
    public function __construct($formInput)
    {
        $this->urlBase = "https://ieeexplore.ieee.org/search/searchresult.jsp?";
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
            return $this->urlBase . "newsearch=true&queryText=" . $this->inputCadenaBusqueda;
        }
        return $this->urlBase . htmlspecialchars("action=search&newsearch=true&matchBoolean=true&queryText=(\"All%20Metadata\":") . $this->inputCadenaBusqueda . ")&ranges=" . $this->inputAnioInicio . "_" . $this->inputAnioFin . "_Year";
    }
}
