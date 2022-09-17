<?php
/* aqui finalmente obtenemos los datos para despues mostrarlos */
    require_once "../../controller/controller.php";
    require_once "../../model/model.php";

    class ObtenerDatos{
      public $sessionname;

      public function viewdatos(){
          $sessionnameview = $this->sessionname;
          $respuesta = MvcController::controllerdatos($sessionnameview);
          echo $respuesta;
      }
  }

  $session = new ObtenerDatos();
  $session -> sessionname = $_GET["session"];
  $session -> viewdatos();