<div class="container">

    <div class="row"></div>

    <div class="col-12 p-4 mx-auto">
        <h2 class="text-center mt-5 mb-4">Checkout</h2>

        <section id="medios-pago" class="py-5">
            <div class="container">
                <div id="container-formulario" class="row  mx-auto py-5 d-flex">
                    <div class="col-sm-12 col-lg-7 d-flex">
                        <h3>Método de pago</h3>
                    </div>
                    <div class="col-sm-12 col-lg-7 d-flex flex-column">
                        <div class="form-check">
                            <input class="form-check-input mt-4" type="radio"  onclick="ocultarMostrarTarjeta('ocultar');" name="flexRadioDefault"
                                id="flexRadioMercadoPago" checked>
                            <label class="form-check-label" for="flexRadioMercadoPago">
                                Mercado Pago
                            </label>
                            <img src="./img/checkout/pago-mp.jpg" alt="Mercado Pago">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input mt-4" type="radio"  onclick="ocultarMostrarTarjeta('mostrar');" name="flexRadioDefault"
                                id="flexRadioTarjetaCredito">
                            <label class="form-check-label" for="flexRadioTarjetaCredito">
                                Tarjeta de Crédito
                            </label>
                            <img src="./img/checkout/pago-visa.jpg" alt="Visa">
                            <img src="./img/checkout/pago-master.jpg" alt="MasterCard">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input mt-4" type="radio"  onclick="ocultarMostrarTarjeta('ocultar');" name="flexRadioDefault"
                                id="flexRadioEfectivo">
                            <label class="form-check-label" for="flexRadioEfectivo">
                                Efectivo / Transferencia
                            </label>
                           
                            <img src="./img/checkout/pago-rapi.jpg" alt="Rapi pago">
                            <img src="./img/checkout/pago-transfer.jpg" alt="Transferencia">
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="container" id="tarjetaDatos">
                        <h3 class="mt-5">Ingresá los datos de tu tarjeta</h3>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label" for="inputtarjeta">Número *</label>
                                <input autocomplete="off" onchange="quitarError(this)" class="form-control border-dark-violet" type="number" name="inputtarjeta"
                                    id="inputtarjeta" placeholder="xxxx xxxx xxxx xxxx" aria-describedby="d-tarjeta"
                                >
                                <span id="text"></span>
                                <p class="form-text" id="d-tarjeta">Sin espacios</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="inputvto">Vencimiento *</label>
                                <input autocomplete="off" onchange="quitarError(this)" class="form-control border-dark-violet" type="number" name="inputvto"
                                    id="inputvto" placeholder="xx / xx" aria-describedby="d-vencimiento" minlength="5">
                                <span id="text"></span>
                                <p class="form-text" id="d-vencimiento">Respetando el formato mes/año. Ej: 03/23</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="inputCodigo">Cod. de Seguridad *</label>
                                <input autocomplete="off" onchange="quitarError(this)" class="form-control border-dark-violet" type="number" name="inputCodigo"
                                    id="inputCodigo" placeholder="XXX" aria-describedby="d-codigo" minlength="3">
                                <span id="text"></span>
                            </div>
                            <div class="col-12 pt-4">
                                <label for="inputNombreTarjeta" class="form-label">Nombre como figura en la tarjeta *</label>
                            <input autocomplete="off" type="text" onchange="quitarError(this)" class="form-control border-dark-violet" id="inputNombreTarjeta"
                                name="inputNombreTarjeta" placeholder="Juan">
                            <span id="text"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 border-bottom border-2 py-2"></div>
                </div>

                <div class="col-12 col-lg-7 col-xxl-7">
                    <form class="row g-3" action="#" method="post"  autocomplete="off">
                        <div class="col-sm-12 col-lg-7 d-flex mt-md-4">
                            <h2>Datos para facturación</h2>
                        </div>
                        <div class="col-xxl-6">
                            <label for="inputNombre" class="form-label">Nombre *</label>
                            <input autocomplete="off" type="text" onchange="quitarError(this)" class="form-control border-dark-violet" id="inputNombre"
                                name="inputNombre" placeholder="Juan" >
                            <span id="text"></span>
                        </div>
                        <div class="col-xxl-6">
                            <label for="inputApellido" class="form-label">Apellido *</label>
                            <input type="text" onchange="quitarError(this)" class="form-control border-dark-violet" id="inputApellido"
                                name="inputApellido" placeholder="Pérez" >
                            <span id="text"></span>
                        </div>
                        <div class="col-xxl-6">
                            <label class="form-label" for="inputdni">DNI *</label>
                            <input onchange="quitarError(this)" class="form-control border-dark-violet" type="number" name="inputdni" id="inputdni"
                                placeholder="12345678" aria-describedby="d-dni" minlength="8">
                            <span id="text"></span>
                            <p class="form-text" id="d-dni">Sin puntos ni espacios</p>
                        </div>
                        <div class="col-xxl-6">
                            <label for="inputEmail" class="form-label">Email *</label>
                            <input type="email" onchange="quitarError(this)" class="form-control border-dark-violet" id="inputEmail"
                                name="inputEmail" aria-describedby="d-email">
                            <span id="text"></span>
                            <p class="form-text" id="d-email">emaildeejemplo@hotmail.com</p>
                        </div>
                        <div class="col-xxl-6">
                            <label class="form-label" for="inputelefono">Teléfono *</label>
                            <input onchange="quitarError(this)" class="form-control border-dark-violet" type="number" name="inputelefono"
                                id="inputelefono" placeholder="+ 54 9 11 xxxx xxxx ">
                            <span id="text"></span>
                        </div>
                        <div class="col-12 border-bottom border-2 py-2"></div>
                        <div class="col-sm-12 col-lg-7 d-flex mt-md-4">
                            <h2>Datos de envío: </h2>
                            <h3 class="ps-2">Calle 144 N° 1121 La Plata</h3>
                        </div>
                        <div>
                            <div class="col-sm-12 col-lg-7 d-flex flex-column">
                                <div class="form-check">
                                    <input class="form-check-input mt-4" onclick="mostrarCostoEnvio(200)" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Correo Argentino: $200
                                    </label>
                                    <img src="./img/checkout/correo-arg.jpg" alt="Correo Argentino">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input mt-4" onclick="mostrarCostoEnvio(500)" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2" >
                                    <label class="form-check-label"  for="flexRadioDefault2">
                                        Correo Privado: $500
                                    </label>
                                    <img src="./img/checkout/correo-priv.jpg" alt="Correo Privado">

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input mt-4" onclick="mostrarCostoEnvio(0)" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1" checked>
                                    <label class="form-check-label"  for="flexRadioDefault1">
                                        Acordar con el vendedor: $0
                                    </label>
                                    <img src="./img/checkout/envio-acordar.jpg" alt="  Acordar con el vendedor">
                                </div>
                            </div>

                            <div class="col-12 border-bottom border-2 py-2"></div>
                            <div class="container py-5">
                                <div>
                                    <h2>Resúmen de tu compra</h2>
                                    <ul id="listaCarrito">

                                    </ul>
                                    <p class="h6"><b>Cantidad de productos: </b><span id="tuTotalCantidad"></span>
                                    </p>
                                    <div class="col-12 border-bottom border-2 py-2 mb-2"></div>
                                    <p class="h6"><b>Sub Total:</b> $ <span id="valorSubtotalCompra"></span></p>
                                    <div class="col-12 border-bottom border-2 py-2 mb-2"></div>
                                    <p class="h6"><b>Costo de Envío:</b> $ <span id="valorEnvio"></span> </p>
                                    <div class="col-12 border-bottom border-2 py-2 mb-2"></div>
                                    <p class="h6"><b>Total: </b>$ <span id="valorTotalCompra"></span></p>
                                </div>

                            </div>

                            <div class="col-xxl-12">
                                <input type="submit" onclick="validarForm();" class="btn  shadow-sm btn-violet-gradient" value="Finalizar compra">
                            </div>
                    </form>
                </div>
            </div>
            </div>

        </section>



    </div>
</div>