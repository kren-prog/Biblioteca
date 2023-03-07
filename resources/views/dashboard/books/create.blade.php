@extends('layouts.app')
@section('content')
<form action="{{ route('books.store') }}" method="post">
    @include('dashboard.books._form')
</form>
@endsection