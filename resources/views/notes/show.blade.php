<!DOCTYPE html>
<html>
<head>
    <title>Detail Catatan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $note->title }}</h1>
        
        <p><strong>Kategori:</strong> {{ $note->category->name ?? 'Tidak Ada Kategori' }}</p> <!-- Menampilkan Kategori -->
        
        <div class="content">
            <p>{{ $note->content }}</p>
        </div>

        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Kembali ke Daftar Catatan</a>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
