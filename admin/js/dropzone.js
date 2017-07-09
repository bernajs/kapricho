var name = Date.now();
var nombre;
var folder;
function set_data(n, f){
  nombre = n;folder=f;
}
$('#preSave').click(function(){
  myDropzone.processQueue();
})
Dropzone.autoDiscover = false;
var id_servicio;
var myDropzone = new Dropzone("div#dz_imagen", {
  url: "uploads/upload.php",
  addRemoveLinks: true,
  dictRemoveFile: 'Eliminar',
  autoProcessQueue: false,
  maxFilesize: 10,
  maxFiles: 1,
  dictDefaultMessage: "Seleccione la imagen de la " + nombre,
  dictMaxFilesExceeded: "Solo puedes subir una imagen por " + nombre
});

myDropzone.on('addedfile', function(file) {
  $('#preSave').removeClass('onSave');
  name = name + '.' +file.name.split('.')[1]
  if (this.files.length > 1) {
    this.removeFile(this.files[0]);
  }
  $('#imagen').val(name);
});
myDropzone.on('sending', function(file, xhr, formData) {
  formData.append('folder', folder);
  console.log(folder);
  formData.append('name', name);
});

myDropzone.on("complete", function(file) {
  $('.onSave').click();
});
