<?php

namespace App\Http\Controllers;
use App\Models\Student;

class ApiController
{
   public function getProfile(){
    $userId = request('id');
    $user = Student::find($userId);
    return response()->json([
        'status' => 200,
        'data' => $user
    ]);
   }
//    public function getProfile(){
//     return Student::all();
//    }
}
