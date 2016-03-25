/*
* Validazione form creazione ricette.
*/
$(document).ready(function(){
	
	
	
	$("#submit").prop( "disabled", true );
	
	$("#recipe_form").on("change paste keyup input propertychange", function(){
		if(validateRecipeForm()){
			$("#submit").prop( "disabled", false );
		}else{
			$("#submit").prop( "disabled", true );
		}
	});
	
	
	$("#description").keyup(function(){
		
		var length = $("#description").val().length;
		var res= 6000 - length;
		if(length > 6000){
			$('h6').html('Il testo ha superato i 6000 caratteri');
		}else{
			$('h6').html('Numero caratteri: '+res);
		}
	
	});
	function validateTitle(){
		
			if($('#title').val()==="" || $.isNumeric($('#title').val()) || $('#title').val().length<=3 ){
				 return false;
			}else{
				return true;
			}
		
	}
	function validateDescription(){
	
		
		var length = $("#description").val().length;
		var res= 6000 - length;
		if(length > 6000){
			$('h6').html('Il testo ha superato i 6000 caratteri');
		}else{
			$('h6').html('Numero caratteri: '+res);
		}
		if(length < 10  || length > 6000){
			
    		return false;
			
		}else{

			return true;
		}
	}
	function validateIngredient(){
		
			if($('#ingredient').val()==="" || $.isNumeric($('#ingredient').val()) || $('#ingredient').val().length<=3 ){
				 return false;
			}else{
				return true;
			}
		
	}
	function validateImage(){
		
	
	if($('#imageToUpload').get(0).files.length > 0){ 
		
	    var fileSize = $('#imageToUpload').get(0).files[0].size;
	    
		    if(fileSize > 400000){
		    	return false;
		    }else{
		    	return true;  
		    }
		    
		  
	    
		}
	return true;
	
	}
	
	function validateRecipeForm(){
		if(!validateTitle()){
			$('.validate').html('*Titolo neccessario!');
			return false;
		}
		if(!validateDescription()){
			$('.validate').html('*Descrizione neccessaria di 10 caratteri!');
			return false;
		}
		if(!validateIngredient()){
			$('.validate').html('*Almeno un ingrediente neccessario!');
			return false;
		}
		if(!validateImage()){
			$('.validate').html('*Immagine troppo grande!');
			return false;
		}
		$('.validate').html('');
		return true;
	}

	
	
	
	
	// Prevent submit on enter button
	$("#recipe_form").on("keypress", "input", function (e) {
			
	    var code = e.keyCode || e.which;
	    if (code == 13) {
	        e.preventDefault();
	        return false;
	    }
	});

	 



});

/*
* Funzioni gestione inserimento ingredienti e box sottostante 
*/
$(document).ready(function() {
		
	if($("#ingredient").val()===""){
			
		$("#ingredients").html('');
	}
		

	$("#button-ingredient").click(function() {
	    	
	        $("#ingredient").val($("#ingredient").val()+$("#ingredient-list").val()+', ');
	        $("#ingredient").change();
	    
	});
	

	$("#ingredient").keypress(function(e) {
	
	    if(e.which == 13) {
	        $("#ingredient").val($("#ingredient").val()+', ');
	    }
	});
		
		
	var str = $("#ingredient").val();
	if(str!=null){
			var ingredients = str.split(", ");
			  
			$("#ingredients").html('');
			
			  $.each( ingredients, function( key, value ) {
			  	if(value!=""){
			  		$("#ingredients").append('<div class="box-ingredient">'+value+'</div>');
			  		
				 	
		  		}
			  		
			  		
			  		
			  	
		
				 
		});
	}
		
		
	$("#ingredient").on("change paste keyup input propertychange", function() {
			
				
	
			var str = $("#ingredient").val();
			var ingredients = str.split(", ");
			  
			  	
			$("#ingredients").html('');
			
		  	$.each( ingredients, function( key, value ) {
		  		if(value!=""){
		  			$("#ingredients").append('<div class="box-ingredient">'+value+'</div>');
		  		
				 	
		  		}
			  
				 
		});
			  	
				
				
			 
	});
});

/* Funzione per abilitare i tooltip */

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

/*
*Funzioni check per eliminazione risorse 
*
*/
$(document).ready(function() {
	
	 $(".delete-form").click(function(event) {
        if( !confirm('Sei sicuro di voler eliminare la ricetta?') ) 
            event.preventDefault();
    });
    
    
    
});

$(document).ready(function() {
	
	 $("#delete-form").click(function(event) {
        if( !confirm('Sei sicuro di voler eliminare la ricetta?') ) 
            event.preventDefault();
    });
});

$(document).ready(function() {
	
	 $(".delete-ingredient").click(function(event) {
        if( !confirm('Sei sicuro di voler eliminare l\'ingrediente?') ) 
            event.preventDefault();
    });
});

/* Validazione form modifica utente!
*
*/
$(document).ready(function() {
    /*$("#pass1").keyup(function() {
        matchPass();
    });
    
    $("#pass2").keyup(function() {
        matchPass();
    });*/
    
    $("#user_edit_form").on("change paste keyup input propertychange", function(){
    	if(!validateName()){
    		$('.validate').html('*Nome non valido!');
    		$("#modify_user").prop( "disabled", true );
    		return false;
    	}
    	if(!validateEmail()){
    		$('.validate').html('*Email non valida!');
    		$("#modify_user").prop( "disabled", true );
    		return false;
    	}
    	if(!matchPass()){
    		$('.validate').html('*Le password non corrispondono!');
    		$("#modify_user").prop( "disabled", true );
    		return false;
    	}
    	$('.validate').html('');
    	$("#modify_user").prop( "disabled", false );
    	
    });
    
    
    
});


/* Funzine controllo password */
function matchPass() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        document.getElementById("pass1").style.borderColor = "#4acf4a";
        document.getElementById("pass2").style.borderColor = "#4acf4a";
    }
    return ok;
}

/* Funzione validazione email */
function validateEmail()
{
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(regex.test($("#email_form").val())){
			
			return true;
		}else{
			
			return false;
		}
}
function validateName()
{
	if($.isNumeric($("#name_form").val()) || $("#name_form").val() === "" || $("#name_form").val().length<3  ){
		return false;
	}
	
	return true;
}