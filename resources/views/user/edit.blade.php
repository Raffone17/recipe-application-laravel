<?php 
if(strpos(URL::previous(), 'admin')!=false && Auth::check()){
	
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
				<h1>Modifica l'utente</h1>
				{!! Form::open(['method'=>'PUT','id'=>'user_edit_form', 'name'=>'edit_user','route' => array('user.update', $user->id),'enctype' => 'multipart/form-data']) !!}
       			 <div class="form-group col-sm-6">
       			     <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Nome: </label>
            			 <input type="text" class="form-control" id="name_form" name="name" value="{{$user->name}}" placeholder="Name" required><br>
        			 </div>
        			 <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Email :</label>
            			 <input type="email" class="form-control" id="email_form" name="email" value="{{$user->email}}" placeholder="email" required><br>
        			 </div>
        			  <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Password :</label>
            			 <input type="password" class="form-control" id="pass1" name="password" value="" placeholder="Inserisci nuova password" >
        			 </div>
        			 <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Conferma password :</label>
            			 <input type="password" class="form-control" id="pass2" name="password2" value="" placeholder="Inserisic nuovamente password" ><br>
        			 </div>
        			 @if (Auth::user()->isAdmin())
        			 <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="title">Tipo utente:</label>
           			     <select  id="role" name="role" class="form-control">
           			         <option value="1" 
           			         @if( $user->role == 1)
           			         selected
           			         @endif
           			         >Utente</option>
           			         <option value="2"
           			           @if( $user->role ==2 )
           			           selected
           			           @endif
           			         >Amministratore</option>
            			</select>
        			 </div>
        			 @endif
        			 <div class="col-sm-4">
        			     <br>
        			     {!! Form::submit('Modifica', ['id'=>'modify_user','class' => 'btn btn-primary  ']) !!}
        			 </div>
        			 <div class="col-sm-6">
        			 	<span class="validate"></span>
        			 </div>
        			 
       			 </div>
       		</div>
</div>

@endsection