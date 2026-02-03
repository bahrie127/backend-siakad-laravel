@extends('layouts.app')

@section('title', 'Dashboard SIAKAD')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard SIAKAD</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Overview</div>
                </div>
            </div>

            {{-- Statistics Cards --}}
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Mahasiswa</h4>
                            </div>
                            <div class="card-body">
                                {{ number_format($totalMahasiswa ?? 0) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Dosen</h4>
                            </div>
                            <div class="card-body">
                                {{ number_format($totalDosen ?? 0) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Mata Kuliah</h4>
                            </div>
                            <div class="card-body">
                                {{ number_format($totalMataKuliah ?? 0) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Jadwal</h4>
                            </div>
                            <div class="card-body">
                                {{ number_format($totalJadwal ?? 0) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Today's Schedule & Recent Subjects --}}
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-clock mr-2"></i>Jadwal Hari Ini ({{ $hariIni ?? 'Senin' }})</h4>
                            <div class="card-header-action">
                                <a href="{{ route('schedule.index') }}" class="btn btn-primary">Lihat Semua</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Mata Kuliah</th>
                                            <th>Jam</th>
                                            <th>Ruangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jadwalHariIni ?? [] as $jadwal)
                                            <tr>
                                                <td>
                                                    <strong>{{ $jadwal->subject->title ?? '-' }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $jadwal->subject->code ?? '' }}</small>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light">
                                                        {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                                    </span>
                                                </td>
                                                <td>{{ $jadwal->ruangan }}</td>
                                                <td>
                                                    <a href="{{ route('generate-qrcode', $jadwal->id) }}"
                                                       class="btn btn-sm btn-info"
                                                       data-toggle="tooltip"
                                                       title="Generate QR Absensi">
                                                        <i class="fas fa-qrcode"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-4">
                                                    <i class="fas fa-calendar-times fa-2x mb-2"></i>
                                                    <p class="mb-0">Tidak ada jadwal hari ini</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-book-open mr-2"></i>Mata Kuliah Terbaru</h4>
                            <div class="card-header-action">
                                <a href="{{ route('subject.index') }}" class="btn btn-primary">Lihat Semua</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Dosen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mataKuliahTerbaru ?? [] as $matkul)
                                            <tr>
                                                <td><code>{{ $matkul->code }}</code></td>
                                                <td>{{ $matkul->title }}</td>
                                                <td>
                                                    <span class="badge badge-primary">{{ $matkul->sks }} SKS</span>
                                                </td>
                                                <td>{{ $matkul->lecturer->name ?? '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-4">
                                                    <i class="fas fa-book fa-2x mb-2"></i>
                                                    <p class="mb-0">Belum ada mata kuliah</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Students & Quick Links --}}
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-users mr-2"></i>Mahasiswa Terbaru</h4>
                            <div class="card-header-action">
                                <a href="{{ route('user.index') }}" class="btn btn-primary">Lihat Semua</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. Telepon</th>
                                            <th>Terdaftar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mahasiswaTerbaru ?? [] as $mhs)
                                            <tr>
                                                <td>
                                                    <img alt="avatar" src="{{ asset('img/avatar/avatar-1.png') }}"
                                                         class="rounded-circle mr-2" width="35">
                                                    {{ $mhs->name }}
                                                </td>
                                                <td>{{ $mhs->email }}</td>
                                                <td>{{ $mhs->phone ?? '-' }}</td>
                                                <td>
                                                    <span class="text-muted">
                                                        {{ $mhs->created_at->diffForHumans() }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-4">
                                                    <i class="fas fa-user-graduate fa-2x mb-2"></i>
                                                    <p class="mb-0">Belum ada mahasiswa terdaftar</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-link mr-2"></i>Menu Cepat</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <a href="{{ route('user.index') }}" class="btn btn-outline-primary btn-block py-3">
                                        <i class="fas fa-users fa-2x mb-2 d-block"></i>
                                        Users
                                    </a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ route('subject.index') }}" class="btn btn-outline-warning btn-block py-3">
                                        <i class="fas fa-book fa-2x mb-2 d-block"></i>
                                        Mata Kuliah
                                    </a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ route('schedule.index') }}" class="btn btn-outline-success btn-block py-3">
                                        <i class="fas fa-calendar fa-2x mb-2 d-block"></i>
                                        Jadwal
                                    </a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ route('user.create') }}" class="btn btn-outline-info btn-block py-3">
                                        <i class="fas fa-user-plus fa-2x mb-2 d-block"></i>
                                        Tambah User
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Info Card --}}
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="text-white"><i class="fas fa-info-circle mr-2"></i>Selamat Datang!</h5>
                            <p class="mb-0">
                                Sistem Informasi Akademik (SIAKAD) untuk mengelola data mahasiswa,
                                dosen, mata kuliah, dan jadwal perkuliahan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush
