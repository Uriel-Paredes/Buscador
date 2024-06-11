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
        if(empty($this->formInput["anioInicio"]) && empty($this->formInput["anioFin"])) {
            return $this->urlBase.str_replace(' ', '%20', $this->formInput["buscar"]);
        }
        $anioInicio="";
        $anioFin="";
        if(!empty($this->formInput["anioInicio"])) {
            $anioInicio=$this->formInput["anioInicio"];
        }
        if(!empty($this->formInput["anioFin"])) {
            $anioFin=$this->formInput["anioFin"];
        }
        if($anioInicio==$anioFin) {
            return $this->urlBase.str_replace(' ', '%20', $this->formInput["buscar"])."&date=".$anioInicio;
        }
        if(empty($anioInicio)) {
            return $this->urlBase.str_replace(' ', '%20', $this->formInput["buscar"])."&date=0000-".$anioFin;
        }
        if(empty($anioFin)) {
            return $this->urlBase.str_replace(' ', '%20', $this->formInput["buscar"])."&date=".$anioInicio."-".date("Y");
        }
        return $this->urlBase.str_replace(' ', '%20', $this->formInput["buscar"])."&date=".$anioInicio."-".$anioFin;
    }
}
?>