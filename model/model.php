<?php
class MvcModel{
    //realizo una lista de caja blanca para que cualquier enlace escrito en la url me redirija siempre al inicio
    public function Enlacesmodel($enlace){
        if($enlace=="inicio"){
            $module = "view/views/".$enlace.".php";
        }elseif ($enlace == "index"){
            $module = "view/views/inicio.php";
        }else {
            $module = "view/views/inicio.php";
        }
        return $module;
    }

    // metodo en el cual empezamos a loguearnos en la api y obtencion del token
    public function modelgetchallenge(){
        $url = "https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=getchallenge&username=prueba";
        $resultado = file_get_contents($url);
        return $resultado;
    }

    //metodo que recibe el token que nos da en la funcion anterior para asi obtener el nombre de la session
    public function modelsesionname($tokenmodel){
        $acceskey = md5($tokenmodel.'3DlKwKDMqPsiiK0B');
        $url = "https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php";
        $datos = [
            "operation" => "login",
            "username" => "prueba",
            "accessKey" => $acceskey
        ];
        $opciones = array(
            "http" => array(
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($datos), # Agregar el contenido definido antes
            ),
        );
        $contexto = stream_context_create($opciones);
        $resultado = file_get_contents($url, false, $contexto);
        if ($resultado === false) {
            echo "Error haciendo petición";            
        }
        return $resultado;
    }

    //metodo que recibe el nombre de la session para poder obtener los datos
    public function modeldatos($sessionnamemodel){
        $url = "https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=query&sessionName=".$sessionnamemodel."&query=select%20*%20from%20Contacts;";
        $resultado = file_get_contents($url);
        return  $resultado;
    }
}
