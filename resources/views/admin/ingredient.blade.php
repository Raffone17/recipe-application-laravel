@extends('layouts.admin')

@section('content')
    <div class="container-fluid" >
        <table class="table">
          <thead class="thead-inverse" style="background-color:#373a3c; color:white;">
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Utilizzi</th>
              <th>Data</th>
              <th>Modifica</th>
              <th>Elimina</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($ingredients as $ingredient)
                <tr>
                  <th scope="row">{{ $ingredient->id }}</th>
                  <td>{{ $ingredient->name }}</td>
                  <td>{{ App\Ingredient_to_recipe::where('ingredient_id',$ingredient->id)->count() }}</td>
                  <td>{{ date('d-m-Y',strtotime($ingredient->created_at)) }}</td>
                </tr>
               @endforeach
          </tbody>
      </table>
        {!! $ingredients->render() !!}
        <div class="row" >
            
        </div>
    </div>
  
    
@endsection