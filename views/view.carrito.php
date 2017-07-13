<div class="">
  <div class="page-breadcrumb">
    <div class="container">
        <h4>Tú carrito</h4>
    </div>
</div>
<div class="space-60"></div>
<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered cart-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody class="product-list">

            </tbody>
        </table>
    </div><!--end cart table-->
    <div class="space-10"></div>
    <div class="row">
        <div class="col-sm-6 margin-b-10">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="¿Tienes un cupón?" aria-describedby="basic-addon2">
                <a href="#" class="btn input-group-addon" id="basic-addon2">Aplicar cupón</a>
            </div>
        </div>
         <!-- <div class="col-sm-6 margin-b-10 text-right">
             <a href="#" class="btn btn-dark btn-lg">Update Cart</a>
        </div> -->
    </div>
    <hr>
    <ul class="list-unstyled text-right cart-subtotal-list">
        <!-- <li>
            Subtotal
            <span>$50.00</span>
        </li>
        <li>
            Shipping Charge
            <span>$5.00</span>
        </li> -->
        <li>
            Total
            <span class="total lead">$0.00</span>
        </li>
    </ul> <hr>
    <div class="text-right">
      <a class="btn btn-dark btn-lg onActualizar">Actualizar carrito</a>
      <div class="space-20"></div>
      <a class="btn btn-dark btn-lg onComprar">Comprar</a>
    </div>
    <div class="space-20"></div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      Cliente.get_carrito();
      $(document).on('click','.addCart', function(e){
        var id = $(this).data('id');
        var q = add_carrito(id);
        $('.itemq'+id).val(q);
      })
      $(document).on('click','.delCarrito', function(e){
        var id = $(this).data('id');
        var q = del_carrito(id);
        $('.itemq'+id).val(q);
      })

      $('.onComprar').click(function(){
        var uid = <?php if($uid) echo $uid; else echo 0;?>;
        Cliente.comprar(uid);
      })
    })
    // $('.addCarrito').on('click', function(e){
    //   var id = $(this).data('id');
    //   add_carrito(id);
    // });

</script>
