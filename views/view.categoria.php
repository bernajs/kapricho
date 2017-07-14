<?php
  $categorias = $Service->get_categorias();
  $categoria_hombre = '';
  $categoria_mujer = '';
  $categoria_ambos = '';
  if(isset($_GET['id'])){$id = $_GET['id'];}

  if($categorias){foreach ($categorias as $categoria) {
    $count = $Service->get_count_categoria($categoria['id']);
    if(count($count) == 0) continue;
    if($categoria['sexo'] == 1)
    $categoria_hombre .= '<li class="clearfix onCategoria categoria'.$categoria['id'].'" data-id="'.$categoria['id'].'"><span class="pull-right">('.count($count).')</span>'.$categoria['nombre'].'</li>';
    else if($categoria['sexo'] == 2)
    $categoria_mujer .= '<li class="clearfix onCategoria categoria'.$categoria['id'].'" data-id="'.$categoria['id'].'"><span class="pull-right">('.count($count).')</span>'.$categoria['nombre'].'</li>';
    else
    $categoria_ambos .= '<li class="clearfix onCategoria categoria'.$categoria['id'].'" data-id="'.$categoria['id'].'"><span class="pull-right">('.count($count).')</span>'.$categoria['nombre'].'</li>';
  }}



 ?>
 <div class="">
<div class="container margin-t-30">
  <div class="clearfix margin-b-30">
      <!-- <div class="pull-right">
          <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-th"></i> Grid</a>
          <a href="#" class="btn btn-default btn-lg"><i class="fa fa-list"></i> List</a>
      </div> -->
      <div class="pull-left">
          <a class="btn btn-dark btn-lg" role="button" data-toggle="collapse" href="#filter-collapse" aria-expanded="false" aria-controls="filter-collapse">
              <i class="fa fa-tags"></i> Categorias
          </a>
      </div>
  </div>

<div class="clearfix"></div>
<!--filter row-->
<div class="collapse" id="filter-collapse">
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3 margin-b-30">
            <h4>Hombres</h4>
            <ul class="list-unstyled">
              <?php echo $categoria_hombre.$categoria_ambos; ?>
            </ul>
        </div>
        <div class="col-sm-6 col-md-3 margin-b-30">
    <h4>Mujeres</h4>
    <ul class="list-unstyled">
      <?php echo $categoria_mujer.$categoria_ambos; ?>
      <li class="clearfix onCategoria categoria0" data-id="0" style="display:none;"><span class="pull-right">(1)</span>Categoría 0</li><li class="clearfix onCategoria categoria1" data-id="1"><span class="pull-right">(2)</span>Categoría 1</li>
    </ul>
    </div>
  </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row productos">
            </div>
            <div class="space-30"></div>
            <!-- <nav aria-label="Page navigation" class="text-right margin-b-30">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </nav> -->
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      var categoria = <?php if(isset($_GET['id'])) echo $_GET['id']; else echo 0; ?>;
      var buscar = '<?php if(isset($_GET['buscar'])){echo $_GET['buscar'];}else echo ''; ?>';
      if(buscar)Cliente.get_buscar(buscar); else setTimeout(function(){$('.categoria'+categoria).click();}, 100);
    })
</script>
