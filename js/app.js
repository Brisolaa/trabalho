$.ajax({
	url: "http://localhost/felipe/api.php",
	data: 'loadPage',
	success: function(result){
		$( "#contentHTML" ).append(result);
	}
});
var reloadOptions = function(){
	$.ajax({
		url: "http://localhost/felipe/api.php",
		data: 'setColors',
		success: function(result){
			$( ".options-content" ).empty();
			$(".options-content").append(result);
		}
	});
};
reloadOptions();
$(document).ready(function(){
	$('button').click(function(){
        //validar qual button foi clicado
       	var id = $(this).attr('id')
       	if(id == "adicionar"){
       		var adicionar = {};
       		adicionar.nome = $('.nome-add input').val();
       		adicionar.cor = $('.cor-add input').val();
       		console.log(adicionar);
       		$.ajax({
       			url: "http://localhost/felipe/api.php",
       			data: {
    			  	adicionar
   				},
   				success: function(result){
   					$( "#contentHTML" ).empty();
   					$( "#contentHTML" ).append(result);
   					reloadOptions();
	        	}
	    	});
       	}
       	else if(id == "pesquisar"){
       		var pesquisar = {};
       		pesquisar.cor = $('#select').val();
       		console.log(pesquisar);
       		$.ajax({
       			url: "http://localhost/felipe/api.php",
       			data: {
    			  	pesquisar
   				},
   				success: function(result){
   					$( "#contentHTML" ).empty();
   					$( "#contentHTML" ).append(result);
	        	}
	    	});
       	}
       	else if(id == "salvar"){
       		var nome = new Array();
       		var cor = new Array();
       		var id = new Array();
       		var salvar = {};
			$(".container-desc .nome").each(function (){
			   nome.push( $(this).html());
			});
			$(".container-desc .cor input").each(function (){
			   cor.push( $(this).val());
			});
			$("input[name='checks[]']").each(function (){
			   id.push( $(this).val());
			});
			salvar.nome = nome;
			salvar.cor = cor;
			salvar.id = id;
			$.ajax({
	       		url: "http://localhost/felipe/api.php",
	       		data: {salvar},
	       		success: function(result){
	       			$( "#contentHTML" ).empty();
   					$( "#contentHTML" ).append(result);
	        	}
	    	});
       	}
       	else if(id == "excluir"){
       		var excluir = new Array();
			$("input[name='checks[]']:checked").each(function (){
			   // valores inteiros usa-se parseInt
			   //checkeds.push(parseInt($(this).val()));
			   // string
			   excluir.push( $(this).val());
			   $.ajax({
	       			url: "http://localhost/felipe/api.php",
	       			data: {excluir},
	       			success: function(result){
	       				setTimeout(function(){
						 	$( "#contentHTML" ).empty();
	   						$( "#contentHTML" ).append(result);
						}, 200);
						reloadOptions();
		        	}
		    	});
			});
       	};
    });
});
