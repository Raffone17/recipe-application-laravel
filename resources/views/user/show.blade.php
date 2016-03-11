@extends('layouts.app')

@section('content')
    
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
      @if($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            
        @endif
        <div class="container">
        <div class="row">
          <div class="col-sm-6">
               <i class="glyphicon glyphicon-user"></i><label class="control-label font-15-b"> Nome: </label>  {{ $user->name }}<br>
               <i class="glyphicon glyphicon-envelope"></i><label class="control-label font-15-b"> Email: </label>  {{ $user->email }}<br>
               <i class="lyphicon glyphicon-lock"></i><label class="control-label font-15-b"> Tipo utente: </label>
               @if( $user->role == 2)
                Amministratore<br>
               @else
                Utente<br> 
               @endif
               <i class="glyphicon glyphicon-calendar"></i><label class="control-label  font-15-b ">Data iscrizione:</label> {{ $user->created_at->format('d-m-Y') }}<br>
               
                
                
        </div>
        </div>
         <?php $i=0; ?>
         <div class="row">
                   <h1>Elenco ricette</h1>
                       <div class="row recipe-list">
                          @foreach ($recipes as $recipe)
                            
                           <div class="col-sm-6">
                               <div class="recipe-box">
                                 @if (file_exists('assets/img/recipe/'.$recipe->id.'.jpg'))
                                <img src="{{asset('assets/img/recipe/'.$recipe->id.'.jpg')}}" alt="recipe image" class="img-responsive" />
                                @else
                                <img src="{{asset('assets/img/recipe/default.png')}}" alt="recipe image" class="img-responsive" />
                                @endif
                                <h4 class="media-heading"> {{ $recipe->title }}</h4>
                                <p class="text-right">Autore: {{ $user = App\User::findOrFail($recipe->user_id)->name }}</p>
                               <div class="description-box">
                                
                                    {{ str_limit( $recipe->description, 550, $end= '...' ) }}
                               
                               </div>  
                                
                <ul class="list-inline list-unstyled">
                    
               
  			<li><span><i class="glyphicon glyphicon-calendar"></i>{{ $recipe->created_at->format('d-m-Y') }}</span></li>
            <li>|</li>
            <span><i class=" glyphicon glyphicon-sort-by-attributes"></i>{{App\Ingredient_to_recipe::where('recipe_id',$recipe->id)->count()}}ingredienti</span>
            <li>|</li>
            <li>
                <span class="glyphicon glyphicon-tasks"></span>
            {{ $recipe->difficult }}
               
                        
            </li>
            <li>|</li>
            
			</ul>
			<a class="btn btn-info" href="{{ route('recipe.show', ['id' => $recipe->id]) }}">Leggi Tutta</a>
				<a class="btn btn-warning pull-right" href="{{ route('recipe.edit', ['id' => $recipe->id]) }}">Modifica</a></li>
            </div>
            
             </div>
            
            @endforeach
            
            </div>
             
        </div>
@endsection