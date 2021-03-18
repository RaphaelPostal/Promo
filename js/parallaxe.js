

$(document).ready(function(){
	var assassin = document.getElementById("assassin");
	

	window.addEventListener('scroll', function (){
            var scroll = window.scrollY;

            $('#assassin').css('transform', 'translateY('+-0.6*scroll+'px)')
            $('body').css('background-position', ''+-0.4*scroll+'px')
            //assassin.style.top = -value * 1.4 + 'px';
           
        })
})
