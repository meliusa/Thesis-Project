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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Detail Daftar Notula
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
                    <li class="breadcrumb-item text-muted">Tindak Lanjut</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('minutes.index') }}" class="text-muted text-hover-primary">Daftar
                            Notula</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Detail Daftar Notula</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">
                </div>
                <!--begin::Primary button-->
                <a href="{{ URL::previous() }}" class="btn btn-light align-self-center">Kembali</a>
                <!--end::Primary button-->
            </div>
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
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-5">ID : {{ $docMinute->id }} </h3>
                        @php
                        $statusResult = '';
                        switch($docMinute->status) {
                        case 'Baru Ditambahkan':
                        $statusResult = 'secondary';
                        break;
                        case 'Telah Didistribusikan':
                        $statusResult = 'primary';
                        break;
                        }
                        @endphp
                        <span class="badge badge-{{ $statusResult }}">{{ $docMinute->status }}</span>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Action-->
                    <a href="{{ route('doc-minutes.generate-pdf', $docMinute->id) }}"
                        class="btn btn-success align-self-center"><i class="fas fa-envelope-open-text fs-4 me-2"></i>
                        PDF</a>
                    <!--end::Action-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Judul Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="{{ route('submission-modules.details', $submissionModule->id)}}"
                                class="fw-bold fs-6 text-gray-800 text-hover-primary">
                                {{ $submissionModule->title }} ( ID : {{ $submissionModule->id }})
                            </a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tanggal dan Jam Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span
                                class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($submissionModule->date)->format('d-m-Y') }}
                                ,
                                {{ \Carbon\Carbon::parse($submissionModule->time)->format('H:i') }} WIB</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
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
                    <!--begin::Row-->
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
                            echo '<span class="fw-bold text-danger fs-6">Tautan tidak valid. (Harus diawali dengan http
                                atau
                                https)</span>';
                            } else {
                            // Jika dimulai dengan http:// atau https://, tampilkan tautan yang valid
                            echo '<a href="' . $url . '" class="fw-bold fs-6" target="_blank">' . $url . '</a>';
                            }
                            @endphp
                            @else
                            <span class="fw-bold text-gray-800 fs-6">{{ $submissionModule->location }}</span>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <div class="separator my-10"></div>

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Notulis Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $docMinute->user->nama }} ( ID :
                                {{ $docMinute->user_id }} )</span>
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="separator my-10"></div>

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Agenda Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="{{ route('submission-modules.details', $submissionModule->id)}}"
                                class="fw-bold fs-6 text-gray-800 text-hover-primary"> <span
                                    style="white-space: pre-wrap;">{{ $submissionModule->agenda }}</span>
                            </a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <div class="separator my-10"></div>

                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Rangkaian Acara Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">
                                {!! nl2br(e($docMinute->events))!!}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <div class="separator my-10"></div>

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Keputusan Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{!! nl2br(e($docMinute->decisions))!!}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <div class="separator my-10"></div>

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Q & A Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            @foreach ($docMinuteQnaDetails as $qna)
                            <div class="mb-3">
                                <strong>Asker:</strong> {{ $qna->asker }} <br>
                                <strong>Pertanyaan:</strong> {{ $qna->question }} <br>
                                <strong>Jawaban:</strong> {{ $qna->answer }}
                            </div>
                            @endforeach
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <div class="separator my-10"></div>

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tanggal Pembuatan</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span
                                class="fw-bold text-gray-800 fs-6">{{ $docMinute->created_at->format('d-m-Y H:i:s') }}</span>
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
                                class="fw-bold text-gray-800 fs-6">{{ $docMinute->updated_at->format('d-m-Y H:i:s') }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Izin yang diberikan (Perubahan atau
                            Penghapusan)</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8">
                            @php
                            $permissionResult = '';
                            if($docMinute->status == 'Baru Ditambahkan') {
                            $permissionResult = 'Diizinkan.';
                            }else{
                            $permissionResult = 'Tidak Diizinkan.';
                            }
                            @endphp
                            <span class="fw-bold fs-6 text-gray-800">{{ $permissionResult }}</span>
                        </div>
                        <!--begin::Label-->
                    </div>
                    @endif
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
