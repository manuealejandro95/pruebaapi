<?php
/* aqui realizamos la peticion para obtener el nombre de la session */
    require_once "../../controller/controller.php";
    require_once "../../model/model.php";

    class Validausuario{
      public $token;

      public function Viewsesionname(){
          $tokenview = $this->token;
          $respuesta = MvcController::controllersesionname($tokenview);
          echo $respuesta;
      }
  }

  $session = new Validausuario();
  $session -> token = $_POST["token"];
  $session -> Viewsesionname();