<html>
    <head>
        <title>Tambah Resep</title>
    </head>
    <body>
        <form method="POST" action="/resep/tambah">
            @csrf
            <label for="name">nama</label>
            <input type="text" name="name"/> 
            <label for="description">deskripsi</label>
            <input type="text" name="description"/> 
            <label for="jenis">jenis</label>
            <input type="text" name="jenis"/> 
            <button class="btn btn-primary">Tambahkan Bahan Baku</button>
        </form>
    </body>
</html>