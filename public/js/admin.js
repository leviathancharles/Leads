$(document).ready(function(){
    obtenerDatos();



})
const url ="http://127.0.0.1:8000"

function obtenerDatos( filtro = null, tipo = null){
    $("#listado").empty();
    $.ajax({
        url: url+"/listado-estudiantes",
        type: 'get',
        data : {'filtro': filtro, 'tipo' : tipo},
        success: function(response){
            if(response.status == "vacio"){
                $("#listado").append("<tr><td colspan='5'>"+response.mensaje+"</td></tr>")
            }else{
                let datos = JSON.parse(JSON.stringify(response.listado));

                datos.forEach(elemento => {
                    $("#listado").append("<tr><td>"+elemento.nombre+"</td><td>"+elemento.apellido+"</td><td>"+elemento.telefono_contacto+"</td><td>"+elemento.programa+"</td><td>"+elemento.estado+"<input onchange='actualizarContacto(this.value)' type='checkbox' value = "+elemento.id+" name='valor' id='valor'></td></tr>")
                });
            }



        }

    })
}

function actualizarContacto(valor){
    $.ajax({
        url: url+"/cambiar-contacto",
        type: 'get',
        data: {'valor': valor},
        success: function(){
            $("#listado").empty();
            obtenerDatos();
        }
    })
}

function buscarElemento(){
    let valor = $("#buscar").val();
    let tipo = "buscador";
    if(valor == ''){
        obtenerDatos()

    }else{
        obtenerDatos(valor, tipo)
    }
}

function ordenarElemento(){
    let valor = $("#filtro-ordenar").val();
    let tipo = "ordenar";
    if(valor != ''){
        obtenerDatos(valor, tipo)
    }else{
        obtenerDatos()
    }
}
