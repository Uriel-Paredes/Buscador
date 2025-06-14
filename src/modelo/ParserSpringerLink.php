<?php

namespace modelo;

class ParserSpringerLink extends Parser
{
    public function __construct($formInput)
    {
        $this->urlBase = "https://link.springer.com/search?new-search=true&query=";
        $this->formInput = $formInput;
        $this->setInputCadenaBusqueda();
        $this->setInputAnioInicio();
        $this->setInputAnioFin();
    }

    public function setInputCadenaBusqueda()
    {
        $this->inputCadenaBusqueda = htmlspecialchars(str_replace(' ', '+', $this->formInput["buscar"]));
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
        return $this->urlBase . $this->inputCadenaBusqueda . "&date=custom&dateFrom=" . $this->inputAnioInicio . "&dateTo=" . $this->inputAnioFin . "&sortBy=relevance";
    }
}
