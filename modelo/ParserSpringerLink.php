<?php
class ParserSpringerLink extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://link.springer.com/search?new-search=true&query=";
        $this->formInput = $formInput;
    }

    /**
     * @todo [09/06/2024] Implementar la búsqueda con fecha de inicio y fecha de fin
     * @since 1.4.1
     */
    function getUrlBusqueda() {
        return $this->urlBase.str_replace(' ', '+', $this->formInput);
    }
}
?>