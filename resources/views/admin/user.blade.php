@extends('layouts.admin')

@section('content')
    <div class="container-fluid" >
        <table class="table">
          <thead class="thead-inverse" style="background-color:#373a3c; color:white;">
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Data</th>
              <th>Ricette</th>
              <th>Ruolo</th>
              <th>Modifica</th>
              <th>Elimina</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($users as $user)
                <tr>
                  <th scope="row">{{ $user->id }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
                  <td>{{ App\Recipe::where('user_id',$user->id)->count() }}</td>
                  <td>@if( $user->role == 2)
                        Amministratore
                       @else
                        Utente 
                       @endif
               </td>
                </tr>
               @endforeach
          </tbody>
      </table>
        {!! $users->render() !!}
        <div class="row" >
            
        </div>
    </div>
  
    
@endsection