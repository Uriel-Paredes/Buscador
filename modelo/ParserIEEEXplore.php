<?php
class ParserIEEEXplore extends Parser {

    function __construct($formInput) {
        $this->urlBase = "https://ieeexplore.ieee.org/search/searchresult.jsp?";
        $this->formInput = $formInput;
    }

    /**
     * @since 1.4.1
     */
    function getUrlBusqueda() {
        if(empty($this->formInput["anioInicio"]) && empty($this->formInput["anioFin"])) {
            return $this->urlBase."newsearch=true&queryText=".str_replace(' ', '%20', $this->formInput["buscar"]);
        }
        $anioInicio="";
        $anioFin="";
        if(!empty($this->formInput["anioInicio"])) {
            $anioInicio=$this->formInput["anioInicio"];
        }
        if(!empty($this->formInput["anioFin"])) {
            $anioFin=$this->formInput["anioFin"];
        }
        return $this->urlBase."action=search&newsearch=true&matchBoolean=true&queryText=(\"All%20Metadata\":".str_replace(' ', '%20', $this->formInput["buscar"]).")&ranges=".$anioInicio."_".$anioFin."_Year";
    }
}
?>