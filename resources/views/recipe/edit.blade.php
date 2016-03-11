@extends('layouts.app')

@section('content')
    
    	<div class="container">
			<div class="row">
				<h1>Crea una ricetta</h1>
				{!! Form::open(['method'=>'PUT','id'=>'recipe_form', 'name'=>'create_recipe','route' => array('recipe.update', $recipe->id),'enctype' => 'multipart/form-data']) !!}
       			 <div class="form-group col-sm-8">
       			     <label class="control-label" for="title"><--Immagine attuale</label>
       			     <div class="col-sm-8">
       			         <img src="{{asset('assets/img/recipe/'.$recipe->id.'.jpg')}}" alt="recipe image" class="img-responsive img-thumbnail" />
       			     </div>
       			     <hr>
       			 	 <div class="col-sm-4">
       			 	  <label class="control-label" for="title">Titolo</label>
        			 <input type="text" class="form-control" id="title" name="title" value="{{$recipe->title}}" placeholder="Title" required>
        			 </div>
        			 <div class="col-sm-4">
        			   <label class="control-label" for="caregory">Categoria</label>
						  
						    <select id="category" name="category" class="form-control">
						    	@foreach ($categories as $category)
						    	<option value="{{$category->name}}" 
						    	@if($category->name == App\Category::findOrFail($recipe->category_id)->name)
						    	selected
						    	@endif
						    	>{{ucfirst($category->name)}}</option>
						      	@endforeach
						    </select>
					</div>
					<div class="col-sm-4">
        			   <label class="control-label" for="difficult">Difficolt&agrave;</label>
						  
						    <select id="difficult" name="difficult" class="form-control">
						      <option value="facile"
						      @if($recipe->difficult == 'facile')
						      selected
						      @endif
						      >Facile</option>
						      <option value="medio"
						      @if($recipe->difficult == 'medio')
						      selected
						      @endif
						      >Medio</option>
						      <option value="difficile"
						      @if($recipe->difficult == 'difficile')
						      selected
						      @endif
						      >Difficile</option>
						    </select>
					</div>
					<div class="form-group col-sm-12">
						<label class="control-label" for="description">Descrizione ricetta</label>
					 <textarea class="form-control" rows="8" id="description" name="description" required>{{$recipe->description}}</textarea>
					 </div>
										
					  <div class="col-sm-12" >
					  	<label class="control-label" for="title">Lista ingredienti</label>
						<input type="text" class="form-control" id="ingredient" name="ingredient" placeholder="Ingredienti" value="@foreach ($ingredients_to_recipes as $ingredient){{ $ingredient->ingredient->name.', ' }}@endforeach">
						<p id="ingredients"></p>
					  </div>
					  
					    
					 <div class="form-group col-sm-12">
					 	<label class="control-label" for="imageToUpload">Cambia immagine</label>
					 	  <input  type="file" name="imageToUpload" id="imageToUpload">
					<!-- <button disabled type="submit" id="button" class="btn btn-primary col-sm-2 pull-right ">Crea</button> -->
					  {!! Form::submit('Modifica', ['id'=>'submit','class' => 'btn btn-primary col-sm-2 pull-right ']) !!}
                       
					 <h6 class="pull-right counter">Numero caratteri: 6000</h6>
					 </div>
					 
				 </form>
				 @if (Auth::check() && Auth::id()==$recipe->user_id)
				  <div class="form-group col-sm-12">
				 {{ Form::open(['route' => ['recipe.destroy', $recipe->id], 'method' => 'delete', 'id' => 'delete-form']) }}
             		<button class="btn btn-danger pull-right" id="#delete" type="submit">Elimina</button>
           		 {{ Form::close() }}
					 </div>
				 @endif
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					
					
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

				</div>
			</div>
		</div>
		
@endsection