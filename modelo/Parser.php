<?php
class Parser {
    
    protected $urlBase;
    protected $formInput;

    function __construct($formInput) {
        $this->urlBase = "http://.../";
        $this->formInput = $formInput;
    }

    function getUrlBusqueda() {
        return $this->urlBase.$this->formInput;
    }
}
?>