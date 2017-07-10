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
            var tallas = '';
            var colores = '';
            var descuento;
            var precio = Number(element.precio).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
            if(!imagenes[0] == null || !imagenes[0] == '') imagen = imagenes[0]; else imagen = imagenes[1];
            if(element.tallas) tallas = '<p>Tallas: <span>'+element.tallas+'</span></p>';
            if(element.colores) colores = '<p>Colores: <span>'+element.colores+'</span></p>';
            buffer += '<div class="example-1 card col-6 col-md-6 col-lg-4">\
              <div class="wrapper">\
              <img class="img-fluid" src="admin/uploads/imagenes_producto/'+imagen+'">\
                <div class="data">\
                  <div class="content">\
                    <h1 class="title"><a href="#">'+element.nombre+'</a><span class="float-right precio">$'+precio+'</span></h1>\
                    '+tallas+'\
                    '+colores+'\
                  </div>\
                </div>\
              </div>\
              <label for="show-menu" class="onCarrito menu-button" data-id="'+element.id+'"><i class="fa fa-shopping-cart" aria-hidden="true"></i></label>\
            </div>'
          });
          buffer += '</div>';
          $('.productos').html(buffer);
          $(".onProducto").animatedModal();

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



// $(document).ready(function() {
//   $('.modal').append('<button class="modal-close btn-flat" style="position:absolute;top:0;right:0; padding:0px 10px 0px 0px;"><i class="material-icons">clear</i></button>');
//   $('.button-collapse').sideNav({
//     menuWidth: 300, // Default is 240
//     edge: 'left', // Choose the horizontal origin
//     closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
//     draggable: true // Choose whether you can drag to open on touch screens
//   });
// });
