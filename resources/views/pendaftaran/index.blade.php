@extends('layouts.app') 
@section('content') 
<div class="container"> 
<h1>{{ __('Pendaftaran') }}</h1> 
<form> 
<div class="row"> 
<div class="col-auto"> 
<input type="text" class="form-control" id="tanggal_awal"  
name="tanggal_awal" value="{{ $tanggal_awal }}"/> 
</div>         
<div class="col-auto"> 
<label for="tanggal_akhir" class="col-form-label">s/d</label> 
</div>         
<div class="col-auto"> 
<input type="text" class="form-control" id="tanggal_akhir"  
name="tanggal_akhir" value="{{ $tanggal_akhir }}"/> 
</div>         
<div class="col-auto"> 
<select name="status" id="status" class="form-select"> 
<option @selected($status=='SEMUA') 
value="SEMUA">SEMUA</option> 
<option @selected($status=='DAFTAR') 
value="DAFTAR">DAFTAR</option> 
<option @selected($status=='TERIMA') 
value="TERIMA">DITERIMA</option> 
<option @selected($status=='TOLAK') 
value="TOLAK">TIDAK DITERIMA</option> 
</select> 
</div>         
<div class="col-auto"> 
<button class="btn btn-primary">Cari</button> 
</div> 
</div> 
</form> 
<table class="table table-striped"> 
<thead> 
<tr> 
<th>&nbsp;</th> 
<th>ID</th> 
<th>Nama</th> 
<th>Pendaftaran</th> 
<th>Data Diri</th> 
<th>Status</th> 
</tr> 
</thead> 
<tbody> 
@forelse ($pendaftarans as $pendaftaran) 
<tr> 
<td class="text-center"> 
@if($pendaftaran->status=='DAFTAR') 
<form action="{{ url('/pendaftaran/terima',  
$pendaftaran->id) }}" method="POST" style="display:inline"> 
@csrf 
<button type="submit" class="btn btn-primary" 
onclick="return  
confirm('Yakin akan TERIMA camaba? Proses ini tidak bisa dibatalkan.')"> 
TERIMA 
</button> 
</form> 
<form action="{{ url('/pendaftaran/tolak',  
$pendaftaran->id) }}" method="POST" style="display:inline"> 
@csrf 
<button type="submit" class="btn btn-danger" 
onclick="return  
confirm('Yakin akan TOLAK camaba? Proses ini tidak bisa dibatalkan.')"> 
TOLAK 
</button> 
</form> 
@endif 
</td> 
<td>{{ $pendaftaran->id }}</td> 
<td>{{ $pendaftaran->nama_lengkap }}</td> 
<td>{{ $pendaftaran->ekstrakulikuler->pembina->nama_pembina 
.'-'.$pendaftaran->ekstrakulikuler->nama_ekstrakulikuler }}<br/> 
Pada  
{{ \Carbon\Carbon::parse( 
$pendaftaran->tanggal_pendaftaran) ->format('Y-m-d') }}</td> 
</td> 
<td>{{ $pendaftaran->alamat }}<br/> 
{{ $pendaftaran->kota }}<br/> 
{{ $pendaftaran->asal_sekolah }} 
</td> 
<td class="text-center"> 
{{ $pendaftaran->status }}</td> 
</tr> 
@empty 
<tr> 
<td colspan="6"> 
<div class="alert alert-warning"> 
Tidak ada data! 
</div> 
</td> 
</tr> 
@endforelse 
</tbody> 
</table> 
@if($pendaftarans) 
{{ $pendaftarans->links() }} 
@endif 
</div> 
<link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> 
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 
<script> 
(function() { 
flatpickr('#tanggal_awal', {}); 
flatpickr('#tanggal_akhir', {}); 
})(); 
</script> 
@endsection 