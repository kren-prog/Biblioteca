<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderby("created_at","DESC")->get();
        return view ('dashboard.students.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.students.create',['student'=>new Student()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        try{
            $student = Student::create($request->validated());
           }catch(\Illuminate\Database\QueryException $ex){
               echo 'Excepción capturada: ',  $ex->getMessage(), "\n";
               return back()->with('status', 'No se puede registrar el libro, por favor revise los datos ingresados');
           }
           return redirect()->route('students.index')->with('status','Estudiante creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $loans = (Student::select("loans.id","loans.isActive", "loans.created_at", "students.name","students.phone", "books.title", "books.id AS id_book")
        ->join("loans", "students.id","loans.id_student")
        ->join("books", "books.id","loans.id_book")
        ->where("loans.id_student", $student->id)
        ->orderby("created_at","DESC")->get());

        return view ('dashboard.loans.index',['loans'=>$loans]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
