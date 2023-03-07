<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::get();
        return view ('dashboard.books.index',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.books.create',['book'=>new Book()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        try{
            $book = Book::create($request->validated());
           }catch(\Illuminate\Database\QueryException $ex){
               echo 'Excepción capturada: ',  $ex->getMessage(), "\n";
               return back()->with('status', 'No se puede registrar el libro, por favor revise los datos ingresados');
           }
           return redirect()->route('books.index')->with('status','Libro creado');
    }
    /**
     * Muestra la vista para seleccionar el estudiante al que se le asigna el prestamo.
     */
    public function select_student($id_book){
        $students = Student::get();
        return view('dashboard.students.index',['id_book'=>$id_book, 'students'=>$students]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $estado = $book->availability;
        $book->availability = !$estado;
        $book->save();
        return redirect()->route('loans.index')->with('status','Prestamo modificado');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
