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
                  <td><a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" >{{ str_limit($recipe->title , 25 , $end='...' ) }}</a></td>
                  <td>{{ App\User::findOrFail($recipe->user_id)->name }}</td>
                  <td>{{ App\Category::findOrFail($recipe->category_id)->name }}</td>
                  <td>{{ App\Ingredient_to_recipe::where('recipe_id',$recipe->id)->count() }}</td>
                  <td>{{ date('d-m-Y',strtotime($recipe->created_at)) }}</td>
                  <td><a class="btn btn-warning pull" href="{{ route('recipe.edit', ['id' => $recipe->id]) }}">Modifica</a></td>
                  <td>
                      {{ Form::open(['route' => ['recipe.destroy', $recipe->id], 'method' => 'delete', 'class' => 'delete-form']) }}
                     <button class="btn btn-danger pull" type="submit">Elimina</button>
                      {{ Form::close() }}
                  </td>
                </tr>
               @endforeach
          </tbody>
      </table>
        {!! $recipes->render() !!}
        <div class="row" >
            
        </div>
    </div>
  
    
@endsection