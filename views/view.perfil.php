<?php
 if(!$uid) header("Location: login.php");

 $usuario = $Service->get_usuario($uid);
 if($usuario){
   $usuario = $usuario[0];
   $compras = $Service->get_compras($uid);
   $favoritos = $Service->get_favoritos($uid);
   $buffer_compras = '';
   if($compras){foreach ($compras as $compra) {
     $productos = $Service->get_producto_compra($compra['id']);
     $total = 0;
     foreach ($productos as $producto) {
       $total += $producto['cantidad'] * $producto['precio'];
     }
     $buffer_compras .= '<tr class="">
                         <td class="item-thumb">
                             '.count($productos).'
                         </td>
                         <td class="item-name">
                             <h4><a href="#">$'.number_format($total, 2).'</a></h4>
                         </td>
                         <td class="item-price">
                             <h4>'.$compra['created_at'].'</h4>
                         </td>
                         <td class="item-count" style="width: 120px">
                            <h4>'.$compra['status'].'</h4>
                         </td>
                         <td class="item-remove">
                             <a class="removeItem" data-id="" href="#"><i class="fa fa-eye"></i></a>
                         </td>
                     </tr>';
   }}

   if($favoritos){foreach ($favoritos as $favorito) {
     $buffer_fav .= '<tr class="">
                         <td class="item-thumb">

                         </td>
                         <td class="item-name">
                             <h4><a href="#">'.$favorito['nombre'].'</a></h4>
                         </td>
                         <td class="item-price">
                             <h4>'.number_format($favorito['precio'], 2).'</h4>
                         </td>
                         <td class="">
                             <a class="" data-id="" href="index.php?call=producto&id='.$favorito['id_producto'].'"><i class="fa fa-eye"></i></a>
                         </td>
                     </tr>';
   }
   }


 }
 ?>

<div class="row">
    <div class="col-xs-12 margin-t-50">
        <h3 class="text-center margin-t-50 margin-b-40">Mi perfil</h3>
        <div>
            <!-- Nav tabs -->
            <div class="row">
              <div class="col-md-8 col-md-offset-2 col-xs-12">
            <ul class="tabs-nav list-inline" role="tablist">
                <li role="presentation" class="active"><a href="#perfil" aria-controls="perfil" role="tab" data-toggle="tab">Perfil</a></li>
                <li role="presentation"><a href="#compras" aria-controls="compras" role="tab" data-toggle="tab">Mis compras</a></li>
                <li role="presentation"><a href="#favoritos" aria-controls="favoritos" role="tab" data-toggle="tab">Favoritos</a></li>
            </ul>
          </div>
          </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="perfil">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2 col-xs-12">
                  <div class="row">
                    <form name="frmPerfil" id="frmPerfil" action="javascript:void(0);">
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="login-password">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo $usuario['nombre']; ?>" placeholder="Nombre">
                    </div><!--/form-group-->
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="login-password">Apellidos</label>
                        <input id="apellidos" name="apellidos" type="text" class="form-control" value="<?php echo $usuario['apellido']; ?>" placeholder="Apellidos">
                    </div><!--/form-group-->
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="login-password">Teléfono</label>
                        <input id="telefono" name="telefono" type="text" class="form-control" value="<?php echo $usuario['telefono']; ?>" placeholder="Teléfono">
                    </div><!--/form-group-->
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="login-password">Correo</label>
                        <input id="correo" name="correo" type="text" class="form-control" value="<?php echo $usuario['correo']; ?>" placeholder="Correo">
                    </div><!--/form-group-->
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="login-password">Contraseña</label>
                        <input id="contrasena" name="contrasena" type="password" class="form-control" value="<?php echo $usuario['contrasena']; ?>" placeholder="Contraseña">
                    </div><!--/form-group-->
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="login-password">Confirmar contraseña:</label>
                        <input id="confirmar_contrasena" name="confirmar_contrasena" type="password" class="form-control" value="<?php echo $usuario['contrasena']; ?>" placeholder="Confirmar contraseña">
                        <input id="id" name="id" type="hidden" value="<?php echo $uid;?>">
                    </div><!--/form-group-->
                  </div>
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-lg btn-block btn-primary onSave">Guardar</button>
                  </div>
                  </div>
                </form>
                </div>
                </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="compras">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-xs-12">
                      <div class="table-responsive">
                          <table class="table table-bordered cart-table">
                              <thead>
                                  <tr>
                                      <th>Cantidad productos</th>
                                      <th>Total</th>
                                      <th>Fecha</th>
                                      <th>Estado</th>
                                      <th>Acción</th>
                                  </tr>
                              </thead>
                              <tbody class="product-list">
                                <?php echo $buffer_compras;?>
                              </tbody>
                          </table>
                      </div><!--end cart table-->
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="favoritos">
                  <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered cart-table">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody class="product-list">
                              <?php echo $buffer_fav;?>
                            </tbody>
                        </table>
                    </div><!--end cart table-->
                  </div>
                </div>
            </div>
            <div class="space-20"></div>
        </div>
    </div>
</div>
<style media="screen">
  footer{display: none;}
  .row{margin:0px !important;}
</style>

<script src="js/init.js" charset="utf-8"></script>
