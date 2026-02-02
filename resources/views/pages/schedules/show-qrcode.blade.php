@extends('layouts.app')

@section('title', 'Absensi Mata Kuliah')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Absensi Mata Kuliah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Absensi Mata Kuliah</a></div>
                    <div class="breadcrumb-item">Show QRCode</div>
                </div>
            </div>

            <div class="section-body">


                <div class="visible-print text-center">
                    @php
                        $options = new \chillerlan\QRCode\QROptions([
                            'outputType' => \chillerlan\QRCode\QRCode::OUTPUT_MARKUP_SVG,
                            'eccLevel' => \chillerlan\QRCode\Common\EccLevel::L,
                            'svgViewBoxSize' => 200,
                        ]);
                        $qrcode = (new \chillerlan\QRCode\QRCode($options))->render($code);
                    @endphp
                    <img src="{{ $qrcode }}" alt="QR Code" width="200" height="200">
                    <p>Scan me to absen</p>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
