<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = (Loan::select("loans.id","loans.isActive", "loans.created_at", "students.name","students.phone", "books.title", "books.id AS id_book")->join("students", "students.id","loans.id_student")
        ->join("books", "books.id","loans.id_book")->orderby("created_at","DESC")->get());

        return view ('dashboard.loans.index',['loans'=>$loans]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {  
        try{
            $loan = Loan::create($request->validated());
           }catch(\Illuminate\Database\QueryException $ex){
               echo 'Excepción capturada: ',  $ex->getMessage(), "\n";
               return back()->with('status', 'No se puede registrar el libro, por favor revise los datos ingresados');
           }
        return redirect()->route('books.edit',['book'=>$request->id_book]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $loan->isActive = false;
        $loan->save();
        return redirect()->route('books.edit',['book'=>$request->id_book]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
