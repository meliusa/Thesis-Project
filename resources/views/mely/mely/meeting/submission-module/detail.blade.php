@extends('layouts.app')
@section('custom-css')
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Detail Agenda Rapat
                </h1>
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
                    <li class="breadcrumb-item text-muted">Manajemen Rapat</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('submission-modules.index') }}" class="text-muted text-hover-primary">Modul
                            Pengajuan</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Detail Agenda Rapat</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

                @if ($submissionModule->reason_cancelled != null)
                <!--begin::Alert-->
                <div
                    class="alert alert-dismissible bg-light-danger border border-danger d-flex flex-column flex-sm-row p-5 mb-10">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-6 mb-5 mb-sm-0 mt-3">
                        <i class="bi bi-exclamation-triangle fs-3 text-danger"></i>
                    </span>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column pe-0 pe-sm-10">
                        <!--begin::Title-->
                        <h5 class="mb-1">PERHATIAN!</h5>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>Rapat dibatalkan karena, {{ $submissionModule->reason_cancelled }}</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Close-->
                    <button type="button"
                        class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                        data-bs-dismiss="alert">
                        <i class="bi bi-x fs-1 text-danger"></i>
                    </button>
                    <!--end::Close-->
                </div>
                <!--end::Alert-->
                @endif

                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-5">Agenda ID : {{ $submissionModule->id }}</h3>
                        @php
                        $statusResult = '';
                        switch($submissionModule->status) {
                        case 'Proses Persetujuan':
                        $statusResult = 'warning';
                        break;
                        case 'Sudah Disetujui':
                        $statusResult = 'success';
                        break;
                        case 'Undangan Didistribusikan':
                        $statusResult = 'primary';
                        break;
                        case 'Telah Dilaksanakan':
                        $statusResult = 'success';
                        break;
                        case 'Dibatalkan':
                        $statusResult = 'danger';
                        break;
                        case 'Baru Ditambahkan':
                        $statusResult = 'secondary';
                        break;
                        case 'Notula Tersedia':
                        $statusResult = 'info';
                        break;
                        }
                        @endphp
                        <span class="badge badge-{{ $statusResult }}">{{ $submissionModule->status }}</span>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Action-->
                    <a href="{{ URL::previous() }}" class="btn btn-light align-self-center">Kembali</a>
                    <!--end::Action-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Diajukan oleh</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $submissionModule->user->nama }} ( ID :
                                {{ $submissionModule->user_id }} )</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Judul Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $submissionModule->title }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tujuan Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $submissionModule->purpose }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Agenda Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"
                                style="white-space: pre-wrap;">{{ $submissionModule->agenda }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tanggal dan Waktu Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span
                                class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($submissionModule->date)->format('d-m-Y') }}
                                ,
                                {{ \Carbon\Carbon::parse($submissionModule->time)->format('H:i') }} WIB</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Durasi Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $submissionModule->duration }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tipe Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="badge badge-info">{{ $submissionModule->type }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    {{-- <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Lokasi Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            @if ($submissionModule->type == 'Daring')
                            @php
                            $url = $submissionModule->location;
                            // Memastikan URL dimulai dengan 'http://' atau 'https://'
                            if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                            // Jika tidak dimulai dengan http:// atau https://, maka lakukan pencarian
                            // Misalnya menggunakan Google dengan keyword URL
                            $searchUrl = "https://www.google.com/search?q=" . urlencode($url);
                            // Output link yang mengarah ke hasil pencarian
                            echo '<a href="' . $searchUrl . '" class="fw-bold fs-6" target="_blank">' .
                                $submissionModule->location . '</a>';
                            } else {
                            // Jika dimulai dengan http:// atau https://, langsung jalankan
                            echo '<a href="' . $url . '" class="fw-bold fs-6" target="_blank">' .
                                $submissionModule->location . '</a>';
                            }
                            @endphp
                            @else
                            <span class="fw-bold text-gray-800 fs-6">{{ $submissionModule->location }}</span>
                    @endif
                </div>
                <!--end::Col-->
            </div> --}}
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Lokasi Rapat</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    @if ($submissionModule->type == 'Daring')
                    @php
                    $url = $submissionModule->location;
                    // Memastikan URL dimulai dengan 'http://' atau 'https://'
                    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                    // Jika tidak dimulai dengan http:// atau https://, tampilkan pesan "Link Invalid"
                    echo 'Tautan tidak valid. (Harus diawali dengan http atau
                    https)';
                    } else {
                    // Jika dimulai dengan http:// atau https://, tampilkan tautan yang valid
                    echo '<a href="' . $url . '" target="_blank">' . $url . '</a>';
                    }
                    @endphp
                    @else
                    <span class="fw-bold text-gray-800 fs-6">{{ $submissionModule->location }}</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>

            <!--end::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Dokumen Pendukung Rapat</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    @php
                    $url = $submissionModule->supporting_document;
                    // Memastikan URL dimulai dengan 'http://' atau 'https://'
                    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                    // Jika tidak dimulai dengan http:// atau https://, tampilkan pesan "Link Invalid"
                    echo 'Tautan tidak valid. (Harus diawali dengan http atau
                    https)';
                    } else {
                    // Jika dimulai dengan http:// atau https://, tampilkan tautan yang valid
                    echo '<a href="' . $url . '" target="_blank">' . $url . '</a>';
                    }
                    @endphp
                </div>
                <!--end::Col-->
            </div>
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Nota Bene Rapat</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{ $submissionModule->postscript }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Proses Pengajuan Diterima Pada</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    @if($submissionModule->approved_at)
                    <span
                        class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($submissionModule->approved_at)->format('d-m-Y H:i:s') }}</span>
                    @else
                    <span class="fw-bold text-gray-800 fs-6">-</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Undangan Didistribusikan Pada</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    @if($submissionModule->distributed_at)
                    <span
                        class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($submissionModule->distributed_at)->format('d-m-Y H:i:s') }}</span>
                    @else
                    <span class="fw-bold text-gray-800 fs-6">-</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Rapat Telah Dilaksanakan Pada</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    @if($submissionModule->implemented_at)
                    <span
                        class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($submissionModule->implemented_at)->format('d-m-Y H:i:s') }}</span>
                    @else
                    <span class="fw-bold text-gray-800 fs-6">-</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Notula Tersedia Pada</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    @if($submissionModule->provided_at)
                    <span
                        class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($submissionModule->provided_at)->format('d-m-Y H:i:s') }}</span>
                    @else
                    <span class="fw-bold text-gray-800 fs-6">-</span>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <div class="separator my-10"></div>

            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6 text-muted">Partisipan
                    Rapat</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    @foreach ($meetingParticipants as $meetingParticipant)
                    @php
                    $nameResult = '';
                    $roleNameResult = '';
                    @endphp
                    @foreach ($users as $user)
                    @if ($meetingParticipant->participant_id == $user->id)
                    @php
                    $nameResult = $user->nama;
                    @endphp
                    @foreach ($roles as $role)
                    @if ($user->id_role == $role->id)
                    @php
                    $roleNameResult = $role->nama_role;
                    @endphp
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    <label class="col-form-label fw-bold fs-6">
                        - {{ $roleNameResult }}, {{ $nameResult }} ( ID :
                        {{ $meetingParticipant->participant_id }} )
                    </label>
                    @endforeach
                </div>
                <!--end::Col-->
            </div>

            <div class="separator my-10"></div>

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Tanggal Pembuatan</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span
                        class="fw-bold text-gray-800 fs-6">{{ $submissionModule->created_at->format('d-m-Y H:i:s') }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Tanggal Diperbarui</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span
                        class="fw-bold text-gray-800 fs-6">{{ $submissionModule->updated_at->format('d-m-Y H:i:s') }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-10">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Izin yang diberikan (Perubahan atau
                    Penghapusan)</label>
                <!--begin::Label-->
                <!--begin::Label-->
                <div class="col-lg-8">
                    @php
                    $permissionResult = '';
                    if($submissionModule->status == 'Baru Ditambahkan') {
                    $permissionResult = 'Diizinkan.';
                    } else {
                    $permissionResult = 'Tidak Diizinkan.';
                    }
                    @endphp
                    <span class="fw-bold fs-6 text-gray-800">{{ $permissionResult }}</span>
                </div>
                <!--begin::Label-->
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
</div>
<!--end::Container-->
</div>
<!--end::Post-->
</div>
<!--end::Content-->
@endsection
@section('custom-js')
@endsection
