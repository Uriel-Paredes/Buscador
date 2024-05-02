<?php
class Parser {
    
    protected $urlBase;
    protected $formInput;

    function __construct($formInput) {
        $this->formInput = $formInput;
    }

    function getUrlBusqueda() {
        return $this->urlBase.$this->formInput;
    }
}
?>