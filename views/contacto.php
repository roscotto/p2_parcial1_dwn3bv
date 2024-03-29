<?php

?>
<!--seccion contacto-->
         <section class="contacto" class="py-5">
            
             <div id="container-formulario" class="row container mx-auto py-5 d-flex">                
             <?= (new Alerta())->mostrar_alertas() ?>    
             <div class="col-sm-12 col-lg-7 d-flex">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#8EA3A6" class="bi bi-envelope-heart-fill" viewBox="0 0 16 16">
                         <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555l-4.2 2.568a2.785 2.785 0 0 0-.051-.105c-.666-1.3-2.363-1.917-3.699-1.25-1.336-.667-3.033-.05-3.699 1.25l-.05.105L.05 3.555ZM11.584 8.91a4.694 4.694 0 0 1-.073.139L16 11.8V4.697l-4.003 2.447c.027.562-.107 1.163-.413 1.767Zm-4.135 3.05c-1.048-.693-1.84-1.39-2.398-2.082L.19 12.856A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144L10.95 9.878c-.559.692-1.35 1.389-2.398 2.081L8 12.324l-.551-.365ZM4.416 8.91c-.306-.603-.44-1.204-.413-1.766L0 4.697v7.104l4.49-2.752a4.742 4.742 0 0 1-.074-.138Z" />
                         <path d="M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
                     </svg>
                     <h2 class="ps-3">Contacto</h2>                     
                 </div>
                 <div class="col-sm-12  col-lg-7">
                     <em>Suscribite a nuestro newsletter y recibí las últimas novedades y promociones.</em>
                 </div>

                 <div class="col-12 col-lg-7 col-xxl-7">
                     <form class="row g-3" action="actions/procesar_contacto.php" method="POST">
                         <div class="col-xxl-6">
                             <label for="inputNombre" class="form-label">Nombre(*)</label>
                             <input type="text" class="form-control border-brown" id="inputNombre" name="inputNombre" placeholder="Juan" >
                         </div>
                         <div class="col-xxl-6">
                             <label for="inputApellido" class="form-label">Apellido</label>
                             <input type="text" class="form-control border-brown" id="inputApellido" name="inputApellido" placeholder="Pérez" >
                         </div>
                         <div class="col-xxl-6">
                             <label for="inputEmail" class="form-label">Email(*)</label>
                             <input type="email" class="form-control border-brown" id="inputEmail" name="inputEmail" aria-describedby="d-email" >
                             <p class="form-text" id="d-email">emaildeejemplo@hotmail.com</p>
                         </div>
                         <div class="col-xxl-6">
                            <label class="form-label" for="inputTelefono">Teléfono(*)</label>
                            <input class="form-control border-brown" type="text" name="inputTelefono" id="inputTelefono" placeholder="54 9 11 xxxx xxxx " oninput="validarNumerico(event)">                            
                            <p class="form-text" id="inputTelefono">solo números, sin guiones.</p>
                         </div>
                         <div class="mb-3 col-xxl-12">
                             <label for="inputComentario" class="form-label">Comentario(*)</label>
                             <textarea class="form-control border-brown" id="inputComentario" name="inputComentario" rows="5" ></textarea>
                         </div>
                         
                         
                         <div class="col-xxl-12">
                             <button type="submit" class="btn  shadow-sm btn-grey-white w-100">Enviar</button>
                         </div>
                     </form>
                 </div>

             </div>

         </section>

<script>
    function validarNumerico(event) {
        const input = event.target;
        const soloNumeros = input.value.replace(/\D/g, ''); // Remueve todos los caracteres que no sean dígitos
        input.value = soloNumeros;
    }
</script>