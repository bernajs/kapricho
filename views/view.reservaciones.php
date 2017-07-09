<div class="row justify-content-center">
  <div class="col-12 mb-4">
    <div class="row justify-content-around">
      <div class="col-2 py-3 detalle text-center">
        <h4 class="mb-0">28</h4>
        <span>Reservaciones</span>
      </div>
      <div class="col-2 py-3 detalle text-center">
        <h4 class="mb-0">$13,045.00</h4>
        <span>Ganancias totales</span>
      </div>
      <div class="col-2 py-3 detalle text-center">
        <h4 class="mb-0">24</h4>
        <span>Reseñas</span>
      </div>
    </div>
  </div>
  <div class="col-12 margint-40">
    <div class="row justify-content-bwtween">
      <div class="col-12 col-md-6">
        <div id='calendar'></div>
      </div>
      <div class="col-12 col-md-5">
        <h4 class="text-center">Datatable</h4>
        <!-- <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"> -->
                <!-- <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Hope</td>
                        <td>Secretary</td>
                        <td>SanF</td>
                        <td>41</td>
                        <td>2010/02/12</td>
                        <td>$109,850</td>
                    </tr>
                    <tr>
                        <td>Vivian</td>
                        <td>Financial</td>
                        <td>SanF</td>
                        <td>62</td>
                        <td>2009/02/14</td>
                        <td>$452,500</td>
                    </tr>
                    <tr>
                        <td>Timothy</td>
                        <td>Office</td>
                        <td>London</td>
                        <td>37</td>
                        <td>2008/12/11</td>
                        <td>$136,200</td>
                    </tr>
                </tbody>
            </table> -->
      </div>
      <div class="col-12 mt-5">
        <div class="row">
          <div class="col-12 col-md-6 agendar">
            <h4 class="">Agendar mi calendario</h4>
            <form>
              <div class="row justify-content-center">
                <div class="col-5 form-group">
                  <label for="mes">Mes</label>
                  <select name="mes" id="mes" class="form-control">
                    <option value="1">1</option>
                    <option value="1">1</option>
                    <option value="1">1</option>
                  </select>
                </div>
                <div class="col-3 form-group">
                  <label for="dia">Día</label>
                  <select name="dia" id="dia" class="form-control">
                    <option value="1">1</option>
                    <option value="1">1</option>
                    <option value="1">1</option>
                  </select>
                </div>
                <div class="col-3 form-group">
                  <label for="Año">Año</label>
                  <select name="Año" id="Año" class="form-control">
                    <option value="1">1</option>
                    <option value="1">1</option>
                    <option value="1">1</option>
                  </select>
                </div>
                <div class="col-11 form-group">
                  <label for="horario">Horario</label>
                  <select name="horario" id="horario" class="form-control">
                    <option value="1">1</option>
                    <option value="1">1</option>
                    <option value="1">1</option>
                  </select>
                </div>
                <div class="col-11 form-group">
                  <button type="button" name="button" class="btn btn-primary fwidth">Agendar</button>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  Calendario -->
<link rel="stylesheet" href="css/fullcalendar.min.css">
<script src="http://momentjs.com/downloads/moment-with-locales.js" charset="utf-8"></script>
<script src="js/plugins/fullcalendar.min.js" charset="utf-8"></script>
<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.15/af-2.2.0/cr-1.3.3/r-2.1.1/rr-1.2.0/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.15/af-2.2.0/cr-1.3.3/r-2.1.1/rr-1.2.0/datatables.min.js"></script>

<style media="screen">
  .detalle, .agendar{
    background-color: lightgray;
  }
  .agendar{
    padding:50px;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('#calendar').fullCalendar({})
    $('#example').DataTable();
  })
</script>
