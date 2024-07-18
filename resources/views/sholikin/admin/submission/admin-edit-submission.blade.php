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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Pengajuan Karyawan</h1>
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
                        <li class="breadcrumb-item text-muted">Manajemen Jadwal</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Tambah Data Pengajuan Karyawan</li>
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
                            <form action="{{ route('submission.update', $submission->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="required">Nama Karyawan</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <input type="hidden" name="id_karyawan" value="{{ $submission->employee['id'] }}">
                                        <div class="col-lg-4 fv-row">
                                            <input type="text" class="form-control form-control-lg form-control" value="{{ $submission->employee->nama_lengkap }}" disabled>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Jenis Pengajuan</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-4 fv-row">
                                            <select name="jenis_pengajuan" aria-label="Pilih Jenis Pengajuan"
                                                data-control="select2" data-placeholder="Pilih Jenis Pengajuan"
                                                class="form-select form-select form-select-lg fw-bold" required>
                                                <option value="" disabled selected>Pilih Jenis Pengajuan</option>
                                                <option value="Izin" {{ old('jenis_pengajuan', $submission->jenis_pengajuan) == 'Izin' ? 'selected' : '' }}>Izin</option>
                                                <option value="Sakit" {{ old('jenis_pengajuan', $submission->jenis_pengajuan) == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                                <option value="Cuti" {{ old('jenis_pengajuan', $submission->jenis_pengajuan) == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->                                    
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="required">Tanggal Pengajuan</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-4 fv-row">
                                            <input name="periode" class="form-control form-control-lg form-control"
                                                id="kt_daterangepicker_1" value="{{ $periode }}" required />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Keterangan</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <textarea name="keterangan" class="form-control form-control-lg form-control" placeholder="Masukkan keterangan pengajuan..."
                                                required>{{ $submission->keterangan }}</textarea>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Form-->
                                    <div class="form-group mb-3">
                                        <label class="required form-label">Bukti Surat Izin Pengajuan</label>
                                        <div class="col-lg-12 fv-row">
                                            <!--begin::Dropzone-->
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="uploadpengajuan">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Masukkan file di sini atau klik untuk mengunggah.</h3>
                                                            <span class="fs-7 fw-bold text-gray-400">Ukuran file maksimum 2MB</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--end::Dropzone-->
                                        </div>
                                    </div>
                                    <!--end::Form-->
                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end">
                                        <button type="submit" name="status" value="ditolak" class="btn btn-danger mx-2">
                                            <span class="indicator-label">Ditolak</span>
                                            <span class="indicator-progress">Mohon tunggu...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="submit" id="disetujui" name="status" value="disetujui" class="btn btn-primary mx-2">
                                            <span class="indicator-label">Disetejui</span>
                                            <span class="indicator-progress">Mohon tunggu...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
@endsection
@section('custom-js')
    <script>
        $("#kt_daterangepicker_1").daterangepicker();
    </script>

    <script>
        var myDropzone = new Dropzone("#uploadpengajuan", {
            url: "/uploadPengajuan", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            acceptedFiles: '.pdf, .doc, .docx',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                @if(old('surat_izin', $submission->surat_izin))
                    var file = { name: '{{ old('surat_izin', $submission->surat_izin) }}' }
                    this.options.addedfile.call(this, file);
                    this.options.thumbnail.call(this, file, '/storage/submission/{{ old('surat_izin', $submission->surat_izin) }}');
                    file.previewElement.classList.add('dz-success');
                    file.previewElement.classList.add('dz-complete');
                @endif
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="surat_izin" value="' + response.name + '">');
            },
            error: function(response) {
                console.log(response.status);
            }
        });
    </script>
    
    <script>
        $(document).ready(function() {
            $('#disetujui').on('click', function() {
                
            });
        });
    </script>
@endsection