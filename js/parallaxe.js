

$(document).ready(function(){
	var assassin = document.getElementById("assassin");
	

	window.addEventListener('scroll', function (){
            var value = window.scrollY;

            $('#assassin').css('transform', 'translateY('+-0.6*value+'px)')
            //assassin.style.top = -value * 1.4 + 'px';
           
        })
})
