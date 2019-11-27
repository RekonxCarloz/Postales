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
     // Boton agregar
    $("#btnNuevo").click(function(){
        $("#formPersonas")[0].reset();
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Usuario");            
        $("#modalCRUD").modal("show");        
        id=null;
        opcion = 1; //alta
    });

    var fila; // Captura la fila para editar o borrar el registro

    //Botón editar
    $(document).on('click','.btnEditar',function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text()); //Guarda en la variable id el valor de 
                                                    //la columna 0 (La primera) y la fila en la que se clickeo el boton editar
        nombre = fila.find('td:eq(1)').text();
        email = fila.find('td:eq(2)').text();
        celular = fila.find('td:eq(3)').text();
        fecha = fila.find('td:eq(5)').text();
        
        $('#nombre').val(nombre);
        $('#email').val(email);
        $('#mobile').val(celular);
        $('#date').val(fecha);
        $('input[name=gender]').val();
        
        opcion = 2; // editar
        $('#password').prop('disabled',true);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Usuario");            
        $("#modalCRUD").modal("show");
    });

    //Botón borrar
    $(document).on('click','.btnBorrar',function(){
        opcion = 3; // borrar
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text()); //Guarda en la variable id el valor de 
        //la columna 0 (La primera) y la fila en la que se clickeo el boton borrar
        $.confirm({
            title: "<h4 class='text-info text-danger text-center'>¿Eliminar?</h4>",
            content: "<p class='text-center'>¿Estas seguro de eliminar el registro "+id+'?',
            icon: "fas fa-exclamation fa-2x",
            type: "red",
            typeAnimated: true,
            autoClose: 'cancelar|8000',
            buttons: {
                eliminar: {
                    btnClass: 'btn-danger',
                    action: function() {
                        $.ajax({
                            url: "http://localhost:8888/Postales/Administrador/crudAjax",
                            type: "POST",
                            dataType: 'json',
                            data: {opcion:opcion,id:id},
                            cache: false,
                            success: function (respAX) {
                                tablaPersonas.row(fila.parents('tr')).remove().draw();
                                $.alert({
                                    title: 'Información del usuario:',
                                    content: "<p class='text-center'>Usuario eliminado exitosamente</p>",
                                    icon: "fas fa-check fa-2x",
                                    type: "green",
                                });   
                            }
                        });
                    }
                },
                cancelar: {
                    action: function() {
                        $.alert({
                            title: 'Información del usuario:',
                            content: "<p class='text-center'>La acción fue cancelada</p>",
                            icon: "fas fa-exclamation fa-2x",
                            type: "red",
                        });
                    }
                }
            }
        });
        
    });


    $("#formPersonas").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            nombre = $.trim($('#nombre').val());
            password = $.trim($('#password').val());
            email = $.trim($('#email').val());
            mobile = $.trim($('#mobile').val());
            date = $.trim($('#date').val());
            gender = $.trim($('input[name=gender]:checked').val());
            privilegio = $.trim($('input[name=privilegio]:checked').val());
            $.ajax({
                url: "http://localhost:8888/Postales/Administrador/crudAjax",
                type: "POST",
                dataType: "json",
                data: {nombre:nombre, password:password, email:email, mobile:mobile, date:date, gender:gender, privilegio:privilegio, id:id, opcion:opcion},
                cache: false,
                success: function(respAX){  
                    if (opcion == 1) { //Si es 1 significa que apreto agregar y se añade una fila al final de la tabla
                        tablaPersonas.row.add([respAX.id,respAX.nombre,respAX.email,respAX.celular,respAX.genero,respAX.fecha,respAX.privilegio]).draw();
                    } else { // Si no entonces reescribe la fila donde se presiono editar
                        tablaPersonas.row(fila).data([respAX.id,respAX.nombre,respAX.email,respAX.celular,respAX.genero,respAX.fecha,respAX.privilegio]).draw();
                    }          
                }        
            });
            $("#modalCRUD").modal("hide"); 
        }
    });
});