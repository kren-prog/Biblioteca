@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/background.css') }}">

    <div class="page-content page-container py-4" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">

                <div class="col-lg-12 grid-margin stretch-card">

                    @if (session('status'))
                    @endif

                    @if (Auth::guest())
                    @else
                        @if (auth()->user()->rol == 'admin')
                            <a href="{{ route('students.create') }}" class="mt-4 btn btn-success mb-3">
                                <i class="bi bi-plus-circle"></i> Añadir estudiante
                            </a>
                        @endif
                    @endif

                    @if (isset($id_book))
                    <h1> <span class="badge bg-secondary">Por favor seleccione un estudiante para hacer el prestamo</span></h1>
                    
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Estudiantes</h4>

                            <div class="table-responsive">
                                <table id="dtBasicExample" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Carrera</th>
                                            <th>Semestre</th>
                                            <th>Teléfono</th>
                                            <th>Status</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->code }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->career }}</td>
                                                <td>{{ $student->semester }}</td>
                                                <td>{{ $student->phone }}</td>

                                                <td><a href="{{ route('students.show', ['student' => $student->id]) }}" class="mt-4 btn btn-primary btn-sm mb-3">
                                                    Consultar prestamos
                                               </a></td>

                                                <td>
                                                    @if (isset($id_book))
                                                    
                                                    <form action="{{ route('loans.store') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" class="form-control" name="id_book" id="cod_book" value="{{$id_book}}" required>
                                                        <input type="hidden" class="form-control" name="id_student" id="cod_student" value="{{$student->id}}" required>
                                                        <input type="hidden" class="form-control" name="isActive" id="isActive" value="1" required>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-danger btn-sm btn-block">Seleccionar</button>
                
                                                        </div>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- bootstrap5 dataTables js cdn -->
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dtBasicExample').DataTable();
        });
    </script>
@endsection
