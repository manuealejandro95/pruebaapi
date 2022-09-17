$(document).ready(function() {     
    /*realizamos la peticion a la vista para obtener el token */
   $.get('view/task/validasesion.php', {operation:'getchallenge',username:'prueba'},function(data){     
        let datos = JSON.parse(data);
        if(datos.success == true){
            //se ejecuta la funcion que trae el nombre de la session y mandamos el token como parametro
            sesionname(datos.result["token"]);
        }
   })
});

/*funcion que me trae el nombre de la session enviando la peticion a la vista, recibe el token generado como parametro */
function sesionname(token){
    $.post('view/task/getsessionname.php', {token:token},function(data){   
        let datos = JSON.parse(data);
        if(datos.success == true){
            /* le asignamos el valor de la sessionname a un input */
            $("#sessionname").val(datos.result["sessionName"]);
        }
   })
}

/*captura el evento click del boton y asi muestra los datos finales obtenidos en la peticion.*/
$('#mostrar').click(function(e){
    e.preventDefault();
    $.get('view/task/getdatos', {session:$("#sessionname").val()},function(data){ 
        let datos = JSON.parse(data);
        let template = '';
        if(datos.success == true){
            template+=`                      
                        <table class="table table-sm table-striped-custom text-center">
                            <thead class="bg-custom text-primary">
                                <tr class="h3 font-weight-bold">
                                    <th scope="col">Id</th>
                                    <th scope="col">contact_no</th>
                                    <th scope="col">lastname</th>
                                    <th scope="col">createdtime</th>
                                </tr>
                            </thead>
                            <tbody>`  
                            $.each(datos.result, function(i, item) {
                                template += `                                
                                        <tr class="h0">
                                            <td class="align-middle center">${item.id}</td>
                                            <td class="align-middle center">${item.contact_no}</td>
                                            <td class="align-middle center">${item.lastname}</td>
                                            <td class="align-middle center">${item.createdtime}</td>                  
                                        </tr>                        
                                ` 
                            });
                            template+=` 
                            </tbody>                                                
                        </table>`
        }
        $('#datos').html(template);
   })
});