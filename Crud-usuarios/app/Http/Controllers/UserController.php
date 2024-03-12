<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Responses\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        try {

            $users = User::all();
        return     ApiResponse::success('lista de users', 200, $users);
          
       
        } catch (Exception $e) {

            return ApiResponse::error('ha ocurrido un error ' . $e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',//unique:users
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);
            $user = User::create($request->all());
           return ApiResponse::success('user creado exitosamente  ', 201, $user);
         
        } catch (ValidationException $e) {
            // no se debe enviar el error de $e por que se da mucha informacion en caso de hackeo
            return ApiResponse::error('error validacion ' . $e->getMessage(), 422);
            return ApiResponse::error('error validacion ', 422);
        }
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return ApiResponse::success('user encontrado exitosamente', 200, $user);
        } catch (\Throwable $th) {
            return ApiResponse::error('user no encontrada', 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $request->validate([
                'name' => ['required', Rule::unique('users')->ignore($user)]
            ]);
            $user->update($request->all());
           return ApiResponse::success('user actualizado exitosamente', 200, $user);
        } catch (ModelNotFoundException $e) {
           return  ApiResponse::success('user no encontrado', 404);
         
        } catch (Exception $e) {
            return ApiResponse::error('error: ' . $e->getMessage(), 422);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return ApiResponse::success('user eliminado exitosamente', 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error('user no encontrado', 404);
        }
    }
}
