@extends('layouts.app')
@section('content')
<style>
.tile-title{
font-weight:bold;
}
.tile-number{
text-align: end;
}
.tile-number p {
font-size: 48px;
}
</style>

<div class="container">
<h1>{{ __('Sekolah') }}</h1>
<form>
<div class="row mb-3">
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
<button class="btn btn-primary">Cari</button>
</div>
</div>
</form>
<div class="row mb-3">
<div class="col-3">
<div class="card">
<div class="card-body">
<p class="card-title tile-title">TOTAL</p>
<p class="card-subtitle text-body-secondary">Semua pendaftaran</p>
<div class="card-text tile-number">
<p>{{ $all }}</p>
</div>
</div>
<div class="card-footer text-body-secondary">
&nbsp;
</div>
</div>
</div>
<div class="col-3">
<div class="card">
<div class="card-body">
<p class="card-title tile-title">DAFTAR</p>
<p class="card-subtitle text-body-secondary">Belum direspon</p>
<div class="card-text tile-number">
<p>{{ $daftar }}</p>
</div>
</div>
<div class="card-footer text-body-secondary"
style="display:flex;justify-content:space-between">
<a href="{{ url('/pendaftaran') }}" class="card-link">Respon</a>
<span>{{ $all > 0 ? number_format(($daftar*100/$all),0).'%' : '0%' }}</span>
</div>
</div>
</div>
<div class="col-3">
<div class="card">
<div class="card-body">
<p class="card-title tile-title">TERIMA</p>
<p class="card-subtitle text-body-secondary">
Pendaftar diterima
</p>
<div class="card-text tile-number">
<p>{{ $terima }}</p>
</div>
</div>
<div class="card-footer text-body-secondary text-end">
<span>{{ $all > 0 ? number_format(($daftar*100/$all),0).'%' : '0%' }}</span>
</div>
</div>
</div>
<div class="col-3">
<div class="card">
<div class="card-body">
<p class="card-title tile-title">TOLAK</p>
<p class="card-subtitle text-body-secondary">Pendaftar ditolak</p>
<div class="card-text tile-number">
<p>{{ $tolak }}</p>
</div>
</div>
<div class="card-footer text-body-secondary text-end">
<span>{{ $all > 0 ? number_format(($daftar*100/$all),0).'%' : '0%' }}</span>
</div>
</div>
</div>
</div>
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