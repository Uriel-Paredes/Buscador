<?php
class ParserIEEEXplore extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://ieeexplore.ieee.org/search/searchresult.jsp?newsearch=true&queryText=";
        parent::__construct($formInput);
    }

    function getUrlBusqueda() {
        return $this->urlBase.str_replace(' ', '%20', $this->formInput);
    }
}
?>