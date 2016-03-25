@extends('layouts.admin')

@section('content')
<div class="container-fluid" >
    <div class="container">
			<div class="row">
				<h1>Modifica la Categoria</h1>
				{!! Form::open(['method'=>'PUT','id'=>'category_edit_form', 'name'=>'edit_category','route' => array('category.update', $category->id),'enctype' => 'multipart/form-data']) !!}
       			 <div class="form-group col-sm-6">
       			     <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Nome: </label>
            			 <input type="text" class="form-control"  name="name" value="{{$category->name}}" placeholder="Name" required><br>
        			 </div>
        			 <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Numero ricette  : </label>
            			 <h5>{{ App\Recipe::where('category_id',$category->id)->count() }}</h5>
        			 </div>
        			  <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Data creazione : </label>
           			 	 <h5>{{ date('d-m-Y',strtotime($category->created_at)) }}</h5>
           			 </div>
        			 <div class="col-sm-4">
        			     <br>
        			     {!! Form::submit('Modifica', ['id'=>'modify_category','class' => 'btn btn-primary  ']) !!}
        			 </div>
			</div>
		</div>
	</div>
</div>
@endsection