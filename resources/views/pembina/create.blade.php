@extends('layouts.app')
@section('content')
<div class="container">
<h1>{{ __('Nama Pembina') }}</h1>
<form method="post" action="{{ url('/pembina/store') }}">
@csrf
<div class="row mb-3">
<label for="nama_pembina" class="col-3 col-form-label">Nama Pembina</label>
<div class="col-9">
<input type="text" class="form-control" id="nama_pembina"
name="nama_pembina" value="{{ old('nama_pembina') }}"/>
</div>
</div>
<div class="row">
<div class="col-md-12">

<button type="submit" class="btn btn-large btn-primary">
Simpan
</button>
</div>
</div>
</form>
</div>
@endsection