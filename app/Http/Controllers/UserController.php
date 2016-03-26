<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Recipe;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user= User::where('id', $id)->first(['id','name','email','role','created_at']);
        
        if($user != null){
            
            $recipes = User::find($id)->recipes;
            
            return view('user.show' ,['user' => $user,'recipes' => $recipes]);
            
        }else{
            
            return redirect()->back()->with('status-warning', 'Utente non trovato!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        
        if($user != null){
            if($user->id == Auth::id() || Auth::user()->isAdmin() ){
                return view('user.edit' ,['user' => $user]);
            }else{
                return redirect()->back()->with('status-warning', 'Non hai i permessi per modificare l\'utente!');
            }
        }else{
            
            return redirect()->back()->with('status-warning', 'Utente non trovato!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'name' => 'required | min:3',
        'email' => 'required | email | min:6',
        'password' => 'min:5',
        ]);
        
        $status = null;
        
        $user = User::find($id);
        if($user != null && $user->id == Auth::id() || Auth::user()->isAdmin()){
            $user->name = $request->name;
            $user->email = $request->email;
            if(isset($request->password) && !empty($request->password)){
                if($request->password == $request->password2){
                    $user->password = bcrypt($request->password);
                    
                }else{
                    $status = "Le passowrd non corrispondono!";
                    return redirect()->back()->with('status-warning', $status);
                }
            }
            
            if(isset($request->role) && ($request->role == 1 || $request->role == 2) ){
                $user->role = $request->role;
            }
            
            $user->save();
            if( Auth::user()->isAdmin() ){
                return redirect()->route('admin.user')->with('status', "Utente modificato con successo!");
            }else{
                return redirect()->route('user.show',[$id])->with('status', "Utente modificato con successo!");
            }
            
        }else{
            return redirect()->route('user.show',[$id])->with('status-warning', "Utente non trovato oppure non hai i permessi!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
}
