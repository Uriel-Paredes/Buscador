<?php
class ParserSpringerLink extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://link.springer.com/search?new-search=true&query=";
        $this->formInput = $formInput;
    }

    /**
     * @since 1.4.1
     */
    function getUrlBusqueda() {
        if(empty($this->formInput["anioInicio"]) && empty($this->formInput["anioFin"])) {
            return $this->urlBase.str_replace(' ', '+', $this->formInput["buscar"]);
        }
        $anioInicio="";
        $anioFin="";
        if(!empty($this->formInput["anioInicio"])) {
            $anioInicio=$this->formInput["anioInicio"];
        }
        if(!empty($this->formInput["anioFin"])) {
            $anioFin=$this->formInput["anioFin"];
        }
        return $this->urlBase.str_replace(' ', '+', $this->formInput["buscar"])."&date=custom&dateFrom=".$anioInicio."&dateTo=".$anioFin."&sortBy=relevance";
    }
}
?>