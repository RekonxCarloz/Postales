<body>
  <div class="fixed-top">
    <nav class="navbar navbar-light navbar-expand-lg bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="index.php">iPostal</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>inicio">Inicio</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>caracteristicas">Características</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>postales">Postales</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>about">Acerca de</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>contacto">Contáctanos</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php base_url(); ?>login">Login</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php base_url(); ?>registro">Registrarme</a></li>
                </ul>
            </div>
        </div>
    </nav>
  </div>
<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Registro</h2>
                    <p>Registrate con tu nombre completo y un correo electr&oacute;nico.&nbsp;</p>
                </div>
                <form id="formRegistro">
                    <div class="form-group"><label for="name">Nombre completo</label><input class="form-control item" type="text" id="name" name="name" data-validetta="required,maxLength[64]"></div>
                    <div class="form-group"><label for="password">Contrase&ntilde;a</label><input class="form-control item" type="password" id="password" name="password" data-validetta="required,minLength[6],maxLength[32]"></div>
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" placeholder="ejemplo@dominio.com" id="email" name="email" data-validetta="required,email,maxLength[32]"></div>
                    <div class="form-group"><label for="mobile">M&oacute;vil</label><input class="form-control item" type="tel" id="mobile" name="mobile" data-validetta="required,number,minLength[10],maxLength[10]"></div>
                    <div class="form-group"><label for="gender">Sexo:</label></div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="radio" id="gender" name="gender" value="m" checked>
                        <label class="form-check-label" for="gender">
                            Masculino
                        </label>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="radio" id="gender2" name="gender" value="f">
                        <label class="form-check-label" for="gender2">
                            Femenino
                        </label>
                    </div>
                    <div class="form-group"><label for="date">Fecha de Nacimiento</label><input class="form-control item" type="date" id="date" name="date" data-validetta="required"></div>
                    <input type="submit" id="register-submit" name="register-submit" class="btn btn-primary btn-block" type="submit" value="Registrarme">
                </form>
            </div>
          </section>

</main>
<script>
    $(document).ready(function(){
        $("#formRegistro").validetta({
            bubblePosition: 'bottom',
            bubbleGapTop: 10,
            bubbleGapLeft: -5,
            onValid:function(e){
                e.preventDefault();
                $.ajax({
                    method:"POST",
                    url:"<?php base_url(); ?>Procesamiento/registroAjax",
                    data:$("#formRegistro").serialize(),
                    cache:false,
                    success:function(respAX){
                        var tipoAlerts = new Array("red","green");
                        var AX = JSON.parse(respAX);
                        $.alert({
                            title:"<h4 class='text-info'>Estado del registro:</h4>",
                            content:AX.msj,
                            type:tipoAlerts[AX.val],
                            onDestroy:function(){
                                window.location.replace("index.php");
                            }
                        });
                    }
                });
            }
        });
    });
</script>