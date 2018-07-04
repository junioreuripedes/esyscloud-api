<?php

namespace Modulos\CadastroBase\Cargo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use Modulos\CadastroBase\Cargo\Cargo;

class CargoController extends Controller{
    
    public function consulta(){
    
        try{

            $cargo = Cargo::all();

            if($cargo){
    
                return response()->json($cargo, 200);
    
            }else{
    
                return response()->json('Não encontrado!', 404);
    
            }        
    
        }catch (QueryException $e){
    
            return response()->json('Método não permitido!', 405);
    
        }

    }

    public function consultaCodigo($id){
    
        try{

            $cargo = Cargo::find($id);
 
            if($cargo){
    
                return response()->json($cargo, 200);
    
            }else{
    
                return response()->json('Não encontrado!', 404);
    
            }        
    
        }catch (QueryException $e){
    
            return response()->json('Método não permitido!', 405);
    
        }

    }

    public function adicionar(Request $request){

        try{

            $data = $request->all();
            
            $validacao = Validator::make($data, [
                'NO_CARGO'  => 'required|string|min:3|max:80|unique:tb_cadastro_base_cargo',
                'DS_CARGO'  => 'required|string|min:5'
            ]);
            
            if($validacao->fails()){
               
               return response()->json($validacao->errors(), 400);
               
            }else{

                $cargo = Cargo::create([
                    'NO_CARGO'  => $data['NO_CARGO'],
                    'DS_CARGO'  => $data['DS_CARGO']
                ]);

                return response()->json('Cadastro efetuado com sucesso!', 200);

            }
    
        }catch (QueryException $e){
    
            return response()->json('Método não permitido!', 405);
    
        }

    }

    public function alterar($id, Request $request) {

        try{

            $cargo = Cargo::findOrFail($id);
            $data  = $request->all();
        
            $validacao = Validator::make($data, [
                'NO_CARGO'  => ['required', 'string', 'min:3', 'max:80', Rule::unique('tb_cadastro_base_cargo')->ignore($cargo->CO_CADASTRO_BASE_CARGO, 'CO_CADASTRO_BASE_CARGO')],
                'DS_CARGO'  => 'required|string|min:3'
            ]);
        
            if($validacao->fails()){
               
                return response()->json($validacao->errors(), 400);
                
            }else{

                $cargo->update($data);

                return response()->json('Cadastro efetuado com sucesso!', 200);

            }
    
        }catch (QueryException $e){
    
            return response()->json('Método não permitido!', 405);
    
        }

    }
    
    public function excluir($id) {

        try{

            $cargo = Cargo::find($id);
        
            if($cargo){
    
                $cargo->delete($cargo->CO_CADASTRO_BASE_CARGO);
    
                return response()->json('Exclusão efetuada com sucesso!', 200);
    
            }else{
    
                return response()->json('Não encontrado!', 404);
    
            }        
    
        }catch (QueryException $e){
    
            return response()->json('Método não permitido!', 405);
    
        }

    }

}