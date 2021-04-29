<html>
    <head>
        <title>Resep</title>
    </head>
    <body>
        <div class="col-sm-12">  @if(session()->get('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}  
            </div>
          @endif
        </div>
        <a href="/resep/tambah">tambah resep</a>
        <table>
            <tr>
                <td>nama</td>
                <td>desk</td>
                <td>jenis</td>
            </tr>
            @foreach($reseps as $resep)
            <tr>
                <td>{{ $resep->name }}</td>
                <td>{{ $resep->description }}</td>
                <td>{{ $resep->jenis }}</td>
                <td> <a href="#">edit</a></td>
                <td> <a href="/resep/hapus/{{$resep->id}}">delete</a></td>
            </tr>
            @endforeach
        </table>
    </body>
    
</html>