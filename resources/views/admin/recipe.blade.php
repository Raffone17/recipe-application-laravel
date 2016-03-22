@extends('layouts.admin')

@section('content')
    <div class="container-fluid" >
        <table class="table">
          <thead class="thead-inverse" style="background-color:#373a3c; color:white;">
            <tr>
              <th>#</th>
              <th>Titolo</th>
              <th>Autore</th>
              <th>Categoria</th>
              <th>Ingredienti</th>
              <th>Data</th>
              <th>Modifica</th>
              <th>Elimina</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($recipes as $recipe)
                <tr>
                  <th scope="row">{{ $recipe->id }}</th>
                  <td>{{ str_limit($recipe->title , 20 , $end='...' ) }}</td>
                  <td>{{ App\User::findOrFail($recipe->user_id)->name }}</td>
                  <td>{{ App\Category::findOrFail($recipe->category_id)->name }}</td>
                  <td>{{ App\Ingredient_to_recipe::where('recipe_id',$recipe->id)->count() }}</td>
                  <td>{{ date('d-m-Y',strtotime($recipe->created_at)) }}</td>
                </tr>
               @endforeach
          </tbody>
      </table>
        {!! $recipes->render() !!}
        <div class="row" >
            
        </div>
    </div>
  
    
@endsection