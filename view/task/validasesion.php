<?php

/* este archivo realiza la peticion para obtener el token */
    require_once "../../controller/controller.php";
    require_once "../../model/model.php";

    class MvcSesion{
        public function viewgetchallenge(){
                $respuesta = MvcController::controllergetchallenge();
                echo $respuesta;
        }
    }

    $data = new MvcSesion();
    $data -> viewgetchallenge();