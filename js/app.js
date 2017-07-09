/* USER */
var Customer;
Customer = {
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
          var buffer = '<div class="row animated fadeIn">';
          data.forEach(function(element){
            var imagenes = JSON.parse(element.imagenes);
            var imagen;
            var precio = Number(element.precio).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
            if(imagenes.length > 1) imagen = imagenes[1];
            buffer += producto();
          // buffer += '<div class="col-6 col-md-3 hvr-grow">\
          //               <div class="card text-center">\
          //                 <img class="card-img-top img-fluid" src="admin/uploads/imagenes_producto/'+imagen+'">\
          //                 <div class="card-block">\
          //                   <h5 class="card-title">'+element.nombre+'</h5><b>$ '+precio+'</b>\
          //                   <a href="#animatedModal" class="btn btn-secondary btn-sm btn-ver onProducto" data-id="'+element.id+'">Ver</a>\
          //                 </div>\
          //               </div>\
          //             </div>';
          });
          buffer += '</div>';
          $('.productos').html(buffer);
          $(".onProducto").animatedModal();
          productojs();

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
          $('.producto_precio').html(data.precio);
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
};

$(window).on('load', function() {
  Customer.init();
  DAO.init();
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
  return `<div class="col-6 col-md-6 col-lg-4 make-3D-space">
   <div class="product-card">
       <div class="product-front">
         <div class="shadow"></div>
           <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
           <div class="image_overlay"></div>
           <div class="view_details">View details</div>
           <div class="stats">
               <div class="stats-container">
                   <span class="product_price">$39</span>
                   <span class="product_name">Adclassas Originals</span>
                   <p>Mens running shirt</p>

                   <div class="product-options">
                   <strong>SIZES</strong>
                   <span>XS, S, M, L, XL, XXL</span>
                   <strong>COLORS</strong>
                   <div class="colors">
                       <div class="c-blue"><span></span></div>
                       <div class="c-red"><span></span></div>
                       <div class="c-white"><span></span></div>
                       <div class="c-green"><span></span></div>
                   </div>
               </div>
               </div>
           </div>
       </div>
       <div class="product-back">
         <div class="shadow"></div>
           <div class="carousel">
               <ul>
                   <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large.png" alt="" /></li>
                   <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large2.png" alt="" /></li>
                   <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large3.png" alt="" /></li>
               </ul>
               <div class="arrows-perspective">
                   <div class="carouselPrev">
                       <div class="y"></div>
                     <div class="x"></div>
                   </div>
                   <div class="carouselNext">
                       <div class="y"></div>
                     <div class="x"></div>
                   </div>
               </div>
           </div>
           <div class="flip-back">
             <div id="cy"></div>
               <div id="cx"></div>
           </div>
       </div>
   </div>
</div>`
}

function productojs(){
	// Lift card and show stats on Mouseover
	$('.product-card').hover(function(){
			$(this).addClass('animate');
			$('div.carouselNext, div.carouselPrev').addClass('visible');
		 }, function(){
			$(this).removeClass('animate');
			$('div.carouselNext, div.carouselPrev').removeClass('visible');
	});

	// Flip card to the back side
	$('.view_details').click(function(){
		$('div.carouselNext, div.carouselPrev').removeClass('visible');
		$('.product-card').addClass('flip-10');
		setTimeout(function(){
			$('.product-card').removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo( 80 , 1, function(){
				$('.product-front, .product-front div.shadow').hide();
			});
		}, 50);

		setTimeout(function(){
			$('.product-card').removeClass('flip90').addClass('flip190');
			$('.product-back').show().find('div.shadow').show().fadeTo( 90 , 0);
			setTimeout(function(){
				$('.product-card').removeClass('flip190').addClass('flip180').find('div.shadow').hide();
				setTimeout(function(){
					$('.product-card').css('transition', '100ms ease-out');
					$('.cx, .cy').addClass('s1');
					setTimeout(function(){$('.cx, .cy').addClass('s2');}, 100);
					setTimeout(function(){$('.cx, .cy').addClass('s3');}, 200);
					$('div.carouselNext, div.carouselPrev').addClass('visible');
				}, 100);
			}, 100);
		}, 150);
	});

	// Flip card back to the front side
	$('.flip-back').click(function(){

		$('.product-card').removeClass('flip180').addClass('flip190');
		setTimeout(function(){
			$('.product-card').removeClass('flip190').addClass('flip90');

			$('.product-back div.shadow').css('opacity', 0).fadeTo( 100 , 1, function(){
				$('.product-back, .product-back div.shadow').hide();
				$('.product-front, .product-front div.shadow').show();
			});
		}, 50);

		setTimeout(function(){
			$('.product-card').removeClass('flip90').addClass('flip-10');
			$('.product-front div.shadow').show().fadeTo( 100 , 0);
			setTimeout(function(){
				$('.product-front div.shadow').hide();
				$('.product-card').removeClass('flip-10').css('transition', '100ms ease-out');
				$('.cx, .cy').removeClass('s1 s2 s3');
			}, 100);
		}, 150);

	});


	/* ----  Image Gallery Carousel   ---- */

	var carousel = $('#carousel ul');
	var carouselSlideWidth = 335;
	var carouselWidth = 0;
	var isAnimating = false;

	// building the width of the casousel
	$('#carousel li').each(function(){
		carouselWidth += carouselSlideWidth;
	});
	$(carousel).css('width', carouselWidth);

	// Load Next Image
	$('div.carouselNext').on('click', function(){
		var currentLeft = Math.abs(parseInt($(carousel).css("left")));
		var newLeft = currentLeft + carouselSlideWidth;
		if(newLeft == carouselWidth || isAnimating === true){return;}
		$('#carousel ul').css({'left': "-" + newLeft + "px",
							   "transition": "300ms ease-out"
							 });
		isAnimating = true;
		setTimeout(function(){isAnimating = false;}, 300);
	});

	// Load Previous Image
	$('div.carouselPrev').on('click', function(){
		var currentLeft = Math.abs(parseInt($(carousel).css("left")));
		var newLeft = currentLeft - carouselSlideWidth;
		if(newLeft < 0  || isAnimating === true){return;}
		$('#carousel ul').css({'left': "-" + newLeft + "px",
							   "transition": "300ms ease-out"
							 });
	    isAnimating = true;
		setTimeout(function(){isAnimating = false;}, 300);
	});
}


// $(document).ready(function() {
//   $('.modal').append('<button class="modal-close btn-flat" style="position:absolute;top:0;right:0; padding:0px 10px 0px 0px;"><i class="material-icons">clear</i></button>');
//   $('.button-collapse').sideNav({
//     menuWidth: 300, // Default is 240
//     edge: 'left', // Choose the horizontal origin
//     closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
//     draggable: true // Choose whether you can drag to open on touch screens
//   });
// });
