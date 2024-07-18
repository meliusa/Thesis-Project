@extends('layouts.app')
@section('custom-css')
<style>
    #kt_daterangepicker_10 {
        background-color: #f8f9fa; /* Memberi warna latar belakang yang menunjukkan tidak aktif */
        cursor: not-allowed; /* Mengganti kursor saat dihover */
        pointer-events: none; /* Mencegah event mouse */
        border: 1px solid #ced4da; /* Menambah border untuk menyerupai input yang tidak aktif */
    }
</style>
@endsection
@section('content')
    <section>
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
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Manajemen Pekerjaan</h1>
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
                            <li class="breadcrumb-item text-muted">Manajemen Pekerjaan</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-dark">Data Pekerjaan</li>
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
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="black" />
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-filter="search"
                                        class="form-control form-control w-250px ps-14" placeholder="Cari" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('job-description.create') }}" class="btn btn-primary m-1">Tambah Data</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_admin_job_description">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0 text-center">
                                        <th class="min-w-50px">No</th>
                                        <th class="min-w-125px">Pekerjaan</th>
                                        <th class="min-w-125px">Periode</th>
                                        <th class="min-w-100px">Tugas</th>
                                        @if (Auth::user()->id_role != 4)
                                            <th class="text-end min-w-50px">Aksi</th>
                                        @endif
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    @foreach ($jobDesc as $job)
                                        <!--begin::Table row-->
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <b>Divisi : </b> {{ $job->division->nama_divisi }}
                                                <br>
                                                <b>Posisi : </b> {{ $job->job_position->nama_posisi }}
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::make($job->periode_mulai)->isoFormat('DD MMMM YYYY') }}
                                                s/d
                                                {{ \Carbon\Carbon::make($job->periode_selesai)->isoFormat('DD MMMM YYYY') }}
                                            </td>
                                            <td>
                                                <ol>
                                                    @foreach($job->task as $task)
                                                        <li>{{ $task->tugas }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <!--begin::Action=-->
                                                <td class="text-end text-center">
                                                    <a href="{{ route('job-description.edit', $job->id) }}"
                                                        class="btn btn-icon btn-warning btn-sm me-1">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                        <i class="bi bi-pencil-square"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
                                                        <form class="d-inline"
                                                            action="{{ route('job-description.destroy', $job->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-icon btn-danger btn-sm ondelete"
                                                                type="submit">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <i class="bi bi-trash"></i>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>                                    
                                            <!--end::Action=-->
                                        </tr>
                                        <!--end::Table row-->
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
        <!--end::Content-->

        {{-- -----------------------Modal Create----------------------- --}}
        <!--begin::Modal - Add task-->
        <div class="modal fade" id="kt_datatable_admin_add_job_description" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Tambah Data</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" type="button"
                            data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137"
                                        width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16"
                                        height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="kt_datatable_admin_add_job_description" class="form"
                            action="{{ route('job-description.store') }}" method="POST">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                                <!--begin::Input group-->
                                <div class="form-group mb-3">
                                    <label class="required form-label">Divisi</label>
                                    <select class="form-select form-select" data-control="select2"
                                    data-dropdown-parent="#kt_datatable_admin_add_job_description"
                                    name="id_divisi" id="id_division">
                                        <option selected disabled>Pilih Divisi</option>
                                        @foreach ($division as $divisi)
                                            <option value="{{ $divisi->id }}"> {{ $divisi->nama_divisi }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="required form-label">Posisi Pekerjaan</label>
                                    <select class="form-select form-select" data-control="select2"
                                    data-dropdown-parent="#kt_datatable_admin_add_job_description"
                                    name="id_posisi" id="id_position">
                                        <option selected disabled>Pilih Posisi Pekerjaan</option>
                                    </select>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label for="" class="required form-label">Periode</label>
                                    <div class="mb-0">
                                        <input name="periode" class="form-control form-control-solid" placeholder="Periode" id="kt_daterangepicker_1" required/>
                                    </div>
                                </div>
                                <!--end::Input group-->                                                       
                                <!--begin::Input group-->
                                <label for="" class="required form-label">Keterangan Tugas</label>
                                <div class="form-floating mb-7">
                                    <textarea name="tugas" id="kt_docs_ckeditor_classic" required>
                                    </textarea>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
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
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Add task-->

        {{-- -----------------------Modal Edit----------------------- --}}
        <!--begin::Modal - Add task-->
        <div class="modal fade" id="kt_datatable_admin_edit_job_description" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Edit Data</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" type="button" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="kt_datatable_admin_edit_job_description" class="form edit_form" method="POST">
                            @method('PUT')
                            @csrf
                            {{-- <div class="d-flex flex-column" style="max-height: 80vh; overflow-y: auto;"> --}}
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                                <!--begin::Input group-->
                                <input type="hidden" name="id_divisi" id="id_divisi_hidden">
                                <input type="hidden" name="id_posisi" id="id_posisi_hidden">
                                <div class="form-group mb-3">
                                    <label class="required form-label">Divisi</label>
                                    <input type="text" id="nama_divisi_view" class="form-control" value="" readonly>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label class="required form-label">Posisi Pekerjaan</label>
                                    <input type="text" id="nama_posisi_view" class="form-control" value="" readonly>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label for="" class="required form-label">Periode</label>
                                    <div class="mb-0">
                                        <input name="periode" class="form-control form-control-solid" placeholder="Periode" id="kt_daterangepicker_10" readonly/>
                                    </div>
                                </div>
                                <!--end::Input group-->                                                       
                                <!--begin::Input group-->
                                <label for="" class="required form-label">Keterangan Tugas</label>
                                <div class="form-floating mb-7">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="textarea" name="tugas"></textarea>
                                    <label for="textarea">Masukkan Keterangan Tugas Disini...</label>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
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
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Add task-->
    </section>
@endsection
@section('custom-js')
    <script>
        // Class definition
        var KTDatatablesButtons = function () {
            // Shared variables
            var table;
            var datatable;

            // Private functions
            var initDatatable = function () {
                datatable = $(table).DataTable({
                    "info": false,
                    'order': [],
                    'pageLength': 10,
                });
            }

            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-filter="search"]');
                filterSearch.addEventListener('keyup', function (e) {
                    datatable.search(e.target.value).draw();
                });
            }

            // Public methods
            return {
                init: function () {
                    table = document.querySelector('#kt_datatable_admin_job_description');

                    if ( !table ) {
                        return;
                    }

                    initDatatable();
                    // exportButtons();
                    handleSearchDatatable();
                    }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTDatatablesButtons.init();
        });
    </script>

    <script>
        $("#kt_daterangepicker_1").daterangepicker();
        $("#kt_daterangepicker_10").daterangepicker();

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
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#id_division').change(function() {
                var id_divisi = $(this).val();

                $.ajax({
                    url: '/get-position-for-schedule',
                    type: 'POST',
                    data: {
                        id_division: id_divisi,
                        _token: '{{ csrf_token() }}'
                    },
                    cache: false,

                    success: function(response) {
                        console.log(response);  
                        $('#id_position').empty(); 
                        response.dataPosisi.forEach(function(posisi) {
                            if (posisi.id_divisi === id_divisi) {
                                $('#id_position').append($('<option></option>').attr('value', posisi.id).text(posisi.nama_posisi));
                            }
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        $('body').on('click', '#btn-edit-post', function() {
            let jobDescId = $(this).data('id');

            $.ajax({
                url: `/job-description/${jobDescId}`,
                method: 'GET',
                success: function(response) {
                    console.log(response)
                    $('.edit_form').attr('action', `/job-description/${response.dataJobDesc.id}`);

                    let divisionData = response.dataDivisi;
                    let positionData = response.dataPosisi;
                    let namaDivisi = divisionData.find(division => division.id === response.dataJobDesc.id_divisi)?.nama_divisi;
                    let namaPosisi = positionData.find(position => position.id === response.dataJobDesc.id_posisi)?.nama_posisi;

                    $('#nama_divisi_view').val(namaDivisi);
                    $('#nama_posisi_view').val(namaPosisi);
                    $('#id_divisi_hidden').val(response.dataJobDesc.id_divisi);
                    $('#id_posisi_hidden').val(response.dataJobDesc.id_posisi);

                    let periodeMulai = response.dataJobDesc.periode_mulai;
                    let periodeSelesai = response.dataJobDesc.periode_selesai;
                    let periodeMulaiBaru = moment(periodeMulai, "DD-MM-YYYY").format("MM/DD/YYYY");
                    let periodeSelesaiBaru = moment(periodeSelesai, "DD-MM-YYYY").format("MM/DD/YYYY");
                    let periodeBaru = periodeMulaiBaru + ' - ' + periodeSelesaiBaru;
                    $('#kt_daterangepicker_10').val(periodeBaru);

                    $('#textarea').val(response.dataJobDesc.tugas);
                },
            });
        });
    </script>
@endsection