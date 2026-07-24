<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatakuliahRequest;
use App\Http\Requests\UpdateMatakuliahRequest;
use App\Models\Matakuliah;
use App\Services\MatakuliahService;

class MatakuliahController extends Controller
{
    public function __construct(
        protected MatakuliahService $matakuliahService,
    ) {}

    public function index()
    {
        $matakuliah = $this->matakuliahService->semua();

        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(StoreMatakuliahRequest $request)
    {
        $this->matakuliahService->buat($request->validated());

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data matakuliah baru berhasil ditambahkan.');
    }

    public function show(Matakuliah $matakuliah)
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(UpdateMatakuliahRequest $request, Matakuliah $matakuliah)
    {
        $this->matakuliahService->perbarui($matakuliah, $request->validated());

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data matakuliah berhasil diperbarui.');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $this->matakuliahService->hapus($matakuliah);

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data matakuliah berhasil dihapus.');
    }
}
