$(document).ready(function () {
    tablaPersonas = $("#tablaPersonas").DataTable({
        "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
        }],
            
            //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing":"Procesando...",
        }
    });
    
    $("#btnNuevo").click(function(){
        $("#formPersonas").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Usuario");            
        $("#modalCRUD").modal("show");        
        id=null;
        opcion = 1; //alta
    });

    /*$("#formPersonas").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            //e.preventDefault();
            $.ajax({
                
            });
        }
    });*/

    $("#formPersonas").submit(function(e){
        e.preventDefault();     
        $.ajax({
            url: "http://localhost:8888/Postales/Administrador/crudAjax",
            type: "POST",
            data: $("#formPersonas").serialize(),
            cache: false,
            success: function(respAX){  
                var AX = JSON.parse(respAX);
                tablaPersonas.row.add([AX.id,AX.nombre,AX.email,AX.celular,AX.genero,AX.fecha,AX.privilegio]).draw();
                /*if(opcion == 1){tablaPersonas.row.add([id,nombre,pais,edad]).draw();}
                else{tablaPersonas.row(fila).data([id,nombre,pais,edad]).draw();} */           
            }        
        });
        $("#modalCRUD").modal("hide");    
        
    });
});