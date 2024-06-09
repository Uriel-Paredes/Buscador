<?php
class ParserScienceDirect extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://www.sciencedirect.com/search?qs=";
        $this->formInput = $formInput;
    }

    /**
     * @todo [09/06/2024] Implementar la búsqueda con fecha de inicio y fecha de fin
     * @since 1.4.1
     */
    function getUrlBusqueda() {
        return $this->urlBase.str_replace(' ', '%20', $this->formInput);
    }
}
?>