@extends('layouts.app')

@section('content')
<h4>Edit Resep</h4>
<form action="{{ route('resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('resep.form')
    <button class="btn btn-primary mt-2"><i class="bi bi-pencil"></i> Update</button>
</form>
@endsection
