<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pessoa;
class ApiController extends Controller
{
    public function getAllUser() {
        $user = Pessoa::get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 200);
      }

      public function createUser(Request $request) {
        $user = new Pessoa;
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->categoria_codico = $request->categoria_codico;
        $user->save();

        return response()->json([
          "message" => "User record created"
        ], 201);
      }

      public function getUser($id) {
        if (Pessoa::where('id', $id)->exists()) {
          $user = Pessoa::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($user, 200);
        } else {
          return response()->json([
            "message" => "User not found"
          ], 404);
        }
      }

      public function updateUser(Request $request, $id) {
        if (Pessoa::where('id', $id)->exists()) {
          $user = Pessoa::find($id);

          $user->nome = is_null($request->nome) ? $user->nome : $request->nome;
          $user->email = is_null($request->email) ? $user->email : $request->email;
          $user->categoria_codico = is_null($request->categoria_codico) ? $user->categoria_codico : $request->categoria_codico;
          $user->save();

          return response()->json([
            "message" => "records updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "User not found"
          ], 404);
        }
      }

      public function deleteUser ($id) {
        if(Pessoa::where('id', $id)->exists()) {
          $user = Pessoa::find($id);
          $user->delete();

          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "User not found"
          ], 404);
        }
      }
  }
