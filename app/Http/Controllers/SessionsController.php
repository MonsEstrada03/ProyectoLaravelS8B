<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store() {
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Usuario o Contraseña Incorrecta, intentalo de nuevo pue hija',
            ]);
   
        }else{
            if(auth()->user()->role == 'gerente'){
                return redirect()->route('gerente.index'); 
            }
            elseif(auth()->user()->role == 'empleado'){
                return redirect()->route('empleados.index'); 

            }elseif(auth()->user()->role == 'cliente'){
                return redirect()->route('paquetes.index'); 

            }else{

                return redirect()->to('/');
            }

        }
        return redirect()->to('/');
            
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }
    
    
}
