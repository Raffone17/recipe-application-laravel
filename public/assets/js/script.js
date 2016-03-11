$(document).ready(function(){
	
	$("#submit").prop( "disabled", true );
	
	$("#description").keyup(function(){
		
		var length = $("#description").val().length;
		var res= 6000 - length;
		if(length > 6000){
			$('h6').html('Il testo ha superato i 3000 caratteri');
		}else{
			$('h6').html('Numero caratteri: '+res);
		}
		if(length == 0  || length > 6000){
			
    		 /*document.getElementById("button").disabled = true;*/
    		 $("#submit").prop( "disabled", true );
			
		}else{
			/*document.getElementById("button").disabled = false;*/
			 $("#submit").prop( "disabled", false );
		}

	});
	function validateTitle(){
		$("#title").keyup(function(){
			if($('#title').val()===""){
				 $("#submit").prop( "disabled", true );
			}
		});
	}
	
	
		if($("#ingredient").val()===""){
			$("#ingredients").html('');
		}
		
	/*$('#minusingredient').click(function(){
		
		console.log($('.minus-ingredient').attr( "value" ));
		
	});*/
	$("#button-ingredient").click(function() {
	    
	        $("#ingredient").val($("#ingredient").val()+$("#ingredient-list").val()+', ');
	        $("#ingredient").change();
	    
	});
	

	$("#ingredient").keypress(function(e) {
	    if(e.which == 13) {
	        $("#ingredient").val($("#ingredient").val()+', ');
	    }
	});
	
	// Prevent submit on enter button
	$("#recipe_form").on("keypress", "input", function (e) {
	    var code = e.keyCode || e.which;
	    if (code == 13) {
	        e.preventDefault();
	        return false;
	    }
	});
	
	$(document).ready(function() {
		
		var str = $("#ingredient").val();
		if(str!=null){
				var ingredients = str.split(", ");
			  
				$("#ingredients").html('');
				$("#ingredients").html('<select hidden name="ingredient" multiple>');
			  	$.each( ingredients, function( key, value ) {
			  		if(value!=""){
			  			$("#ingredients").append('<div class="box-ingredient">'+value+'</div>');
			  			$("#ingredients").append('<option hidden value="'+value+'" selected>'+value+'</option>');
				 	
			  		}
			  		
			  		
			  		
			  	
		
				 
			});
		}
		
		
		$("#ingredient").on("change paste keyup input propertychange", function() {
			
				
	
				var str = $("#ingredient").val();
				var ingredients = str.split(", ");
			  
				$("#ingredients").html('');
				$("#ingredients").html('<select hidden name="ingredient" multiple>');
			  	$.each( ingredients, function( key, value ) {
			  		if(value!=""){
			  			$("#ingredients").append('<div class="box-ingredient">'+value+'</div>');
			  			$("#ingredients").append('<option hidden value="'+value+'" selected>'+value+'</option>');
				 	
			  		}
			  
				 
			  	});
			  	
				
				$("#ingredients").append('</select>');
			 
		});
	});
	
	$('#imageToUpload').on('change',function(){
	  if($(this).get(0).files.length > 0){ // only if a file is selected
	    var fileSize = $(this).get(0).files[0].size;
	    if(fileSize > 400000){
	    	$("#submit").prop( "disabled", true );
	    }
	    console.log(fileSize);
	  }
	});
	


	$('#button').click(function(){
		var text= $("#description").val();
		$("#description").val('');
		$('h6').html('6000');
		document.getElementById("button").disabled = true;
		$('#postato').prepend('<div class="col-sm-12 box">'+text+'</div>');
	
	});
	
	  $("#delete-form").click(function(event) {
        if( !confirm('Sei sicuro di voler eliminare la ricetta?') ) 
            event.preventDefault();
    });



});

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});