<?php
class Parser {
    
    protected $urlBase;
    protected $formInput;
    protected $inputAnioInicio;
    protected $inputAnioFin;
    protected $inputCadenaBusqueda;

    function __construct($formInput) {
        $this->urlBase = "http://.../";
        $this->formInput = $formInput;
        $this->setInputCadenaBusqueda();
        $this->setInputAnioInicio();
        $this->setInputAnioFin();
    }

    function setInputCadenaBusqueda() {
        $this->inputCadenaBusqueda = htmlspecialchars($this->formInput["buscar"]);
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

    function getUrlBusqueda() {
        return $this->urlBase.$this->inputCadenaBusqueda;
    }
}