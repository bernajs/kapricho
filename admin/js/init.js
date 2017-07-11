var User = {
	init: function () {
		var _self = this;
		this.order = null;
		_self.addEventListeners();
	},
	addEventListeners: function () {
		var _self = this;

		/* ORDER */
		$(document).on("click", "button.onRecover", function (e) { _self.recover(); });
		$(document).on("click", "button.onLogin", function (e) { _self.loginAdmin(); });
		$('.isNumber').keyup(function () { this.value = this.value.replace(/[^0-9\.]/g, ''); });
	},
	loginAdmin: function () {
		_self = this;
		var data = { correo: $("#email").val(), contrasena: $("#password").val() };
		var flag = 0;
		if (!data.correo || data.correo.length < 3) {$('#email').addClass('invalid');flag = 1;}
		if (!data.contrasena) {$('password').addClass('invalid');flag = 1;}
		if (flag == 0) {
			$.ajax({
				url: "_ctrl/ctrl.admin.php", dataType: 'json', data: { exec: "login", data: data }, type: "POST",
				success: function (r) {
					switch (r.status) {
						case 202: location.href = r.redirect; break;
						case 0: swal('','Correo y/o contraseña incorrectos','error'); break;
					}
				}, error: function (errorThrown) { console.log(errorThrown); }
			});
		} else {
			// alert('Porfavor ingrese datos válidos.');
			swal('','Por favor ingrese datos válidos','error');
		}
	},
	recover: function () {
		_self = this;
		var data = { e: $("#email").val() };
		if (data.e == "" || data.e == null) {	swal('','El correo es obligatorio','error');; return;}
		if (!isValidEmail(data.e)) {	swal('','Por favor ingrese un correo válido','error');;return;}
		$.ajax({
			url: "_ctrl/ctrl.admin.php", dataType: 'json', data: { exec: "recover", data: data.e }, type: "POST",
			success: function (r) {
				switch (r.status) {
					case 202:
							swal('','Hemos enviado tu contraseña al correo ingresado','success');
							setTimeout(function(){location.href = "index.php";},1000)
						break;
					case 404:
							swal('','El correo ingresado no esta asociado con ninguna cuenta','error');
						break;
				}
			}, error: function (errorThrown) { console.log(errorThrown); }
		});
	},
	recoverAdmin: function () {
		_self = this;
		var data = { e: $("#email").val() };
		if (data.e == "" || data.e == null) { alert('Error! e-mail address is required.'); return; }
		if (!isValidEmail(data.e)) {
			alert('Error! Please enter a valid e-mail address.');
			return;
		}
		$.ajax({
			url: "../_ctrl/ctrl.user.php", dataType: 'json', data: { exec: "recover", data: data }, type: "POST",
			success: function (r) {
				switch (r.status) {
					case 202:
						alert("Success! We have sent an e-mail to the registered account");
						location.href = "index.php";
						break;
					case 404:
						alert('Error! The e-mail provided is not registered or associated with any account.');
						break;
				}
			}, error: function (errorThrown) { console.log(errorThrown); }
		});
	}
}

$(window).load(function () { User.init(); });


function isValidEmail(email) {
	var re = /\S+@\S+\.\S+/;
	return re.test(email);
}
