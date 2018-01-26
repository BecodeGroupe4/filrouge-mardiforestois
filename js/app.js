$(window).scroll(function(){
var wScroll = $(this).scrollTop();


if(wScroll > $('.container').offset().top - ($(window).height() / 1.2)) {

  $('.container .thumbnail').each(function(i){

    setTimeout(function(){
      $('.container .thumbnail').eq(i).addClass('is-showing');
    }, (700 * (Math.exp(i * 0.14))) - 700);
  });
}

});

$('.has-animation').each(function(index) {
  		if($(window).scrollTop() + $(window).height() > $(this).offset().top + $(this).outerHeight() ){
  			$(this).delay($(this).data('delay')).queue(function(){
      			$(this).addClass('animate-in');
    		});
  		}
	});


$(window).scroll(function() {
	$('.has-animation').each(function(index) {
  		if($(window).scrollTop() + $(window).height() > $(this).offset().top ){
  			$(this).delay($(this).data('delay')).queue(function(){
      			$(this).addClass('animate-in');
    		});
  		}
	});
});

var CountDownDate = new Date("Feb 2, 2018 00:00:00").getTime();

var x = setInterval(function() {
  var now= new Date().getTime();
  var distance = CountDownDate - now;

  var days= Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance %(1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60))/(1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60))/ 1000);

  document.getElementById('compte_a_rebours').innerHTML = days + "Jours <br/>" + hours + "Heures <br/>" + minutes + "Minutes <br/>" + seconds + "Secondes <br/>";

  if (distance < 0 ) {
    clearInterval(x);
    document.getElementById('compte_a_rebours').innerHTML = "Expired";
  }
})
