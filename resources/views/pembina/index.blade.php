@extends('layouts.app')
@section('content')
<div class="container">
<h1>{{ __('Pembina') }}</h1>
<div class="row">
<div class="col-md-12">
<a class="btn btn-large btn-primary"
href="{{ url('/pembina/create') }}">Tambah Pembina</a>
</div>
</div>
<table class="table table-striped">
<thead>
<tr>
<th>&nbsp;</th><th>Pembina</th>
</tr>
</thead>
<tbody>
@forelse ($pembina as $fa)
<tr>
<td class="d-flex">
<a href="{{ url('/pembina/edit/'.$fa->id) }}"
class="btn btn-primary">
Edit
</a>
&nbsp;
<form action="{{ url('/pembina/destroy/'.$fa->id) }}"
method="POST">

@csrf

<button type="submit" class="btn btn-danger"
onclick="return confirm('Are you sure?')">
Delete
</button>
</form>
</td>
<td>{{ $fa->nama_pembina }}</td>
</tr>
@empty
<tr>
<td colspan="2">
<div class="alert alert-warning">
Tidak ada data!
</div>
</td>
</tr>
@endforelse
</tbody>
</table>
@if($pembina)
{{ $pembina->links() }}
@endif
</div>
@endsection