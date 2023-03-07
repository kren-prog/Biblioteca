@extends('layouts.app')
@section('content')
   
    <link rel="stylesheet" href="{{ asset('css/books.css') }}">

    <div class="row height d-flex justify-content-center align-items-center mt-4">

        <div class="col-md-6">
            <div class="form-search">

                <input type="text" class="form-control form-input" placeholder="Buscar ... " id="myInput">
            </div>

            @if (session('status'))
            @endif

            @if (Auth::guest())
            @else
                @if (auth()->user()->rol == 'admin')
                    <a href="{{ route('books.create') }}" class="mt-4 btn btn-success btn-lg mb-3">
                        <i class="bi bi-plus-circle"></i> Añadir libro
                    </a>
                @endif
            @endif
        </div>


    </div>


    <div class="container d-flex justify-content-center">


        @if (sizeof($books) == 0)
            <h1>Todavia no se registran libros</h1>
        @endif
    
        <div class="row">
            @foreach ($books as $book)
                <div class="col" data-role="recipe">
                    <div class="card p-2 my-4">
                        <img src="{{ asset('images/book' . $book->id . '.jpg') }}" height="500">
                        <div class="text-white">
                            <p>{{ $book->title }}</p>
                        </div>
                        <div class="text-muted">
                            <p>Author: {{ $book->author }} <br> {{ $book->year }}</p>
                        </div>

                        @if (Auth::guest() && $book->availability)
                            <button type="button" class="btn btn-info mt-4 btn-lg mb-3"><span>Disponible</span></button>
                        @else
                            @if (auth()->user()->rol == 'admin' && $book->availability)
                                <a href="{{ route('books.select_student', ['id_book' => $book->id]) }}" class="mt-4 btn btn-primary btn-lg mb-3">
                                     Prestar
                                </a>
                            @else
                                <button type="button" class="btn btn-secondary mt-4 btn-lg mb-3"><span>No
                                        disponible</span></button>
                            @endif
                        @endif

                    </div>

                </div>
            @endforeach
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $('div[data-role="recipe"]').filter(function() {
                    $(this).toggle($(this).find('p').text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
