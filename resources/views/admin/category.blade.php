@extends('layouts.admin')

@section('content')
    <div class="container-fluid" >
        <table class="table">
          <thead class="thead-inverse" style="background-color:#373a3c; color:white;">
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Data</th>
              <th>Numero ricette</th>
              <th>Modifica</th>
              <th>Elimina</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($categories as $category)
                <tr>
                  <th scope="row">{{ $category->id }}</th>
                  <td>{{ $category->name }}</td>
                  <td>{{ date('d-m-Y',strtotime($category->created_at)) }}</td>
                  <td>{{ App\Recipe::where('category_id',$category->id)->count() }}</td>
                  <td><a class="btn btn-warning pull" href="{{ route('category.edit', ['id' => $category->id]) }}">Modifica</a></td>
                  <td>{{ Form::open(['route' => ['category.destroy', $category->id], 'method' => 'delete', 'class' => 'delete-category']) }}
                     <button class="btn btn-danger pull" type="submit">Elimina</button>
                      {{ Form::close() }}
                  </td>
                </tr>
               @endforeach
          </tbody>
      </table>
        {!! $categories->render() !!}
        	<div class="row">
        	    <div class="col-sm-12">
				<h3>Aggiungi una Categoria</h3>
				</div>
				{!! Form::open(['method'=>'POST','id'=>'category_create_form', 'name'=>'create_category','route' => array('category.store'),'enctype' => 'multipart/form-data']) !!}
       			 <div class="form-group col-sm-4">
       			     <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Nome: </label>
            			 <input type="text" class="form-control"  name="name"  placeholder="Name" required><br>
        			 </div>
        			
        			 <div class="col-sm-4">
        			     <br>
        			     {!! Form::submit('Aggiungi', ['id'=>'modify_category','class' => 'btn btn-primary  ']) !!}
        			 </div>
			</div>
		</div>
    </div>
  
    
@endsection