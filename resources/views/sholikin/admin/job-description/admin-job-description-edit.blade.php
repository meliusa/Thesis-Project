@extends('layouts.app')
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Tambah Deskripsi Pekerjaan</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('event/event_management') }}"
                                class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Manajemen Pekerjaan</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Data Pekerjaan</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Tambah Deskripsi Pekerjaan</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <div id="" class="collapse show">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <!--begin::Container-->
                <div class="container-xxl" id="kt_content_container">
                    <!--begin::Basic info-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Content-->
                        <div id="kt_docs_repeater_advanced" class="collapse show">
                            <!--begin::Form-->
                            {{-- id="kt_account_profile_details_form" --}}
                            <form action="{{ route('job-description.update', $jobDesc->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <input type="hidden" name="id_divisi" value="{{ $jobDesc->id_divisi }}">
                                    <input type="hidden" name="id_posisi" value="{{ $jobDesc->id_posisi }}">
                                    <input type="hidden" name="id_jobdesc" value="{{ $jobDesc->id }}">
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Divisi</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-4 fv-row">
                                            <input type="text" class="form-control mb-3" name="divisi" value="{{ $jobDesc->division->nama_divisi }}" readonly>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Posisi Pekerjaan</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-4 fv-row">
                                            <input type="text" class="form-control mb-3" name="posisi" value="{{ $jobDesc->job_position->nama_posisi }}" readonly>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="required">Periode</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-4 fv-row">
                                            <input name="periode" class="form-control form-control-solid" placeholder="Periode" id="kt_daterangepicker_1" required/>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="card-header border-0 cursor-pointer" role="button"
                                        data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details"
                                        aria-expanded="true" aria-controls="kt_account_profile_details">
                                        <!--begin::Card title-->
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">Tugas</h3>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <div data-repeater-list="kt_docs_repeater_advanced">
                                        @foreach($taskData as $task)
                                        <div data-repeater-item data-task-id="{{ $task->id }}">
                                            <div class="card-body border-top p-5">
                                                <div class="row mb-6">
                                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Keterangan</label>
                                                    <div class="col-lg-4 fv-row">
                                                        <div>
                                                            <input type="text" name="tugas" class="form-control form-control-lg form-control" placeholder="Tugas" value="{{ $task->tugas }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-end py-6">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-light-danger">
                                                            <i class="la la-trash-o"></i>Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="d-flex justify-content-end py-6 px-9">
                                            <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                                <i class="la la-plus"></i>Tambah
                                            </a>
                                        </div>
                                    </div>
                                    <!--begin::Input group-->
                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Simpan</span>
                                            <span class="indicator-progress">Mohon tunggu...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Basic info-->
                </div>
            </div>
            <!--end::Container-->
        </div>
    </div>
    <!--end::Post-->
    <!--end::Content-->
    {{-- @include('event.management.create.modal') --}}
@endsection
@section('custom-js')
    <script>
        var parts = "{{ $jobDesc->periode_mulai }}".split('-');
        var formattedPeriodeMulai = parts[1] + '/' + parts[2] + '/' + parts[0];

        parts = "{{ $jobDesc->periode_selesai }}".split('-');
        var formattedPeriodeSelesai = parts[1] + '/' + parts[2] + '/' + parts[0];

        $('#kt_daterangepicker_1').daterangepicker({
            startDate: formattedPeriodeMulai,
            endDate: formattedPeriodeSelesai
        });
    </script>
@endsection
