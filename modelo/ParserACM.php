<?php
class ParserACM extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://dl.acm.org/action/doSearch?";
        $this->formInput = $formInput;
    }

    /**
     * @since 1.4.1
     */
    function getUrlBusqueda() {
        if(empty($this->formInput["anioInicio"]) && empty($this->formInput["anioFin"])) {
            return $this->urlBase."AllField=".str_replace(' ', '+', $this->formInput["buscar"]);
        }
        if(!empty($this->formInput["anioInicio"])) {
            $anioInicio="&AfterYear=".$this->formInput["anioInicio"];
        }
        if(!empty($this->formInput["anioFin"])) {
            $anioFin="&BeforeYear=".$this->formInput["anioFin"];
        }
        return $this->urlBase."fillQuickSearch=false&target=advanced&expand=dl&field1=AllField&text1=".str_replace(' ', '+', $this->formInput["buscar"]).$anioInicio.$anioFin;
    }
}
?>