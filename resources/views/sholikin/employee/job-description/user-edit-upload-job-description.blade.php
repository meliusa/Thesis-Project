@extends('layouts.app')
@section('custom-css')
<style>
    .dropzone .dz-preview .dz-image img{
        width: 100%;
        /* height: 100%; */
    
    }
</style>
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
                        <li class="breadcrumb-item text-dark">Tambah Data Upload Bukti Pekerjaan</li>
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
                            <form action="{{ route('user-upload-job-description.update', $jobRes->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <input type="hidden" name="id_karyawan" value="{{ $data->id }}">
                                    @foreach($allDates as $ad)
                                        @if ($ad['date'] === $formatNow)
                                            <input type="hidden" name="id_jobdesc" value="{{ $ad['id_jobdesc'] }}">
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label
                                                    class="col-lg-4 col-form-label required fw-bold fs-6">Tanggal Tugas</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <input type="text" name="keterangan"
                                                        class="form-control form-control-lg form-control"
                                                        value="{{ $ad['date'] }}" readonly/>
                                                </div>
                                                <!--end::Col-->
                                                <!--end::Col-->
                                            </div>
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label required fw-bold fs-6"> Deskripsi Tugas</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8 fv-row">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">No</th>
                                                                <th scope="col">Keterangan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($ad['tugas'] as $index => $task)
                                                                <tr>
                                                                    <td>{{ $index + 1 }}.</td>
                                                                    <td>{{ $task }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                        @endif
                                    @endforeach
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="required">Keterangan</span>
                                        </label>
                                        <!--end::Label-->
                                        <div class="col-lg-4 fv-row">
                                            <textarea name="keterangan" id="kt_docs_ckeditor_classic" required>
                                                {{ old('keterangan', $jobRes->keterangan) }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Form-->
                                    <div class="form-group mb-3">
                                        <label class="required form-label">Upload Foto Bukti Pekerjaan</label>
                                        <div class="col-lg-12 fv-row">
                                            <!--begin::Dropzone-->
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="uploadbukti">
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
                                        <button type="reset" class="btn btn-light me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Simpan</span>
                                            <span class="indicator-progress">Mohon tunggu...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                @if(!is_null($foto))
                                    @if(count($foto) > 0)
                                        @foreach($foto as $f)
                                            <input type="hidden" name="foto[]" id="{{str_replace('.','_',$f)}}" value="{{ $f }}">
                                        @endforeach
                                    @endif
                                @endif
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
        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        var myDropzone = new Dropzone("#uploadbukti", {
            url: "/uploadTugas", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 15,
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            acceptedFiles: '.jpg, .jpeg, .png',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                @if(!is_null($foto))
                    @if(count($foto) > 0)
                        @foreach($foto as $f)
                            var file = { name: '{{ $f }}' }
                            this.options.addedfile.call(this, file);
                            this.options.thumbnail.call(this, file, '/storage/uploads/karyawan/tugas/{{ $f }}');
                            file.previewElement.classList.add('dz-success');
                            file.previewElement.classList.add('dz-complete');

                            // Tambahkan link ketika gambar diklik
                            file.previewElement.addEventListener("click", function() {
                                window.open('/storage/uploads/karyawan/tugas/{{ $f }}', '_blank');
                            });
                        @endforeach
                    @endif
                @endif
                this.on("removedfile", function(file) {
                    // Menghapus tag elemen dari DOM
                    var name = file.name;
                    var oke = name.replace('.','_');
                    $('#'+oke).remove();
                    file.previewElement.remove();
                }); 
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="foto[]" value="' + response.name + '">');
            },
            error: function(response) {
                console.log(response.status);
            }
        });
    </script>
@endsection