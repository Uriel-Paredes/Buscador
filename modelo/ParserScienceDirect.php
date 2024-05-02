<?php
class ParserScienceDirect extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://www.sciencedirect.com/search?qs=";
        parent::__construct($formInput);
    }

    function getUrlBusqueda() {
        return $this->urlBase.str_replace(' ', '%20', $this->formInput);
    }
}
?>