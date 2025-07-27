<?php

namespace App\Http\Controllers\admin\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Agenda;

class CmsAgendaController extends Controller
{
    public function index(Request $request)
    {
        $agendas = Agenda::when($request->q, function ($query) use ($request) {
            $query->where('judul', 'like', '%' . $request->q . '%');
        })->latest()->get();

        return view('admin.cms.agenda.index', compact('agendas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('agenda', 'public');
        }

        Agenda::create($data);

        return redirect()->route('cms.agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($agenda->foto && Storage::disk('public')->exists($agenda->foto)) {
                Storage::disk('public')->delete($agenda->foto);
            }

            $data['foto'] = $request->file('foto')->store('agenda', 'public');
        }

        $agenda->update($data);

        return redirect()->route('cms.agenda.index')->with('success', 'Agenda berhasil diupdate.');
    }



    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('cms.agenda.index')->with('success', 'Agenda berhasil dihapus.');
    }
}
