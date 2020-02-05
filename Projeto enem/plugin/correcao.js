;(function($){
	$.fn.testaResposta = function(){ 
		$(".certa").click(function(){
			$(this).prevUntil(".alternativas").css("background-color","#E6E6E6");
			$(this).css("background-color","rgba(60,179,113,0.8)");
			$(this).nextUntil(".alternativas").css("background-color","#E6E6E6");
		});
		$(".errada").click(function(){
			$(this).prevUntil(".alternativas").css("background-color","#E6E6E6");
			$(this).css("background-color","rgba(220,20,60,0.8)");
			$(this).nextUntil(".alternativas").css("background-color","#E6E6E6");		
		});
	}
	$.fn.limpar = function(){ 
		$(".limpar").click(function(){
			$("p").css("background-color","#E6E6E6");
		});
	}
})(jQuery);
		