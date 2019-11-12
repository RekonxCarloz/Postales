
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Iniciar Sesión</h2>
                    <p>Accede con tu correo electrónico y contraseña.</p>
                </div>
                <form id="formLogin">
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email" name="email" data-validetta="required,email,maxLength[32]"></div>
                    <div class="form-group"><label for="password">Contraseña</label><input class="form-control" type="password" id="password" name="contrasena" data-validetta="required,minLength[5],maxLength[32]"></div>
                    <div class="form-group">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox" name="sesionIniciada" value="1"><label class="form-check-label" for="checkbox">Mantener iniciada la sesión</label></div>
                    </div><button class="btn btn-primary btn-block" type="submit">Iniciar sesión</button>
                </form>
            </div>
        </section>
    </main>
<script>
 $(document).ready(function(){
        $("#formLogin").validetta({
            bubblePosition: 'bottom',
            bubbleGapTop: 10,
            bubbleGapLeft: -5,
            onValid:function(e){
                e.preventDefault();
                $.ajax({
                    method:"POST",
                    url:"<?php base_url(); ?>Procesamiento/loginAjax",
                    data:$("#formLogin").serialize(),
                    cache:false,
                    success:function(respAX){
                        var tipoAlerts = new Array("red","blue","green");
                        var AX = JSON.parse(respAX);
                        $.alert({
                            title:AX.title,
                            icon: AX.icon,
                            content:AX.msj,
                            type:tipoAlerts[AX.val],
                            onDestroy:function(){
                                if (AX.val == 2) {
                                    window.location.replace("<?php base_url()?>SesionActivaUser");
                                } else if(AX.val == 1) {
                                    window.location.replace("<?php base_url()?>SesionActivaAdmin");
                                } else {
                                    $('#formLogin')[0].reset();
                                }
                            }
                        });
                    }
                });
            }
        });
    });
</script>