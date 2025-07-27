<!-- Sidebar Pengelola -->
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-success" style="width: 250px; height: 100vh;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-primary' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('kelola_pendaftaran.index') }}" class="nav-link text-white {{ request()->routeIs('kelola_pendaftaran.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-folder2-open me-2"></i> Management Pendaftaran
            </a>
        </li>
        <li>
            <a href="{{ route('management_siswa.index') }}" class="nav-link text-white {{ request()->routeIs('management_siswa.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-people-fill me-2"></i> Management Siswa
            </a>
        </li>
        <li>
            <a href="{{ route('management_guru.index') }}" class="nav-link text-white {{ request()->routeIs('management_guru.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-person-badge-fill me-2"></i> Management Guru
            </a>
        </li>
        <li>
            <a href="{{ route('management_kelas_jadwal.index') }}" class="nav-link text-white {{ request()->routeIs('management_kelas_jadwal.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-calendar2-week-fill me-2"></i> Management Kelas & Jadwal
            </a>
        </li>
        <li>
            <a href="{{ route('cms.layouts') }}" class="nav-link text-white {{ request()->routeIs('cms.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-journal-text me-2"></i> Management Konten
            </a>
        </li>
    </ul>




    <hr>
    <div>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="btn btn-danger w-100">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
