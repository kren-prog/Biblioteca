@extends('layouts.app')
@section('content')

    <div class="page-content page-container py-4" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">

                <div class="col-lg-8 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Historial de prestamos</h4>

                            <div class="table-responsive">
                                <table id="dtBasicExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>Libro</th>
                                            <th>Estudiante</th>
                                            <th>Teléfono estudiante</th>
                                            <th>Fecha prestamo</th>
                                            <th></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loans as $loan)
                                            <tr>
                                                <td>{{ $loan->title }}</td>
                                                <td>{{ $loan->name }}</td>
                                                <td>{{ $loan->phone }}</td>
                                                <td>{{ $loan->created_at }}</td>
                                            

                                                <td>
                                                    @if ($loan->isActive)
                                                    <form action="{{ route('loans.update', ["loan"=>$loan->id]) }}" method="post">                 
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" class="form-control" name="id_book" id="cod_book" value="{{$loan->id_book}}" required>
                                                        <input type="hidden" class="form-control" name="isActive" id="isActive" value="0" required>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-sm btn-block">Devolver</button>
                
                                                        </div>
                                                    </form>
                                                    @else
                                                    <label class="badge bg-success">Entregado</label>
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
