<?php
class ParserScienceDirect extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://www.sciencedirect.com/search?qs=";
        $this->formInput = $formInput;
    }

    function getUrlBusqueda() {
        return $this->urlBase.str_replace(' ', '%20', $this->formInput);
    }
}
?>