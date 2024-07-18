@extends('layouts.app')
@section('custom-css')
@endsection
@section('content')
    <section>
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid mx-9" id="kt_content">
            <!--begin::Toolbar-->
            <div class="toolbar" id="kt_toolbar">
                <!--begin::Container-->
                <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                    <!--begin::Page title-->
                    <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                        class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                        <!--begin::Title-->
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Absensi Karyawan</h1>
                        <!--end::Title-->
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-300 border-start mx-4"></span>
                        <!--end::Separator-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.index') }}" class="text-muted text-hover-primary">Dashboard</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Manajemen Jadwal Karyawan</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-dark">Absensi</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Toolbar-->
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Absensi</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-sm-12">
                                @if(!collect($allDates)->contains('date', $formatNow))
                                    <h4 class="text-center">Tidak ada jadwal kerja hari ini</h4>
                                @else
                                    @foreach ($allDates as $ad)
                                        @if ($ad['date'] === $formatNow)
                                            <h4 class="text-center">{{ $ad['date'] }}</h4>
                                            <h4 class="text-center">Jam Kerja : {{ $ad['jam_masuk'] }} - {{ $ad['jam_pulang'] }}</h4>
                                            <input type="hidden" name="jam_masuk" value="{{ $ad['format_masuk'] }}">
                                            <input type="hidden" name="jam_pulang" value="{{ $ad['format_pulang'] }}">
                                            <p class="text-center mt-5">
                                                <span class="badge badge-light-dark px-5 py-3">Divisi {{ $data->division->nama_divisi }} - {{ $data->job_position->nama_posisi }}</span>
                                            </p>
                                            <br>
                                            {{-- {{ dd($ad) }} --}}
                                            <div class="text-center d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary me-3" id="jamMasuk">Absen Masuk</button>
                                                <button type="submit" class="btn btn-primary" id="jamPulang">Absen Pulang</button>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
<script>
    $(document).ready(function() {
            $.ajax({
                url: '/cek-absensi-masuk',
                type: 'GET',
                success: function(data) {
                    if(data.status === 'success') {
                        $('#jamMasuk').removeClass('btn btn-primary').addClass('btn btn-success').prop('disabled', true);
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText;
                    console.log(errorMessage);
                    alert('Terjadi kesalahan saat memproses permintaan: ' + errorMessage)
                }
            });
        });

    $(document).ready(function() {
        $.ajax({
            url: '/cek-absensi-pulang',
            type: 'GET',
            success: function(data) {
                if(data.status === 'success') {
                    $('#jamPulang').removeClass('btn btn-primary').addClass('btn btn-success').prop('disabled', true);
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.responseText;
                alert('Terjadi kesalahan saat memproses permintaan: ' + errorMessage)
            }
        });
    });

    $('#jamMasuk').on('click', function() {
        var jam_masuk =  $('input[name="jam_masuk"]').val();
        var jam_pulang =  $('input[name="jam_pulang"]').val();

        $.ajax({
            url: '/user-absensi-masuk',
            type: 'POST',
            data: {
                _token : '{{ csrf_token() }}',
                jam_masuk: jam_masuk,
                jam_pulang: jam_pulang
            },
            success: function(data) {
                if(data.status === 'hadir') {
                    $('#jamMasuk').removeClass('btn btn-primary').addClass('btn btn-success').prop('disabled', true);
                    var successMessage = data.message;
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: successMessage
                        });
                    }, 500);
                } else if (data.status === 'terlambat') {
                    $('#jamMasuk').removeClass('btn btn-primary').addClass('btn btn-success').prop('disabled', true);
                    var successMessage = data.message;
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: successMessage
                        });
                    }, 500);
                }
            },
            error: function(xhr, status, error) {
                if(xhr.status == 420 || xhr.status == 422) {
                    var errorMessage = xhr.responseJSON.message;
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage
                    });
                }
            }
        });
    });

    $('#jamPulang').on('click', function() {
        var jam_masuk =  $('input[name="jam_masuk"]').val();
        var jam_pulang = $('input[name="jam_pulang"]').val();
        
        $.ajax({
            url: '/user-absensi-pulang',
            type: 'POST',
            data: {
                _token : '{{ csrf_token() }}',
                jam_masuk: jam_masuk,
                jam_pulang: jam_pulang
            },
            success: function(data) {
                if(data.status === 'success') {
                    $('#jamPulang').removeClass('btn btn-primary').addClass('btn btn-success').prop('disabled', true);
                    var successMessage = data.message;
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: successMessage
                        });
                    }, 500);
                }
            },
            error: function(xhr, status, error) {
                if(xhr.status == 420 || xhr.status == 422) {
                    var errorMessage = xhr.responseJSON.message;
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage
                    });
                }
            }
        })
    })
</script>
@endsection