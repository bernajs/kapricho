<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.css" rel="stylesheet" />

<style media="screen">
  ul{
    list-style: none;
  }
</style>
<span class="float-right mr-5 close_clima" style="cursor:pointer;">x</span>
<div id="the_weather" class="text-center"></div>
<!-- <button class="js-geolocation">Use Location</button> -->

<!-- <i class="wi wi-night-clear"></i> -->


<script type="text/javascript">
$(document).ready(function() {
if ("geolocation" in navigator) {
  $('.js-geolocation').show();
} else {
  $('.js-geolocation').hide();
}

// button handler
// $('.js-geolocation').on('click', function() {
  navigator.geolocation.getCurrentPosition(function(position) {
    loadWeather(position.coords.latitude + ',' + position.coords.longitude);
  });
// });


// loads weather
function loadWeather(location, woeid) {
  $.simpleWeather({
    location: location,
    woeid: woeid,
    unit: 'c',
    success: function(weather) {

      html = '<h2><i class="wi wi-yahoo-' + weather.code + '"></i> ' + weather.temp + '&deg;' + weather.units.temp + '</h2>';
      html += '<ul><li>' + weather.city + ', ' + weather.region + '</li>';
      // html += '<li class="currently">' + weather.currently + '</li>';
      html += '</ul>';
      // html += '<li>' + weather.alt.temp + '&deg;C</li></ul>';

      for(var i=0;(i+3)<weather.forecast.length;i++) {
        var dia = '';
        if(weather.forecast[i].day == 'Mon') dia = 'Lunes';
        if(weather.forecast[i].day == 'Tue') dia = 'Martes';
        if(weather.forecast[i].day == 'Wed') dia = 'Miércoles';
        if(weather.forecast[i].day == 'Thu') dia = 'Jueves';
        if(weather.forecast[i].day == 'Fri') dia = 'Viernes';
        if(weather.forecast[i].day == 'Sat') dia = 'Sábado';
        if(weather.forecast[i].day == 'Sun') dia = 'Domingo';
        html += '<p>'+dia+': '+weather.forecast[i].high+' °C</p>';
}

      $("#the_weather").html(html);
    },
    error: function(error) {
      $("#the_weather").html('<p>' + error + '</p>');
    }
  });
}


// init
// loadWeather('Miami', '');
});
</script>
