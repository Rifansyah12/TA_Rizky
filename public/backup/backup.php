  {{-- Tabel konten --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th style="width: 160px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($konten as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['judul'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['penulis'] }}</td>
                        <td>{{ $item['tanggal'] }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada konten yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tombol tambah konten --}}
    <a href="#" class="btn btn-success mt-3">
        <i class="bi bi-plus-circle me-1"></i> Tambah Konten
    </a>
</div>