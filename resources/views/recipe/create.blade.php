<?php 
if(strpos(URL::previous(), 'admin')!=false && Auth::check()){
	
	if(Auth::user()->isAdmin() ){
		$var = true;
	}else{
		$var = false;
	}
}else{
	$var = false;
}
?>

@extends($var ? 'layouts/admin' : 'layouts/app')

@section('content')
    
    	<div class="container">
			<div class="row">
				<h1>Crea una ricetta</h1>
				{!! Form::open(['method'=>'POST','id'=>'recipe_form', 'name'=>'create_recipe','route' => 'recipe.store','enctype' => 'multipart/form-data']) !!}
       			 <div class="form-group col-sm-8">
       			 	 <div class="col-sm-4">
       			 	  <label class="control-label" for="title">Titolo</label>
        			 <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
        			 </div>
        			 <div class="col-sm-4">
        			   <label class="control-label" for="caregory">Categoria</label>
						  
						    <select id="category" name="category" class="form-control">
						    	@foreach ($categories as $category)
						    	<option value="{{$category->name}}">{{ucfirst($category->name)}}</option>
						      	@endforeach
						    </select>
					</div>
					<div class="col-sm-4">
        			   <label class="control-label" for="difficult">Difficolt&agrave;</label>
						  
						    <select id="difficult" name="difficult" class="form-control">
						      <option value="facile">Facile</option>
						      <option value="medio">Medio</option>
						      <option value="difficile">Difficile</option>
						    </select>
					</div>
					<div class="form-group col-sm-12">
						<label class="control-label" for="description">Descrizione ricetta</label>
					 <textarea class="form-control" rows="8" id="description" name="description" required></textarea>
					 </div>
										
					  <div class="col-sm-12" >
					  	
					  	<label class="control-label" for="title">Lista ingredienti</label>
					   <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Puoi aggiungere ingredienti dalla lista, o scriverne direttamente di nuovi qua sotto!"> ? </button>
					  	<div class="col-sm-3 pull-right">
						  	<select id="ingredient-list" name="ingredient-list" class="form-control">
							    	@foreach ($ingredients as $ingredient)
							    	<option value="{{$ingredient->name}}">{{ucfirst($ingredient->name)}}</option>
							      	@endforeach
							 </select>
						</div>
						<button type="button" id="button-ingredient" class="pull-right btn btn-warning">Aggiungi</button>
						<input type="text" class="form-control" id="ingredient" name="ingredient" placeholder="Ingredienti">
						<p id="ingredients"></p>
					  </div>
					  
					    
					 <div class="form-group col-sm-12">
					 	<label class="control-label" for="imageToUpload">Immagine</label>
					 	  <input  type="file" name="imageToUpload" id="imageToUpload">
					<!-- <button disabled type="submit" id="button" class="btn btn-primary col-sm-2 pull-right ">Crea</button> -->
					  {!! Form::submit('Crea', ['id'=>'submit','class' => 'btn btn-primary col-sm-2 pull-right ']) !!}
					  <span class="validate">*Titolo neccessario!</span>
					 <h6 class="pull-right counter">Numero caratteri: 6000</h6>
					 </div>
					 
				 </form>
					 
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					
				

				</div>
			</div>
		</div>
		
@endsection

