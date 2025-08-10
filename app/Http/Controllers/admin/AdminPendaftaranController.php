<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Twilio\Rest\Client;

class AdminPendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->perPage ?? 10;
        $keyword = $request->keyword;

        $query = Pendaftaran::query();

        if ($keyword) {
            $query->where('nama_lengkap', 'like', "%$keyword%")
                ->orWhere('nama_ayah', 'like', "%$keyword%");
        }

        $data = $query->paginate($perPage);

        return view('admin.kelola_pendaftaran.index', compact('data'));
    }


    public function konfirmasi(Request $request, $id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);

        if ($request->aksi == 'terima') {
            $pendaftar->status = 'diterima';
            $pesan = "Halo {$pendaftar->nama_lengkap}, pendaftaran Anda telah *DITERIMA*. Terima kasih.";
        } elseif ($request->aksi == 'tolak') {
            $pendaftar->status = 'ditolak';
            $pesan = "Halo {$pendaftar->nama_lengkap}, mohon maaf pendaftaran Anda *DITOLAK*. Silakan hubungi admin untuk info lebih lanjut.";
        } else {
            return redirect()->route('kelola_pendaftaran.index')->with('error', 'Aksi tidak valid.');
        }

        $pendaftar->save();

        // Kirim pesan WA otomatis
        try {
            $sid = config('services.twilio.sid');
            $token = config('services.twilio.token');
            $from = config('services.twilio.from');

            $client = new Client($sid, $token);

            $nomor = preg_replace('/[^0-9]/', '', $pendaftar->no_hp);
            if (substr($nomor, 0, 1) === '0') {
                $nomor = '62' . substr($nomor, 1);
            }
            $to = 'whatsapp:+' . $nomor;


            $client->messages->create($to, [
                'from' => $from,
                'body' => $pesan,
            ]);
        } catch (\Exception $e) {
            // Kalau gagal kirim WA, tetap update status tapi beri pesan error
            return redirect()->route('kelola_pendaftaran.index')->with('error', 'Status diperbarui, tapi gagal kirim pesan WhatsApp: ' . $e->getMessage());
        }

        return redirect()->route('kelola_pendaftaran.index')->with('success', 'Status berhasil diperbarui dan pesan WhatsApp terkirim.');
    }
    public function delete($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->delete();

        return redirect()->route('kelola_pendaftaran.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }

}
