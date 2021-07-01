@extends('layouts.app')

@section('title')
    Edit Resep
@endsection

@section('content')
    <div class="container">
        <form action="/resep/edit/{{ $resep->id }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <h1>Edit Resep</h1>
                    </div>
                    @if(session()->get('dupe'))
                    <div class="alert alert-danger">
                        <strong>
                        {{ session()->get('dupe') }}  
                        </strong>
                    </div>
                    @endif
                    <div class="form row">
                        <label for="name" class="col-md-4 col-form-label">Nama Resep</label>

                        <input id="name"
                            type="text"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name"
                            value="{{ $resep->name }}"
                            autocomplete="name" autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form row">

                        <label for="description" class="col-md-4 col-form-label">Deskripsi</label>

                        <input id="description"
                            type="text"
                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                            name="description"
                            value="{{ $resep->description }}"
                            autocomplete="description" autofocus>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form row">

                        <label for="jenis" class="col-md-4 col-form-label">Jenis</label>

                        <input id="jenis"
                            type="text"
                            class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}"
                            name="jenis"
                            value="{{ $resep->jenis }}"
                            autocomplete="jenis" autofocus>

                        @if ($errors->has('jenis'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('jenis') }}</strong>
                            </span>
                        @endif
                    </div>

                    <table class="table my-2">
                        <thead>
                            <tr>
                                <th scope="col" class="col-6">Bahan Baku</th>
                                <th scope="col" class="col-4">Jumlah</th>
                                <th scope="col" class="col-2"></th>
                            </tr>
                        </thead>
                        <tbody id="bahanList">
                        <!--------------------------->
                        @foreach( $br as $bahan)
                            <tr class="listItem">
                                <td>
                                    <select  name="bahanbaku[]" class="form-control">
                                        <option value="{{ $bahan->id_bahanbaku}}">{{ $bahan->name }}</option>
                                        @foreach($bahanbaku as $b)
                                            <option value="{{$b->id}}">{{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input name="jumlah[]" type="number" class="form-control" value="{{ $bahan->jumlah }}">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="deleteRow(this)">
                                    <i class="fas fa-trash"></i>
                                     Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <!--------------------------->
                        </tbody>
                    </table>        
                    
                    <button type="button" id="addMore" class="btn btn-success" onclick="add()">
                        <i class="fas fa-plus"></i>
                         Tambah Bahan Baku
                    </button>

                    @if ($errors->has('bahanbaku.*'))
                        <div class="alert alert-danger my-2">
                            Bahan baku tidak boleh kosong
                        </div>
                    @elseif($errors->has('jumlah.*'))
                        <div class="alert alert-danger">
                            Jumlah tidak boleh 0
                        </div>
                    @endif

                    <div class="row pt-4">
                        <button class="btn btn-primary">Simpan Resep</button>
                        <a 
                        class="btn btn-danger mx-2" 
                        href="{{ route('resep.show', ['id' => $resep->id]) }}">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('head')
 <script type="text/javascript">
    function add(){
        var htmlString = `
        <tr class="listItem">
            <td>
                <select  name="bahanbaku[]" class="form-control">
                    <option value="">Pilih bahan baku</option>
                    @foreach($bahanbaku as $b)
                        <option value="{{$b->id}}">{{ $b->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input name="jumlah[]" type="number" class="form-control" value="0">
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="deleteRow(this)">
                <i class="fas fa-trash"></i>
                 Hapus
                </button>
            </td>
        </tr>
        `;
        $("#bahanList").append(htmlString);
    }

    function deleteRow(el){
        el.closest('.listItem').remove();
    }

 </script>
@endpush
