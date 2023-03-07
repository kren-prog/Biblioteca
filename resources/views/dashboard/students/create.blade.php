@extends('layouts.app')
@section('content')
<form action="{{ route('students.store') }}" method="post">
    @include('dashboard.students._form')
</form>
@endsection