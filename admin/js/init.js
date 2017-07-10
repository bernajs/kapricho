var User = {
	init: function () {
		var _self = this;
		this.order = null;
		_self.addEventListeners();
	},
	addEventListeners: function () {
		var _self = this;

		/* ORDER */
		$(document).on("click", "a.onRecover", function (e) { _self.recover(); });
		$(document).on("click", "button.onLogin", function (e) { _self.loginAdmin(); });
		$('.isNumber').keyup(function () { this.value = this.value.replace(/[^0-9\.]/g, ''); });
	},
	loginAdmin: function () {
		_self = this;
    console.log(123);
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
						case 0: alert("Error al iniciar sesión."); break;
					}
				}, error: function (errorThrown) { console.log(errorThrown); }
			});
		} else {
			alert('Porfavor ingrese datos válidos.');
		}
	},
	recover: function () {
		_self = this;
		var data = { e: $("#email").val() };
		if (data.e == "" || data.e == null) {
			alert('Error! the e-mail address field is required.');
			$('#email').addClass('invalid');
			return;
		}
		if (!isValidEmail(data.e)) {
			alert('Error! Please enter a valid e-mail address.');
			return;
		}
		$.ajax({
			url: "_ctrl/ctrl.customer.php", dataType: 'json', data: { exec: "recover", data: data }, type: "POST",
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
