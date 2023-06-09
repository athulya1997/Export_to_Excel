<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use Excel;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
class StudentController extends Controller
{
    public function index(){
        $student = Student::all();
        return view('student.index',compact('student'));
    }
    public function exportToExcel(){
        return Excel::download(new StudentExport,'student-excel.xlsx');
    }
    // public function exportToPDF(){
    //     $student = Student::get()->toArray();
    //     $pdf = PDF::loadview()
    // }
    public function exportToPDF(){
        $student = Student::get();
        // $student = Student::all();
        $pdf = PDF::loadview('student.invoice',['student'=>$student]);
        return $pdf->download('student-list.pdf');
    }
    public function store(Request $request){
        $student = new Student;
        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->save();
        return redirect()->back()->with('status','Student Added Successfully');
    }
    public function edit($id){
        $student = Student::find($id);
        return response()->json([
            'status'=>200,
            'student'=>$student,
            ]);
    }
    public function update(Request $request){
        $stud_id=$request->input('stud_id');
        $student = Student::find($stud_id);
        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }
    public function destroy(Request $request){
        $stud_id=$request->input('delete_stud_id');
        $student=Student::find($stud_id);
        $student->delete();
        return redirect()->back()->with('status','Student Deleted Successfully');
    }
    
}
