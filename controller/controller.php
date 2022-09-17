<?php
class MvcController {

    public function inicio(){
        include "view/template.php";
    }

    /*este metodo nos permite obtener la vista en el modelo para posteriormente mostrar al cliente. Se obtiene una variable get con el fin de guardar la pagina que el cliente desea ver.*/
    public function Enlacescontroller(){
        if(isset($_GET['action'])){
            $enlace = $_GET['action'];
        }else{
            $enlace = "index.php";
        }
        $respuesta = MvcModel::Enlacesmodel($enlace);
        include $respuesta;
    }

    //metodo que obtiene la respuesta de la funcion del modelo para mandar el token a la vista
    public function controllergetchallenge(){
        $respuesta = MvcModel::modelgetchallenge();
        return $respuesta;
    }

    //metodo que envia que recibe el token como parametro desde la vista para asi obtener el nombre de la session
    //y porteriormente obtener los datos
    public function controllersesionname($tokencontroller){
        $respuesta = MvcModel::modelsesionname($tokencontroller);
        return $respuesta;
    }

    /*metodo que obtiene los datos del model, se le manda el nombre de la session como parametro a la funcion del modelo y manda la respuesta a la vista */
    public function controllerdatos($sessionnamecontroller){
        $respuesta = MvcModel::modeldatos($sessionnamecontroller);
        return $respuesta;
    }
}