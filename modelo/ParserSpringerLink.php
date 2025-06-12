<?php
class ParserSpringerLink extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://link.springer.com/search?new-search=true&query=";
        $this->formInput = $formInput;
        $this->setInputCadenaBusqueda();
        $this->setInputAnioInicio();
        $this->setInputAnioFin();
    }

    function setInputCadenaBusqueda() {
        $this->inputCadenaBusqueda = htmlspecialchars(str_replace(' ', '+', $this->formInput["buscar"]));
    }

    function setInputAnioInicio() {
        if(!empty($this->formInput["anioInicio"])) {
            $this->inputAnioInicio = $this->formInput["anioInicio"];
        }
    }

    function setInputAnioFin() {
        if(!empty($this->formInput["anioFin"])) {
            $this->inputAnioFin = $this->formInput["anioFin"];
        }
    }

    /**
     * @since 1.4.2
     */
    function getUrlBusqueda() {
        if(!$this->inputAnioInicio && !$this->inputAnioFin) {
            return $this->urlBase.$this->inputCadenaBusqueda;
        }
        return $this->urlBase.$this->inputCadenaBusqueda."&date=custom&dateFrom=".$this->inputAnioInicio."&dateTo=".$this->inputAnioFin."&sortBy=relevance";
    }
}