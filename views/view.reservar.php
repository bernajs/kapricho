<div class="">
  <div class="row px-0 pasos">
    <div class="col-4 paso paso-reservacion">
      <h4><p class="no-paso-p"><span class="no-paso">1</span></p><span class="nombre-paso">Reservación</span></h4>
      <span>Selecciona la fecha y horario</span>
    </div>
    <div class="col-4 paso paso-login">
      <h4><p class="no-paso-p"><span class="no-paso">2</span></p><span class="nombre-paso">Log in</span></h4>
      <span>Ingresa a tu cuenta</span>
    </div>
    <div class="col-4 paso paso-pago">
      <h4><p class="no-paso-p"><span class="no-paso">3</span></p><span class="nombre-paso">Pago</span></h4>
      <span>Realiza el pago y agenda</span>
    </div>
  </div>
  <div class="row reservacion mt-4">
    <div class="col-12 text-center my-4">
        <h4>1. Reservación</h4>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="col-12 col-md-6">
          <h5>Opciones de renta</h5>
          <div class="row">
            <div class="col-12 horario mt-4">
              <h6 class="mb-0">Matutino</h6>
              <span>En un horario entre 9am y 12pm</span>
              <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" alt="">
            </div>
            <div class="col-12 horario mt-4">
              <h6 class="mb-0">Vespertino</h6>
              <span>En un horario entre 9am y 12pm</span>
              <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" alt="">
            </div>
            <div class="col-12 horario mt-4">
              <h6 class="mb-0">Nocturno</h6>
              <span>En un horario entre 9am y 12pm</span>
              <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" alt="">
            </div>
            <div class="col-12 horario mt-4">
              <h6 class="mb-0">Por día</h6>
              <span>En un horario entre 9am y 12pm</span>
              <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" alt="">
            </div>
            <div class="col-12 horario mt-4">
              <h6 class="mb-0">Fin de semana</h6>
              <span>En un horario entre 9am y 12pm</span>
              <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" alt="">
            </div>
            <div class="col-12">
              <button type="button" name="button" class="btn btn-primary br-50 mt-4">Ver pronostico del clima</button>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 mt-4">
          <div id='calendar'></div>
          <button type="button" name="button" class="btn btn-primary br-50 float-right mt-4">Siguiente Login</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row login-registro mt-4">
    <div class="col-12">
      <div class="row justify-content-center">
        <div class="col-12 text-center my-4">
            <h4>2. Log in</h4>
        </div>
          <div class="col-12 col-md-6 login">
            <form>
              <div class="row">
                <div class="col-12 col-md-10">
                  <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" id="correo" value=""class="form-control">
                  </div>
              </div>
              <div class="col-12 col-md-10">
                <div class="form-group">
                  <label for="correo">Contrasena</label>
                  <input type="password" name="correo" value="" id="contrasena" class="form-control">
                </div>
              </div>
              <div class="col-12 col-md-10">
                  <button type="button" name="button"class="btn btn-primary mx-auto fwidth">Iniciar sesión</button>
                  <button type="button" name="button" class="btn btn-primary mx-auto fwidth mt-3">Accesar con Facebook</button>
              </div>
              <div class="col-12 col-md-10 text-center">
                <span class="">Olvidé mis accesos</span>
              </div>
              </div>
            </form>
          </div>
          <div class="col-12 col-md-5 offset-md-1 registro mt-4 mt-md-0">
            <form>
              <div class="row">
                <div class="col-12 col-md-10">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                  </div>
                </div>
                <div class="col-12 col-md-10">
                  <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" id="correo" class="form-control">
                  </div>
                </div>
                <div class="col-6 col-md-5">
                  <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control">
                  </div>
                </div>
                <div class="col-6 col-md-5">
                  <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" id="celular" class="form-control">
                  </div>
                </div>
                <div class="col-12 col-md-10">
                  <div class="form-group">
                    <label for="comentarios">Comentarios</label>
                    <input type="text" name="comentarios" id="comentarios" class="form-control">
                  </div>
                </div>
                <div class="col-12 col-md-10">
                  <button type="button" name="button" class="btn btn-primary fwidth">Registrarme</button>
                </div>
                <div class="col-10 form-check">
                  <p class="mt-3">Aquí pudiera ir una breve descripción de los términos y  condiciones para el registro de usuario por ejemplo.</p>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="" value="">
                    Leí y acepto los términos
                  </label>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
  <div class="row pago mt-4">
    <div class="col-12">
    <div class="row justify-content-around">
    <div class="col-12">
      <h4 class="text-center">3. Pago</h4>
    </div>
    <div class="col-12 col-md-5">
      <h4 class="">Tu reservación</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
      <div class="row">
        <div class="col-12 detalles-pago">
          <span>Quinta: </span> <span class="float-right">Nombre de la quinta</span>
        </div>
        <div class="col-12 detalles-pago">
          <span>Fecha: </span> <span class="float-right">30/Abril/2017</span>
        </div>
        <div class="col-12 detalles-pago">
          <span>Servicio: </span> <span class="float-right">Renta de mesas y sillas</span>
        </div>
        <div class="col-12 detalles-pago">
          <span>Horas: </span> <span class="float-right">Matutino 4 horas</span>
        </div>
        <div class="col-6 offset-6 detalles-pago-total">
          <span>Total: </span> <span class="float-right"><b>$5,000.00</b></span>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-5">
      <div class="row">
        <div class="col-12">
          <span>Total a pagar:</span>
          <h5>$5,000.00</h5>
          <hr>
      </div>
      <div class="col-12">
        <form>
          <div class="row">
            <div class="col-12 form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" value="">
            </div>
            <div class="col-12 form-group">
              <label for="correo">Correo</label>
              <input type="email" name="correo" id="correo" class="form-control" value="">
            </div>
            <div class="col-12 form-group">
              <label for="titular">Titular de la tarjeta</label>
              <input type="text" name="titular" id="titular" class="form-control" value="">
            </div>
            <div class="col-12 form-group">
              <label for="tarjeta">Tarjeta</label>
              <input type="text" name="tarjeta" id="tarjeta" class="form-control" value="">
            </div>
            <div class="col-6 form-group">
              <label for="vigencia">Vigencia</label>
              <input type="text" name="vigencia" id="vigencia" class="form-control" value="">
            </div>
            <div class="col-6 form-group">
              <label for="cvv">Número de seguridad (CVV)</label>
              <input type="text" name="cvv" id="cvv" class="form-control" value="">
            </div>
            <div class="col-8 offset-2 form-group">
                <button type="button" name="button" class="btn btn-primary br-50 fwidth">Pagar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
    </div>
  </div>
</div>


<script type="text/javascript">
var reservacion = $('.reservacion');
var login_registro = $('.login-registro');
var pago = $('.pago');

$('.paso-reservacion').click(function(){
  login_registro.hide('slow');
  pago.hide('slow');
  reservacion.show('slow');
})
$('.paso-login').click(function(){
  login_registro.show('slow');
  pago.hide('slow');
  reservacion.hide('slow');
})
$('.paso-pago').click(function(){
  login_registro.hide('slow');
  pago.show('slow');
  reservacion.hide('slow');
})
</script>

<!-- Calendario -->
<!-- <link rel="stylesheet" href="css/fullcalendar.min.css"> -->
<script src="http://momentjs.com/downloads/moment-with-locales.js" charset="utf-8"></script>
<script src="js/plugins/fullcalendar.js" charset="utf-8"></script>
<style media="screen">
.pasos{
  background-color: gray;
}
.paso{
  border: .3px solid white;
  padding: 10px;
}
  .no-paso-p{
    height: 50px;width: 50px !important;
    background-color: lightgray;
    border-radius: 50px;
    margin: 0px !important;
    display: inline-block;
  }
  .no-paso{
    position: relative;
    left: 35%;
    top: 25%;
  }
  .nombre-paso{
    position: relative;
    left: 12px;
    top: 12px;
  }


  .horario{
    padding: 10px;
    background-color: white;
    border: 1px solid lightgray;
  }

  .horario img{
    position: absolute;
    height: 30px;
    width: 30px;
    border-radius: 50px;
    top: 25%;
    right: 20px;
  }


  .login{
    border-right: 1px solid lightgray;
  }

  .paso{cursor: pointer;}
  .detalles-pago{
    padding:5px;
    border-top: 1px solid lightgray;
  }
  .detalles-pago-total{
    padding:5px;
    border-bottom: 1px solid lightgray;
    border-top: 1px solid lightgray;
  }

  .login-registro, .pago{
    display: none;
  }
</style>
<script type="text/javascript">
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

// var events_array = [
//     {title: 'Test1',start: new Date(2012, 10, 1),allDay: false},
//     {title: 'Test2',start: new Date(2012, 10, 2),allDay: true},
//     {start: '2017-11-10T10:00:00', end: '2017-11-10T16:00:00', rendering: 'background'}
// ];
  $(document).ready(function(){
        $('#calendar').fullCalendar({
          // header: {
          //   left: 'prev,next today',
          //   center: 'title',
          //   right: 'month,agendaWeek,agendaDay'
          // },
      defaultView: 'month',
          // events:events_array,
          dayClick: function(date, jsEvent, view) {
            console.log(view);
            if (view.name === "month") {
                $('#calendar').fullCalendar('gotoDate', date);
                $('#calendar').fullCalendar('changeView', 'agendaDay');
            }
        }
    })
  })
</script>
