<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['name','course','email','phone'];
    public static function getAllStudents(){
        $result = DB::table('students')->select('id','name','course','email','phone')->get()->toArray();
        return $result;
    }
}
