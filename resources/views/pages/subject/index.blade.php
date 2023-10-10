@extends('layouts.app')

@section('title', 'Subject List')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Subjects</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Subject</a></div>
                    <div class="breadcrumb-item">All Subject</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Users</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('subject.create') }}" class="btn btn-primary">Tambah Mata Kuliah</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET", action="{{ route('subject.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        {{-- table for this $table->string('title');
                                $table->bigInteger('lecturer_id')->unsigned();
                                //semester
                                $table->string('semester');
                                //tahun akademik
                                $table->string('tahun_akademik');
                                //sks
                                $table->string('sks');
                                //kode matakuliah
                                $table->string('kode_matakuliah');
                                //description
                                $table->string('deskripsi'); --}}
                                        <tr>
                                            <th>Title</th>
                                            <th>Lecturer</th>
                                            <th>Semester</th>
                                            <th>Tahun Akademik</th>
                                            <th>SKS</th>
                                            <th>Kode Matakuliah</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>
                                                    {{ $subject->title }}
                                                </td>
                                                <td>
                                                    {{ $subject->lecturer->name }}
                                                </td>
                                                <td>
                                                    {{ $subject->semester }}
                                                </td>
                                                <td>
                                                    {{ $subject->tahun_akademik }}
                                                </td>
                                                <td>
                                                    {{ $subject->sks }}
                                                </td>
                                                <td>
                                                    {{ $subject->kode_matakuliah }}
                                                </td>
                                                <td>
                                                    {{ $subject->deskripsi }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('subject.edit', $subject->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('subject.destroy', $subject->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $subjects->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
