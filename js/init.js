var User = {
  init: function() {
    var _self = this;
    this.order = null;
    _self.addEventListeners();
  },
  addEventListeners: function() {
    var _self = this;

    /* ORDER */
    $(document).on("click", "button.onLogin", function(e) {
      _self.login_cliente(e);
    });
    $(document).on("click", "button.onSave", function(e) {
      _self.save();
    });
    $(document).on("click", "a.onClickLoginAdmin", function(e) {
      _self.loginAdmin();
    });
    $(document).on("click", "a.onClickPassRecover", function(e) {
      _self.recover();
    });


    $('#recuperar-contrasena').on('shown.bs.modal', function() {
      $('#recuperar-contrasena .alert').hide();
      $('#txt_recuperar').val("");
    });


    $('.isNumber').keyup(function() {
      this.value = this.value.replace(/[^0-9\.]/g, '');
    });

  },
  login_cliente: function() {
    _self = this;
    var flag = 0;
    var data = {
      u: $("#email").val(),
      p: $("#password").val()
    };
    if (!isValidEmail(data.u)) {
      $('#email').addClass('invalid');
      $('#email').next('label').addClass('active');
      $('#email').next('label').attr('data-error', 'El correo no es válido');
      flag = 1;
    }
    if (!data.u) {
      $('#email').addClass('invalid');
      $('#email').next('label').addClass('active');
      $('#email').next('label').attr('data-error', 'El correo es obligatorio');
      flag = 1;
    }
    if (!data.p) {
      $('#password').addClass('invalid');
      $('#password').next('label').addClass('active');
      $('#password').next('label').attr('data-error', 'La contraseña obligatoria');
      flag = 1;
    }
    if (flag == 1) {
      return;
    }
    DAO.execute("_ctrl/ctrl.usuario.php", {
      exec: "login",
      data: data
    }, function(r) {
			switch (r.status) {
				case 202:
					location.href = r.redirect;
					break;
				case 0: alert("El usuario y/o contraseña que ingresó no son correctos.");
					$('#email').addClass('invalid');
					$('#password').addClass('invalid');
					$('#email').next('label').attr('data-error', '');
					$('#password').next('label').attr('data-error', '');
					break;
			}
    });
  },
	save: function() {
		var data = DAO.toObject($("#frmPerfil").serializeArray());
		if(data.contrasena != data.confirmar_contrasena){ alert('Las contrasenas no coinciden'); return;}
		if(!isValidEmail(data.correo)) {alert('El correo no es válido'); return;}
		if(data.contrasena.length < 3) {alert('El mínimo de tu contraseña son tres caracteres'); return;}
		DAO.execute("_ctrl/ctrl.usuario.php", {
			exec: "update",
			data: data
		}, function(r) {
			if(r.status == 202) alert('Tu información se actualizó correctamente'); else alert('Ocurrió un error, por favor vuelve a intentarlo');
		});
	},
}

$(window).load(function() {
  User.init();
  DAO.init();
});
DAO = {
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
  }
};

function isValidEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}
