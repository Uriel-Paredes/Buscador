<?php
class ControlGUIForm {

    protected $arrayPost;
    protected $checkACM;
    protected $checkScienceDirect;
    protected $checkIEEEXplore;
    protected $checkSpringerLink;
    protected $inputBuscar;

    function __construct($arrayPost = false) {
        $this->arrayPost = $arrayPost;
        $this->checkACM = "checked";
        $this->checkScienceDirect = "checked";
        $this->checkIEEEXplore = "checked";
        $this->checkSpringerLink = "checked";
        if(!$this->esBusquedaValida()) {
            return true;
        }
        if(!isset($this->arrayPost["bd"]["acm"])) $this->checkACM = null;
        if(!isset($this->arrayPost["bd"]["scienceDirect"])) $this->checkScienceDirect = null;
        if(!isset($this->arrayPost["bd"]["ieeeXplore"])) $this->checkIEEEXplore = null;
        if(!isset($this->arrayPost["bd"]["springerLink"])) $this->checkSpringerLink = null;
        $this->inputBuscar = $this->arrayPost["buscar"];
    }
    function getCheckACM() {
        return $this->checkACM;
    }
    function getCheckScienceDirect() {
        return $this->checkScienceDirect;
    }
    function getCheckIEEEXplore() {
        return $this->checkIEEEXplore;
    }
    function getCheckSpringerLink() {
        return $this->checkSpringerLink;
    }
    function getInputBuscar() {
        return $this->inputBuscar;
    }
    function esBusquedaValida() {
        return (isset($this->arrayPost) && isset($this->arrayPost["bd"]));
    }
}
?>