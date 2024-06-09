<?php
class ParserIEEEXplore extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://ieeexplore.ieee.org/search/searchresult.jsp?newsearch=true&queryText=";
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