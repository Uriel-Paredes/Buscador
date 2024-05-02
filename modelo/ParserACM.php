<?php
class ParserACM extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://dl.acm.org/action/doSearch?AllField=";
        parent::__construct($formInput);
    }

    function getUrlBusqueda() {
        return $this->urlBase.str_replace(' ', '+', $this->formInput);
    }
}
?>