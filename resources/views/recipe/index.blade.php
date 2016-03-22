@extends('layouts.app')

@section('content')
    
   
        
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                   <h1>Elenco ricette</h1>
                   </div>
                     <div class="col-sm-4 pull-right">
            		<h3>Ricerca Per ingrediente</h3>
                    <div id="custom-search-input">
                        <div class="input-group col-sm-12">
                            {{ Form::open(['route' => 'search.ingredient', 'method' => 'get', 'role'=>'search', 'class'=>'navbar-form']) }}
                            <input type="text" class="form-control " placeholder="Cerca" name="ingredient" />
                            <span class="input-group-btn">
                                <button class="btn btn-info " type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <div class="container">
                    <?php $i = 0; ?>
                   <div class="row recipe-list">
                          @foreach ($recipes as $recipe)
                           @if ( $i != 0 && $i%3 == 0)
                           </div>
                           <div class="row recipe-list">
                           @endif
                           <div class="col-sm-4">
                               <div class="recipe-box">
                                      @if (file_exists('assets/img/recipe/'.$recipe->id.'.jpg'))
                                <img src="{{asset('assets/img/recipe/'.$recipe->id.'.jpg')}}" alt="recipe image" class="img-responsive fix-height-150" />
                                @else
                                <img src="{{asset('assets/img/recipe/default.png')}}" alt="recipe image" class="img-responsive fix-height-150" />
                                @endif
                                
                                <h4 class="media-heading"> {{ $recipe->title }}</h4>
                                <p class="text-right">Autore: {{ $user = App\User::findOrFail($recipe->user_id)->name }}</p>
                               <div class="description-box">
                                
                                    {{ str_limit( $recipe->description, 320, $end= '...' ) }}
                               
                               </div>  
                   <hr>             
                <ul class="list-inline list-unstyled">
                    
              <!--  $recipe->created_at->format('d-m-Y')  -->
  			<li><span><i class="glyphicon glyphicon-calendar"></i>{{ date('d-m-Y',strtotime($recipe->created_at)) }}</span></li>
            <li>|</li>
            <span><i class=" glyphicon glyphicon-sort-by-attributes"></i>{{App\Ingredient_to_recipe::where('recipe_id',$recipe->id)->count()}}ingredienti</span>
            <li>|</li>
            <li>
                <span class="glyphicon glyphicon-tasks"></span>
            {{ $recipe->difficult }}
               
                        
            </li>
            
            
			</ul>
			<a class="btn btn-info" href="{{ route('recipe.show', ['id' => $recipe->id]) }}">Leggi Tutta</a> 
            </div>
            
             </div>
            <?php $i++; ?>
            @endforeach
            
            </div>
            </div>
            
            
            {!! $recipes->render() !!}
             
    </div>
@endsection