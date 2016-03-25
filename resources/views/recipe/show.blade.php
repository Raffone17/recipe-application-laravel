<?php 
if(strpos(URL::previous(),  'admin')!=false && Auth::check()){
	
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
        
                
                <div class="col-sm-8 col-sm-offset-2 ">
                               <div class="recipe-box-show">
                                    @if (file_exists('assets/img/recipe/'.$recipe->id.'.jpg'))
                                <img src="{{asset('assets/img/recipe/'.$recipe->id.'.jpg')}}" alt="recipe image" class="img-responsive img-thumbnail" />
                                @else
                                <img src="{{asset('assets/img/recipe/default.png')}}" alt="recipe image" class="img-responsive img-thumbnail" />
                                @endif
                                <h4 class="media-heading"> {{ $recipe->title }}</h4>
                                <p class="text-right">Autore: {{ $recipe->user->name }}</p>
                                <div class="ingredients-box">
                               <h4 class="media-heading">Ingredienti: </h4>
                               
                                   <ul style="list-style:none;">
                               @foreach ($ingredients_to_recipes as $ingredient)
                               <li><i class="glyphicon glyphicon-cutlery"></i>
                               {{ $ingredient->ingredient->name }}</li>
                               @endforeach
                               </ul>
                               
                                </div>
                                <div class="col-sm-12">
                                    <h4>Categoria:  {{ $recipe->category->name }} </h4>
                                    
                                </div>
                               <div class="description-box2">
                                
                                    {{ $recipe->description }}
                               
                               </div>
                               <hr>
                <ul class="list-inline list-unstyled">
                    
               
  			<li><span><i class="glyphicon glyphicon-calendar"></i> Data : {{ $recipe->created_at->format('d-m-Y') }}</span></li>
            <li>|</li>
            <span><i class=" glyphicon glyphicon-sort-by-attributes"></i> {{$ingredients_to_recipes->count()}} n° ingredienti</span>
            <li>|</li>
            <li>
                <span class="glyphicon glyphicon-tasks"></span> Difficolt&agrave;: 
            {{ $recipe->difficult }}
            
                        
            </li>
            <li>|</li>
            @if ((Auth::check() && Auth::id()==$recipe->user_id) || (Auth::check() && Auth::user()->isAdmin() ) )
            <li>	<a class="btn btn-warning pull" href="{{ route('recipe.edit', ['id' => $recipe->id]) }}">Modifica</a></li>
            <li>|</li>
            <li>{{ Form::open(['route' => ['recipe.destroy', $recipe->id], 'method' => 'delete', 'id' => 'delete-form']) }}
             <button class="btn btn-danger pull" id="#delete" type="submit">Elimina</button>
            {{ Form::close() }}</li>
           
            @endif
			</ul>
			
			
            </div>
            
             </div>
             </div>
             </div>
@endsection