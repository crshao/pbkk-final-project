@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/resep/tambah" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8">
                <!--
                @if(old('bahanbaku'))
                {{count(old('bahanbaku'))}}
                @endif
                @if(old('bahanbaku'))
                    @for( $i =0; $i < count(old('bahanbaku')); $i++)                            
                    {{ old('bahanbaku.'.$i)}}                                     
                    @endfor
                @endif
                -->
                    <div class="row">
                        <h1>Tambah Resep</h1>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Resep</label>

                        <input id="name"
                            type="text"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name"
                            value="{{ old('name') }}"
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
                            value="{{ old('description') }}"
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
                            value="{{ old('jenis') }}"
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

                        <!-- Jika ada error -->
                        @if(old('bahanbaku'))
                            @for( $i =0; $i < count(old('bahanbaku')); $i++)  

                            <tr class="listItem">
                                <td>
                                    <select name="bahanbaku[]" class="form-control">
                                        <option value="">Pilih Bahan baku</option>
                                        @foreach($bahanbaku as $b)
                                            @if( old('bahanbaku.'.$i) == $b->id)
                                            <option value="{{$b->id}}" selected>{{ $b->name }}</option>
                                            @else
                                            <option value="{{$b->id}}">{{ $b->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input name="jumlah[]" type="number" class="form-control" value="{{ old('jumlah.'.$i)}}">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="deleteRow(this)">
                                    <i class="fas fa-trash"></i>
                                     Hapus
                                    </button>
                                </td>
                            </tr>                                 
                            @endfor
                        @else

                        <!--------------------------->
                            <tr class="listItem">
                                <td>
                                    <select  name="bahanbaku[]" class="form-control">
                                        <option value="">Pilih Bahan baku</option>
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
                        <!--------------------------->
                        @endif

                        </tbody>
                    </table>    
                        
                    <button type="button" id="addMore" class="btn btn-success" onclick="add()">
                        <i class="fas fa-plus"></i>
                         Tambah Bahan Baku
                    </button>

                    <!-- error handling -->
                    @if ($errors->has('bahanbaku.*'))
                        <div class="alert alert-danger my-2">
                            Bahan baku tidak boleh kosong
                        </div>
                    @elseif($errors->has('jumlah.*'))
                        <div class="alert alert-danger my-2">
                            Jumlah tidak boleh 0
                        </div>
                    @endif

                    <div class="row">
                        <label for="gambar" class="col-md-4 col-form-label">Unggah Gambar</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="file" class="form-control-file" id="gambar" name="gambar">
                        </div>
                        <div class="col-4">
                           <span>Max 2MB</span>
                        </div>

                        @if ($errors->has('gambar'))
                            <strong>{{ $errors->first('gambar') }}</strong>
                        @endif
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Tambahkan Resep</button>
                        <a 
                        class="btn btn-danger mx-2" 
                        href="{{ route('resep.index') }}">Kembali</a>
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
                    <option>Pilih bahan baku</option>
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
