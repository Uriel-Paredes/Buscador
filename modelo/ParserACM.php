<?php
class ParserACM extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://dl.acm.org/action/doSearch?";
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
            $this->inputAnioInicio = "&AfterYear=".$this->formInput["anioInicio"];
        }
    }

    function setInputAnioFin() {
        if(!empty($this->formInput["anioFin"])) {
            $this->inputAnioFin = "&BeforeYear=".$this->formInput["anioFin"];
        }
    }

    /**
     * @since 1.4.2
     */
    function getUrlBusqueda() {
        if(!$this->inputAnioInicio && !$this->inputAnioFin) {
            return $this->urlBase."AllField=".$this->inputCadenaBusqueda;
        }
        return $this->urlBase."fillQuickSearch=false&target=advanced&expand=dl&field1=AllField&text1=".$this->inputCadenaBusqueda.$this->inputAnioInicio.$this->inputAnioFin;
    }
}