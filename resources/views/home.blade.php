@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
           
            @if (Auth::check())
                
                 <div class="row" >
                    <h1 class="text-center">Benvenuto {{ Auth::user()->name }}!</h1>
                    <h4 class="text-center"> A {{ $site_name=App\Setting::first()->site_name }} puoi iscriverti ed aggiungere le tue ricette preferite e meglio riuscite, e diventare anche tu un famoso chef!
                    Iscriversi &egrave; semplice, basta cliccare <a type="button" class="btn btn-success" href="{{ url('/register') }}"> qui </a>!<br>
                    Qui di seguito vedrai un paio di esempi di ricette dei nostri utenti...</h4>
                </div>
                    
                
             @else
                <div class="row" >
                    <h1 class="text-center">Benvenuti nel miglior sito di ricette di sempre!</h1>
                    <h4 class="text-center"> A {{ $site_name=App\Setting::first()->site_name }} puoi iscriverti ed aggiungere le tue ricette preferite e meglio riuscite, e diventare anche tu un famoso chef!
                    Iscriversi &egrave; semplice, basta cliccare <a type="button" class="btn btn-success" href="{{ url('/register') }}"> qui </a>!<br>
                    Qui di seguito vedrai un paio di esempi di ricette dei nostri utenti...</h4>
                </div>
                
            @endif
        </div>
    </div>
    @foreach($categories as $category)
    <?php $i=0; ?>
     <div class="row recipe-list">
         <div class="col-sm-12 text-center">
         <h3> {{ ucfirst($category->name) }} :</h3>
         </div>
        
     @foreach ($recipes as $recipe)
                            
        @if ( $recipe->category->name == $category->name )                  
                           
        
                           <div class="col-sm-4">
                               <div class="recipe-box">
                                   @if (file_exists('assets/img/recipe/'.$recipe->id.'.jpg'))
                                <img src="{{asset('assets/img/recipe/'.$recipe->id.'.jpg')}}" alt="recipe image" class="img-responsive fix-height-150" />
                                @else
                                <img src="{{asset('assets/img/recipe/default.png')}}" alt="recipe image" class="img-responsive fix-height-150" />
                                @endif
                                <h4 class="media-heading"> {{ $recipe->title }}</h4>
                                <p class="text-right">Autore: {{ $recipe->user->name }} </p>
                               <div class="description-box">
                                
                                    {{ str_limit( $recipe->description, 320, $end= '...' ) }}
                               
                               </div>  
                   <hr>             
                <ul class="list-inline list-unstyled font-1">
                    
              <!--  $recipe->created_at->format('d-m-Y')  -->
  			<li><span><i class="glyphicon glyphicon-calendar"></i>{{ date('d-m-Y',strtotime($recipe->created_at)) }}</span></li>
            <li>|</li>
            <span><i class=" glyphicon glyphicon-sort-by-attributes"></i>{{ $recipe->ingredient_to_recipes->count() }}ingredienti</span>
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
            @endif
            <?php if($i >= 3){ break;}?>
        @endforeach
            
     </div>
     
      <?php $i=0; ?>
    
            
        
            
     
     @endforeach
</div>
@endsection
