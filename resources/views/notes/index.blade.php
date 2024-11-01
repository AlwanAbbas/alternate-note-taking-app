<!-- resources/views/notes/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Catatan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Catatan</h1>
        
        <!-- Formulir Pencarian -->
        <form action="{{ route('notes.index') }}" method="GET" class="form-inline mb-3">
            <input type="text" name="search" class="form-control mr-2" placeholder="Cari Catatan" value="{{ request('search') }}">
            <select name="filter" class="form-control mr-2">
                <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Semua</option>
                <option value="published" {{ request('filter') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ request('filter') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
            <button type="submit" class="btn btn-primary">Terapkan Filter</button>
        </form>
        
        <a href="{{ route('notes.create') }}" class="btn btn-success mb-3">Buat Catatan Baru</a>
        
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th> <!-- Kolom Status Ditambahkan -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                    <tr>
                        <td>
                            <a href="{{ route('notes.show', $note->id) }}">{{ $note->title }}</a>
                        </td>
                        <td>
                            <p>{{ $note->category->name ?? 'Tidak Ada Kategori' }}</p>
                        </td>
                        <td>
                            <p>{{ ucfirst($note->status) }}</p> <!-- Menampilkan Status -->
                        </td>
                        <td>
                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
