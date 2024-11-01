<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Catatan - Alternate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Buat Catatan Baru</h1>

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <label for="title">Judul:</label>
                    </td>
                    <td>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="content">Isi:</label>
                    </td>
                    <td>
                        <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="category">Kategori:</label>
                    </td>
                    <td>
                        <select name="category_id" id="category" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
