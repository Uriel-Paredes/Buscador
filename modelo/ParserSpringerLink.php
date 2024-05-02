<?php
class ParserSpringerLink extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://link.springer.com/search?new-search=true&query=";
        $this->formInput = $formInput;
    }

    function getUrlBusqueda() {
        return $this->urlBase.str_replace(' ', '+', $this->formInput);
    }
}
?>