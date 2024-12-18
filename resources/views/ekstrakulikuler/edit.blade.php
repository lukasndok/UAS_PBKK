@extends('layouts.app') 
@section('content') 
    <div class="container"> 
        <h1>{{ __('Ekstrakulikuler') }}</h1> 
        <form method="post" action="{{ url('/ekstrakulikuler/update/'.$ekstrakulikuler->id) }}"> 
            @csrf 
            <div class="row mb-3"> 
                <label for="nama_ekstrakulikuler" class="col-3 col-form-label">Ekstrakulikuler</label> 
                <div class="col-9"> 
                    <input type="text" class="form-control" id="nama_ekstrakulikuler" name="nama_ekstrakulikuler" 
                        value="{{ old('nama_ekstrakulikuler') ?? $ekstrakulikuler->nama_ekstrakulikuler}}" /> 
                </div> 
            </div> 
            <div class="row mb-3"> 
                <label for="pembina_id" class="col-3 col-form-label">Nama Pembina</label> 
                <div class="col-9"> 
                    <select class="form-select" name="pembina_id" id="pembina_id"> 
                        @foreach ($pembina as $fa)
                            <option value="{{ $fa->id }}">{{ $fa->nama_pembina }}</option> 
                        @endforeach 
                    </select> 
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