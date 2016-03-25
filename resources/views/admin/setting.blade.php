@extends('layouts.admin')

@section('content')
<div class="container">
			<div class="row">
				<h1>Impostazioni</h1>
				{!! Form::open(['method'=>'PUT','id'=>'setting_edit_form', 'name'=>'edit_setting','route' => 'setting.update','enctype' => 'multipart/form-data']) !!}
       			 <div class="form-group col-sm-6">
       			     <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="site_name">Nome Sito: </label>
            			 <input type="text" class="form-control" id="name_form" name="site_name" value="{{$setting->site_name}}" placeholder="Name" required><br>
        			 </div>
        			 <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="paginate_recipe">Numero di ricette per pagina:</label>
            			 <select  id="paginate_recipe" name="paginate_recipe" class="form-control">
            			     @for ( $i=1; $i<=10; $i++ )
            			        <option value="{{ $i*3 }}"
            			        @if ($i*3 == $setting->paginate_recipe)
            			        selected
            			        @endif
            			        >{{ $i*3 }} ricette per pagina</option>
            			     @endfor
            			 </select>
        			 </div>
        			  <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="paginate_admin">Numero di paginazione per amministrazione:</label>
            			 <select  id="paginate_admin" name="paginate_admin" class="form-control">
            			     @for ( $i=1; $i<=10; $i++ )
            			        <option value="{{ $i*5 }}"
            			        @if ($i*5 == $setting->paginate_admin)
            			        selected
            			        @endif
            			        >{{ $i*5 }} numero di paginazione</option>
            			     @endfor
            		 </select>
        			 </div>
        			 <div class="col-sm-12">
           			 	 <label class="control-label font-15-b" for="theme">Tema utilizzato:</label>
            			 <select id="theme" name="theme" class="form-control">
            			     @for ( $i=1; $i<=3; $i++ )
            			        <option value="{{ $i }}"
            			        @if ($i == $setting->theme)
            			        selected
            			        @endif
            			        >Tema numero: {{ $i }} </option>
            			     @endfor
            		 </select>
        			 </div>
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