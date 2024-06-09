<?php
class ParserACM extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://dl.acm.org/action/doSearch?AllField=";
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