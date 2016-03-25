@extends('layouts.admin')

@section('content')
<div class="container-fluid" >
    <div class="container">
			<div class="row">
				<h1>Modifica l'ingrediente</h1>
				{!! Form::open(['method'=>'PUT','id'=>'ingredient_edit_form', 'name'=>'edit_ingredient','route' => array('ingredient.update', $ingredient->id),'enctype' => 'multipart/form-data']) !!}
       			 <div class="form-group col-sm-6">
       			     <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Nome: </label>
            			 <input type="text" class="form-control"  name="name" value="{{$ingredient->name}}" placeholder="Name" required><br>
        			 </div>
        			 <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Numero ricette impiegato : </label>
            			 <h5>{{ App\Ingredient_to_recipe::where('ingredient_id',$ingredient->id)->count() }}</h5>
        			 </div>
        			  <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Data creazione : </label>
           			 	 <h5>{{ date('d-m-Y',strtotime($ingredient->created_at)) }}</h5>
           			 </div>
        			 <div class="col-sm-4">
        			     <br>
        			     {!! Form::submit('Modifica', ['id'=>'modify_ingredient','class' => 'btn btn-primary  ']) !!}
        			 </div>
</div>
@endsection