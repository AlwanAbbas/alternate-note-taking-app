<!DOCTYPE html>
<html>
<head>
    <title>Edit Catatan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Catatan</h1>
        
        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $note->title }}" required>
            </div>
            
            <div class="form-group">
                <label for="content">Isi:</label>
                <textarea id="content" name="content" class="form-control" rows="5" required>{{ $note->content }}</textarea>
            </div>

            <!-- Dropdown Kategori -->
            <div class="form-group">
                <label for="category">Kategori:</label>
                <select name="category_id" id="category" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $note->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Dropdown Status -->
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="draft" {{ $note->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $note->status == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('notes.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
