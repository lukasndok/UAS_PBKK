@extends('layouts.app')
@section('content')
<div class="container">
<h1>{{ __('Murid') }}</h1>
@if($pendaftaran)
<div class="row mb-3">
<div class="col-3">Nama Lengkap</div>
<div class="col-9">{{ $pendaftaran->nama_lengkap }}</div>
</div>
<div class="row mb-3">
<div class="col-3">Alamat</div>
<div class="col-9">{{ $pendaftaran->alamat }}</div>

</div>
<div class="row mb-3">
<div class="col-3">Kota</div>
<div class="col-9">{{ $pendaftaran->kota }}</div>
</div>
<div class="row mb-3">
<div class="col-3">Tgl Lahir</div>
<div class="col-9">
{{ Carbon\Carbon::parse($pendaftaran->tanggal_lahir)
->format('Y-m-d') }}
</div>
</div>
<div class="row mb-3">
<div class="col-3">Kelas</div>
<div class="col-9">{{ $pendaftaran->Kelas }}</div>
</div>
<div class="row mb-3">
<div class="col-3">Ekstrakulikuler</div>
<div class="col-9">
{{ $pendaftaran->ekstrakulikuler->pembina->nama_pembina }} -
{{ $pendaftaran->ekstrakulikuler->nama_ekstrakulikuler }}
</div>
</div>
<div class="row mb-3">
<div class="col-3">Status</div>
<div class="col-9">
{{ $pendaftaran->status }} Pendaftaran
{{ Carbon\Carbon::parse($pendaftaran->tanggal_pendaftaran)->format('Y-m-d') }}
</div>
</div>
@else
<div class="row">
<div class="col-12 text-center">
<a href="{{ url('/pendaftaran/create') }}" class="btn btn-primary">
Lakukan pendaftaran
</a>
</div>

</div>
@endif
</div>
@endsection