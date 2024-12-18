@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ __('Ekstrakulikuler') }}</h1>
        <div class="row">
        <div class="col-md-12">
            <a class="btn btn-large btn-primary"
                href="{{ url('/ekstrakulikuler/create') }}">Tambah Ekstrakulikuler</a>
    </div>
</div>
<table class="table table-striped">
<thead>
<tr>
    <th>&nbsp;</th><th>Nama Ekstrakulikuler</th><th>Nama Pembina</th>
</tr>
</thead>
<tbody>
    @forelse ($ekstrakulikulers as $ekstrakulikuler)
<tr>
    <td class="d-flex"> 
        <a href="{{ url('/ekstrakulikuler/edit/'.$ekstrakulikuler->id) }}" 
            class="btn btn-primary"> 
            Edit 
</a> 
&nbsp;
<form action="{{ url('/ekstrakulikuler/destroy/'.$ekstrakulikuler->id) }}"
    method="POST">
@csrf
<button type="submit" class="btn btn-danger"
onclick="return confirm('Are you sure?')">
Delete
</button>
</form>
</td>
    <td>{{ $ekstrakulikuler->nama_ekstrakulikuler }}</td>
    <td>{{ $ekstrakulikuler->pembina->nama_pembina }}</td>
</tr>
@empty
<tr>
    <td colspan="3">
        <div class="alert alert-warning">
            Tidak ada data!
        </div>
    </td>
</tr>
@endforelse
</tbody>
</table>
@if($ekstrakulikulers)
{{ $ekstrakulikulers->links() }}
@endif
</div>

@endsection