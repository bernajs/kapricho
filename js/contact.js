$('.boland-contact').submit(function() {
		var $form		= $(this);
		var submitData	= $form.serialize();
		var $email		= $form.find('input[name="email"]');
		var $name		= $form.find('input[name="name"]');
		var $message	= $form.find('textarea[name="message"]');
		var $submit		= $form.find('input[name="submit"]');
		var $dataStatus	= $form.find('.data-status');

		$email.attr('disabled', 'disabled');
		$name.attr('disabled', 'disabled');
		$message.attr('disabled', 'disabled');
		$submit.attr('disabled', 'disabled');

		$dataStatus.show().html('<div class="alert alert-info"><strong>Loading...</strong></div>');

		$.ajax({ // Send an offer process with AJAX
			type: 'POST',
			url: 'plugins/contact_form/process-contact.php',
			data: submitData + '&action=add',
			dataType: 'html',
			success: function(msg){
				if (parseInt(msg, 0) !== 0) {
					var msg_split = msg.split('|');
					if (msg_split[0] === 'success') {
						$email.val('').removeAttr('disabled');
						$name.val('').removeAttr('disabled');
						$message.val('').removeAttr('disabled');
						$submit.removeAttr('disabled');
						$dataStatus.html(msg_split[1]).fadeIn();
					} else {
						$email.removeAttr('disabled');
						$name.removeAttr('disabled');
						$message.removeAttr('disabled');
						$submit.removeAttr('disabled');
						$dataStatus.html(msg_split[1]).fadeIn();
					}
				}
			}
		});

		return false;
	});



	/* USER */
	var Cliente;
	var total;
	Cliente = {
	  init: function() {
	    var _self = this;
	    this.order = null;
	    this.me = null;
	    _self.addEventListeners();
	  },
	  /* EVENT LISTENERS */
	  addEventListeners: function() {
	    var _self = this;
	    $(document).on("click", "li.onCategoria", function(e) {_self.get_productos(e);});
	    $(document).on("click", "a.onProducto", function(e) {_self.get_producto(e);});
	    $(document).on("submit", "form.frmBuscar", function(e) {e.preventDefault(); _self.buscar(e);});
	    $(document).on("click", "a.getCarrito", function(e) {e.preventDefault(); _self.carrito(e);});
	  },
	  get_productos: function(e) {
	    var categoria = (e.currentTarget.dataset.id);
	    DAO.execute("_ctrl/ctrl.service.php", {
	        exec: "get_productos_by_categoria",
	        data: categoria
	      },
	      function(r) {
	        if (r.status == 202) {
	          var data = r.data;
	          var buffer = '';
	          data.forEach(function(element){
	            var imagenes = JSON.parse(element.imagenes);
	            var imagen;
	            var descuento = '';
	            if (element.descuento > 0) descuento = '<div class="date"><span class="day">'+element.descuento+'</span><span class="month">% desc</span></div>';
	            var precio = format_precio(element.precio);
	            if(!imagenes[0] == null || !imagenes[0] == '') imagen = imagenes[0]; else imagen = imagenes[1];
	            buffer += '<div class="col-sm-6 col-md-3 animated fadeIn">\
	                                <div class="product-box">\
	                                    <div class="product-thumb">\
	                                        <img src="admin/uploads/imagenes_producto/'+imagen+'" alt="" class="img-responsive">\
	                                        <div class="product-overlay">\
	                                            <span>\
	                                                <a class="btn btn-default" href="index.php?call=producto&id='+element.id+'">Ver más</a>\
	                                                <a class="btn btn-primary addCarrito" data-id="'+element.id+'">Agregar al carrito</a>\
	                                            </span>\
	                                        </div>\
	                                    </div>\
	                                    <div class="product-desc">\
	                                        <span class="product-price pull-right">$'+precio+'</span>\
	                                        <h5 class="product-name"><a href="index.php?call=producto&id='+element.id+'">'+element.nombre+'p</a></h5>\
	                                    </div>\
	                                </div>\
	                            </div>';
	          });
	          $('.productos').html(buffer);
	          // $(".onProducto").animatedModal();

	        } else if (r.status == 404) {
	          // swal({
	          //   title: "",
	          //   text: "Algo salió mal, por favor vuelve a intentarlo.",
	          //   type: "error",
	          //   confirmButtonText: "Aceptar",
	          //   confirmButtonColor: "#2C8BEB"
	          // });
	        }
	      });
	  },
	  get_producto: function(e) {
	    var producto = (e.currentTarget.dataset.id);
	    DAO.execute("_ctrl/ctrl.service.php", {
	        exec: "get_producto",
	        data: producto
	      },
	      function(r) {
	        if (r.status == 202) {
	          var data = r.data;
	          var imagenes = JSON.parse(data.imagenes);
	          var buffer_img = '';
	          if(imagenes.length > 0){
	            imagenes.forEach(function(element){buffer_img += '<img class="img-fluid" src="admin/uploads/imagenes_producto/'+element+'">';})
	            $('.producto_img, .producto_nav').html(buffer_img);
	          }
	          $('.producto_nombre').html(data.nombre);
	          $('.producto_precio').html(format_precio(data.precio));
	          $('.producto_descripcion').html(data.descripcion);
	          // $('.producto_img').slick({autoplay:true, speed:1000, autoplaySpeed:5000, pauseOnFocus:true,adaptiveHeight: true});
	          $('.producto_img').slick({
	             slidesToShow: 1,
	             slidesToScroll: 1,
	             arrows: false,
	             fade: true,
	             asNavFor: '.producto_nav'
	        });
	        $('.producto_nav').slick({
	         slidesToShow: 2,
	         slidesToScroll: 1,
	         asNavFor: '.producto_img',
	         dots: true,
	         centerMode: true,
	         focusOnSelect: true
	        });
	        } else if (r.status == 404) {
	          // swal({
	          //   title: "",
	          //   text: "Algo salió mal, por favor vuelve a intentarlo.",
	          //   type: "error",
	          //   confirmButtonText: "Aceptar",
	          //   confirmButtonColor: "#2C8BEB"
	          // });
	        }
	      });
	  },
	  buscar: function(e) {
	    console.log('hola');
	    var buscar = $('#buscar').val();
	    console.log(buscar);
	    if(!buscar || buscar == '') alert('Debes de escribir algo'); return;
	    // DAO.execute("_ctrl/ctrl.service.php", {
	    //     exec: "get_producto",
	    //     data: producto
	    //   },
	      // function(r) {
	      //   if (r.status == 202) {
	      //     var data = r.data;
	      //     var imagenes = JSON.parse(data.imagenes);
	      //     var buffer_img = '';
	      //     if(imagenes.length > 0){
	      //       imagenes.forEach(function(element){buffer_img += '<img class="img-fluid" src="admin/uploads/imagenes_producto/'+element+'">';})
	      //       $('.producto_img, .producto_nav').html(buffer_img);
	      //     }
	      //     $('.producto_nombre').html(data.nombre);
	      //     $('.producto_precio').html(data.precio);
	      //     $('.producto_descripcion').html(data.descripcion);
	      //     // $('.producto_img').slick({autoplay:true, speed:1000, autoplaySpeed:5000, pauseOnFocus:true,adaptiveHeight: true});
	      //     $('.producto_img').slick({
	      //        slidesToShow: 1,
	      //        slidesToScroll: 1,
	      //        arrows: false,
	      //        fade: true,
	      //        asNavFor: '.producto_nav'
	      //   });
	      //   $('.producto_nav').slick({
	      //    slidesToShow: 2,
	      //    slidesToScroll: 1,
	      //    asNavFor: '.producto_img',
	      //    dots: true,
	      //    centerMode: true,
	      //    focusOnSelect: true
	      //   });
	      //   } else if (r.status == 404) {
	      //     // swal({
	      //     //   title: "",
	      //     //   text: "Algo salió mal, por favor vuelve a intentarlo.",
	      //     //   type: "error",
	      //     //   confirmButtonText: "Aceptar",
	      //     //   confirmButtonColor: "#2C8BEB"
	      //     // });
	      //   }
	      // });
	  },
	  carrito: function(e) {
	    total = 0;
	    var carrito = JSON.parse(localStorage.getItem('carrito'));
	    if(!carrito) {alert('Tu carrito esta vacío'); return;}
	    DAO.execute("_ctrl/ctrl.service.php", {
	        exec: "get_productos",
	        data: carrito
	      },
	      function(r) {
	        if (r.status == 202) {
	          var data = r.data;
	          var buffer = '';
	          var carrito = JSON.parse(localStorage.getItem('carrito'));
	          var index = 0;
	          data.forEach(function(element){
	            buffer += '<li class="clearfix item'+element.id+'">\
	                <div class="cart-thumb">\
	                    <a href="#">\
	                        <img src="images/products/thumb3.jpg" alt="" class="img-responsive" width="60">\
	                    </a>\
	                </div>\
	                <div class="cart-content">\
	                    <span class="removeItem close" data-id="'+element.id+'"><i class="fa fa-times"></i></span>\
	                    <h5><a href="#">'+element.nombre+'</a></h5>\
	                    <p><span class="price">$'+element.precio+'</span>  x '+carrito[index].c+'</p>\
	                </div>\
	            </li>';
	            total += element.precio * carrito[index].c;
	            index++;
	          })
	          buffer+='<li><div class="text-center"><a href="index.php?call=carrito" class="btn btn-primary">Ver carrito</a></div></li>';
	          $('.cart-list').html(buffer);
	        } else if (r.status == 404) {
	          // swal({
	          //   title: "",
	          //   text: "Algo salió mal, por favor vuelve a intentarlo.",
	          //   type: "error",
	          //   confirmButtonText: "Aceptar",
	          //   confirmButtonColor: "#2C8BEB"
	          // });
	        }
	      });
	  },
	  get_carrito: function(e) {
	    total = 0;
	    var carrito = JSON.parse(localStorage.getItem('carrito'));
	    if(!carrito) {alert('Tu carrito esta vacío'); return;}
	    DAO.execute("_ctrl/ctrl.service.php", {
	        exec: "get_productos",
	        data: carrito
	      },
	      function(r) {
	        if (r.status == 202) {
	          var data = r.data;
	          var buffer = '';
	          var carrito = JSON.parse(localStorage.getItem('carrito'));
	          var index = 0;
	          data.forEach(function(element){
	            buffer += '<tr class="item'+element.id+'">\
	                                <td class="item-thumb">\
	                                    <img src="images/products/p6.jpg" alt="" width="90">\
	                                </td>\
	                                <td class="item-name">\
	                                    <h4><a href="#">'+element.nombre+'</a></h4>\
	                                </td>\
	                                <td class="item-price">\
	                                    <h4>$'+element.precio+'</h4>\
	                                </td>\
	                                <td class="item-count" style="width: 120px">\
	                                    <div class="count-input">\
	                                        <a class="incr-btn delCarrito" data-p="'+element.precio+'" data-id="'+element.id+'">–</a>\
	                                        <input class="itemq'+element.id+'  quantity" type="text" value="'+carrito[index].c+'">\
	                                        <a class="incr-btn addCart" data-p="'+element.precio+'" data-id="'+element.id+'">+</a>\
	                                    </div>\
	                                </td>\
	                                <td class="item-remove">\
	                                    <a class="removeItem" data-id="'+element.id+'" href="#"><i class="fa fa-trash"></i></a>\
	                                </td>\
	                            </tr>';
	                            total += element.precio * carrito[index].c;
	            index++;
	          })
	          buffer+='<li><div class="text-center"><a href="index.php?call=carrito" class="btn btn-primary">Ver carrito</a></div></li>';
	          $('.product-list').html(buffer);
	        } else if (r.status == 404) {
	          // swal({
	          //   title: "",
	          //   text: "Algo salió mal, por favor vuelve a intentarlo.",
	          //   type: "error",
	          //   confirmButtonText: "Aceptar",
	          //   confirmButtonColor: "#2C8BEB"
	          // });
	        }
	      });
	      $('.lead').html('$' + total);
	  },
	};

	$(window).on('load', function() {
	  Cliente.init();
	  DAO.init();
	  count_carrito();
	});

	DAO = {
	  init: function() {
	    var _self = this;
	  },
	  toObject: function(form) {
	    var data = {};
	    $.each(form, function(key, element) {
	      if (element.name.indexOf("[]") >= 0) {
	        var aux = data[element.name];
	        if (aux == null) {
	          aux = "";
	        }
	        data[element.name] = aux + element.value + "|";
	      } else {
	        data[element.name] = element.value;
	      }
	    });
	    return data;
	  },
	  execute: function(ctrl, data, callback) {
	    $.ajax({
	      type: "POST",
	      url: ctrl,
	      data: data,
	      dataType: "json",
	      success: function(r) {
	        callback(r);
	      },
	      error: function(r) {
	        console.log(r);
	      }
	    });
	  }
	}


	Service = {
	  init: function() {
	    var _self = this;
	  },
	  toObject: function(form) {
	    var data = {};
	    $.each(form, function(key, element) {
	      data[element.name] = element.value;
	    });
	    return data;
	  },
	  execute: function(ctrl, data, callback) {
	    $.ajax({
	      type: "POST",
	      url: ctrl,
	      data: data,
	      dataType: "json",
	      success: function(r) {
	        callback(r);
	      },
	      error: function(r) {
	        console.log(r);
	      }
	    });
	  },
	}



	function producto(){
	  return `<div class="example-1 card col-6 col-md-4">
	    <div class="wrapper">
	      <div class="data">
	        <div class="content">
	          <span class="author">Jane Doe</span>
	          <h1 class="title"><a href="#">Everything You Need to Know About Gold Medals</a></h1>
	          <p class="text">Olympic gold medals contain only about 1.34 percent gold, with the rest composed of sterling silver.</p>
	          <label for="show-menu" class="menu-button"><span></span></label>
	        </div>
	        <input type="checkbox" id="show-menu" />
	        <ul class="menu-content">
	          <li>
	            <a href="#" class="fa fa-bookmark-o"></a>
	          </li>
	          <li><a href="#" class="fa fa-heart-o"><span>47</span></a></li>
	          <li><a href="#" class="fa fa-comment-o"><span>8</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </div>`
	}

	// $(document).on('click','.removeItem', function(){var id = $(this).data('id'); $('.item'+id).remove();})
	$(document).on('click','.addCarrito', function(e){
	  var id = $(this).data('id');
	  add_carrito(id);
	});
	function add_carrito(id){
	  var item = {'id': id, 'c': 1};
	  var carrito = JSON.parse(localStorage.getItem('carrito'));
	  var flag = false;
	  var q=0;
	  if(!carrito) carrito = [];
	    else
	      carrito.forEach(function(element){if(element.id == id){element.c +=1; q=element.c; flag = true;}});
	  if(!flag) carrito.push(item);
	  localStorage.setItem('carrito', JSON.stringify(carrito));
	  count_carrito();
	  return q;
	}

	function del_carrito(id){
	  var item = {'id': id, 'c': 0};
	  var carrito = JSON.parse(localStorage.getItem('carrito'));
	  var flag = false;
	  var q = 0;
	  if(!carrito) carrito = [];
	    else
	      carrito.forEach(function(element,i){console.log(element);if(element.id == id) if(element.c > 1) {element.c -=1; q=element.c;}else{q=0;/*carrito.splice(i,1);*/} flag = true;});
	  // if(!flag) carrito.push(item);

	  localStorage.setItem('carrito', JSON.stringify(carrito));
	  count_carrito();
	  return q;
	}

	function get_total(precio, cantidad, action){
	  if(action == 'a') total += precio; else total -= precio * cantidad;
	  $('.lead').html('$'+total);
	}

	$(document).on('click','.removeItem', function(e){
	  var id = $(this).data('id');
	  remove_item(id);
	})

	function remove_item(id){
	  var carrito = JSON.parse(localStorage.getItem('carrito'));
	  var bandera = false;
	  carrito.forEach(function(element,i){if(element.id == id){carrito.splice(i, 1);bandera=true;}});
	  if(bandera) $('.item'+id).hide();
	  localStorage.setItem('carrito', JSON.stringify(carrito));
	  count_carrito();
	}
	// $(document).on('click','.delCarrito', function(e){
	//   var id = $(this).data('id');
	//   del_carrito(id);
	// });


	function format_precio(p){return Number(p).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');}
	function count_carrito(){
	  var carrito = JSON.parse(localStorage.getItem('carrito'));
	  if(carrito) carrito = carrito.length; else carrito = 0;
	  $('.count_carrito').html(carrito);
	}
	// <li class="clearfix">
	//     <div class="cart-thumb">
	//         <a href="#">
	//             <img src="images/products/thumb3.jpg" alt="" class="img-responsive" width="60">
	//         </a>
	//     </div>
	//     <div class="cart-content">
	//         <span class="close"><i class="fa fa-times"></i></span>
	//         <h5><a href="#">Dip-Dye Tote Bag</a></h5>
	//         <p><span class="price">$48.00</span>  x 2</p>
	//     </div>
	// </li>


	// $(document).ready(function() {
	//   $('.modal').append('<button class="modal-close btn-flat" style="position:absolute;top:0;right:0; padding:0px 10px 0px 0px;"><i class="material-icons">clear</i></button>');
	//   $('.button-collapse').sideNav({
	//     menuWidth: 300, // Default is 240
	//     edge: 'left', // Choose the horizontal origin
	//     closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
	//     draggable: true // Choose whether you can drag to open on touch screens
	//   });
	// });


	<script type="text/javascript">
	    $(document).ready(function(){
	      Cliente.get_carrito();
	      $(document).on('click','.addCart', function(e){
	        var id = $(this).data('id');
	        var precio = $(this).data('p');
	        var q = add_carrito(id);
	        get_total(precio, 1, 'a');
	        $('.itemq'+id).val(q);
	      })
	      $(document).on('click','.delCarrito', function(e){
	        var id = $(this).data('id');
	        var q = del_carrito(id);
	        var precio = $(this).data('p');
	        if(q > 0) {get_total(precio, 1, 'r'); $('.itemq'+id).val(q);}
	      })
	    })
	    // $('.addCarrito').on('click', function(e){
	    //   var id = $(this).data('id');
	    //   add_carrito(id);
	    // });

	</script>
