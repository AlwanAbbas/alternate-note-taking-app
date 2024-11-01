<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Models\Category;


class NoteController extends Controller
{
    // Menampilkan daftar catatan
    public function index(Request $request)
    {
        $query = Note::query();

        if ($request->has('filter')) {
            if ($request->filter == 'published') {
                $query->where('status', 'published');
            } elseif ($request->filter == 'draft') {
                $query->where('status', 'draft');
            }
        }

        $notes = $query->get();
        return view('notes.index', compact('notes'));
    }

    // Menampilkan form untuk membuat catatan baru
    public function create()
    {
        $categories = Category::all(); // Mengambil semua kategoris
        return view('notes.create', compact('categories')); // Pastikan kategori diteruskan ke view

    }

    // Menyimpan catatan baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id', // Pastikan kategori ada
            'status' => 'required|in:draft,published',
        ]);

        Note::create($request->all()); // Menyimpan catatan baru
        return redirect()->route('notes.index')->with('success', 'Catatan berhasil dibuat');
    }

    // Menampilkan detail catatan
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    // Menampilkan form untuk mengedit catatan
    public function edit(Note $note)
    {
        $categories = Category::all(); // Mengambil semua kategori
        return view('notes.edit', compact('note', 'categories')); // Pastikan kategori diteruskan ke view
    }
    

    // Memperbarui catatan yang diedit
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id', // Pastikan category_id valid
            'status' => 'required|in:draft,published' // Validasi status
        ]);

        $note->fill($request->all()); // Mengisi data dari request
        $note->save(); // Simpan perubahan

        return redirect()->route('notes.index')->with('success', 'Catatan berhasil diperbarui');
    }

    // Menghapus catatan
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Catatan berhasil dihapus');
    }
}
