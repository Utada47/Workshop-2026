<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Models\Dosen;
use App\Services\DosenService;

class DosenController extends Controller
{
    public function __construct(
        protected DosenService $dosenService,
    ) {}

    public function index()
    {
        $dosen = $this->dosenService->semua();

        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(StoreDosenRequest $request)
    {
        $this->dosenService->buat($request->validated());

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen baru berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $this->dosenService->perbarui($dosen, $request->validated());

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $this->dosenService->hapus($dosen);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}
