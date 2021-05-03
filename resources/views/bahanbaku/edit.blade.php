@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/bahanbaku/edit/{{ $bahanbaku->id }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <h1>Edit Bahan Baku</h1>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Bahan Baku</label>

                        <input id="name"
                            type="text"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name"
                            value="{{ $bahanbaku->name }}"
                            autocomplete="name" autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        <label for="description" class="col-md-4 col-form-label">Deskripsi</label>

                        <input id="description"
                            type="text"
                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                            name="description"
                            value="{{ $bahanbaku->description }}"
                            autocomplete="description" autofocus>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif

                        <label for="jenis" class="col-md-4 col-form-label">Jenis</label>

                        <input id="jenis"
                            type="text"
                            class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}"
                            name="jenis"
                            value="{{ $bahanbaku->jenis }}"
                            autocomplete="jenis" autofocus>

                        @if ($errors->has('jenis'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('jenis') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Simpan Bahan Baku</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection