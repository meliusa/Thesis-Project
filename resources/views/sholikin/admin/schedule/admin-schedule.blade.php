@extends('layouts.app')
@section('custom-css')
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
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Manajemen Jadwal</h1>
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
                            <li class="breadcrumb-item text-muted">Manajemen Jadwal</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-dark">Data Jadwal</li>
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
                                <div class="d-flex justify-content-end mx-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_datatable_add_employee_schedule">
                                        <span class="svg-icon svg-icon-2">
                                            Tambah Data
                                    </button>
                                </div>
                                <a href="{{ url('excelAdminSchedule') }}" target="_blank" class="btn btn-success">Export Data</a>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_employee_schedule">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0 text-center">
                                        <th class="min-w-50px">No</th>
                                        <th class="min-w-125px">Pekerjaan</th>
                                        <th class="min-w-125px">Periode</th>
                                        <th class="min-w-100px">Jam</th>
                                        @if (Auth::user()->id_role != 4)
                                            <th class="text-end min-w-50px">Aksi</th>
                                        @endif
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold text-center">
                                    @foreach ($schedules as $schedule)
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <b>Divisi : </b> {{ $schedule->division->nama_divisi }}
                                                <br>
                                                <b>Posisi : </b> {{ $schedule->job_position->nama_posisi }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::make($schedule->periode_mulai)->isoFormat('DD MMMM YYYY') }}
                                                s/d
                                                {{ \Carbon\Carbon::make($schedule->periode_selesai)->isoFormat('DD MMMM YYYY') }}
                                            </td>
                                            <td>
                                                <b>Masuk : </b> {{ $schedule->jam_masuk }}
                                                <br>
                                                <b>Pulang : </b> {{ $schedule->jam_pulang }}
                                            </td>
                                            <!--begin::Action=-->
                                                <td class="text-end">
                                                    {{-- <a href="javascript:void(0)" id="btn-edit-post"
                                                        class="edit_data btn btn-icon btn-info btn-sm me-1"
                                                        data-id="{{ $schedule->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_edit_admin_schedule">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <i class="bi bi-eye"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a> --}}
                                                    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
                                                        <form class="d-inline"
                                                            action="{{ route('schedule.destroy', $schedule->id) }}"
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
        <div class="modal fade" id="kt_datatable_add_employee_schedule" tabindex="-1" aria-hidden="true">
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
                        <form id="kt_datatable_add_employee_schedule" class="form"
                            action="{{ route('schedule.store') }}" method="POST">
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
                                    data-dropdown-parent="#kt_datatable_add_employee_schedule"
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
                                    data-dropdown-parent="#kt_datatable_add_employee_schedule"
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
                                <div class="fv-row mb-7">
                                    <label for="" class="required form-label">Jam Masuk</label>
                                    <div class="mb-0">
                                        <input name="jam_masuk" class="form-control form-control-solid" placeholder="Jam Masuk" id="kt_datepicker_8" required/>
                                    </div>
                                </div>
                                <!--end::Input group-->                                                        
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label for="" class="required form-label">Jam Pulang</label>
                                    <div class="mb-0">
                                        <input name="jam_pulang" class="form-control form-control-solid" placeholder="Jam Pulang" id="kt_datepicker_80" required/>
                                    </div>
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
        <div class="modal fade" id="kt_modal_edit_admin_schedule" tabindex="-1" aria-hidden="true">
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
                        <form id="kt_modal_edit_admin_schedule" class="form edit_form" method="POST">
                            @method('PUT')
                            @csrf
                            {{-- <div class="d-flex flex-column" style="max-height: 80vh; overflow-y: auto;"> --}}
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                    data-kt-scroll="true"
                                    data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                                    <!--begin::Input group-->
                                    <div class="form-group mb-3">
                                        <label class="required form-label">Divisi</label>
                                        <select class="form-select form-select" data-control="select2"
                                        data-dropdown-parent="#kt_modal_edit_admin_schedule"
                                        name="id_divisi" id="nama_divisi" disabled>
                                            <option selected disabled>Pilih Divisi</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Posisi Pekerjaan</label>
                                        <select class="form-select form-select" data-control="select2"
                                        data-dropdown-parent="#kt_modal_edit_admin_schedule"
                                        name="id_posisi" id="nama_posisi" disabled>
                                            <option selected disabled>Pilih Posisi Pekerjaan</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <label for="" class="required form-label">Periode</label>
                                        <div class="mb-0">
                                            <input name="periode" class="form-control form-control-solid" placeholder="Periode" id="kt_daterangepicker_10" disabled/>
                                        </div>
                                    </div>
                                    <!--end::Input group-->                                                        
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <label for="" class="required form-label">Jam Masuk</label>
                                        <div class="mb-0">
                                            <input name="jam_masuk" class="form-control form-control-solid" placeholder="Jam Masuk" id="kt_datepicker_9" disabled/>
                                        </div>
                                    </div>
                                    <!--end::Input group-->                                                        
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <label for="" class="required form-label">Jam Pulang</label>
                                        <div class="mb-0">
                                            <input name="jam_pulang" class="form-control form-control-solid" placeholder="Jam Pulang" id="kt_datepicker_90" disabled/>
                                        </div>
                                    </div>
                                    <!--end::Input group-->                                                        
                                </div>
                                <!--end::Scroll-->
                            {{-- </div> --}}
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
                    table = document.querySelector('#kt_datatable_employee_schedule');

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
        $(document).ready(function() {
            $('#kt_datatable_add_employee_schedule').on('shown.bs.modal', function () {
                $('#id_divisi').select2();
                $('#id_posisi').select2();
            });
        });
    </script>

    <script>
        $("#kt_daterangepicker_1").daterangepicker();
        $("#kt_daterangepicker_10").daterangepicker();
        $("#kt_datepicker_9").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
        $("#kt_datepicker_90").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
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
            let scheduleId = $(this).data('id');

            $.ajax({
                url: `/schedule/${scheduleId}`,
                method: 'GET',
                success: function(response) {
                    console.log(response);
                    $('.edit_form').attr('action', `/schedule/${response.dataJadwal.id}`);

                    let divisionData = response.dataDivisi;
                    let selectDivisi = $('#nama_divisi');
                    selectDivisi.empty();
                    divisionData.forEach(function(division) {
                        selectDivisi.append($('<option></option>').attr('value', division.id).text(division.nama_divisi));
                    });
                    $('#nama_divisi').val(response.dataJadwal.id_divisi);

                    let idJadwalPosisi = response.dataJadwal.id_posisi;
                    let matchedPosisi = response.dataPosisi.find(posisi => posisi.id == idJadwalPosisi);
                    
                    $('#nama_posisi').empty();
                    $('#nama_posisi').html(
                        '<option value="" selected disabled>Pilih posisi</option>'
                    );
                    $.each(response.dataPosisi, function (key, value) {
                        if (value.id_divisi == response.dataJadwal.id_divisi) {
                            $('#nama_posisi').append(
                                '<option value="' + value.id + '"' + (value.id == response.dataJadwal.id_posisi ? ' selected' : '') + '>' + value.nama_posisi + '</option>'
                            );
                        }
                    });

                    var parts = response.dataJadwal.periode_mulai.split('-');
                    var formattedPeriodeMulai = parts[1] + '/' + parts[2] + '/' + parts[0];

                    parts = response.dataJadwal.periode_selesai.split('-');
                    var formattedPeriodeSelesai = parts[1] + '/' + parts[2] + '/' + parts[0];
                    $('#kt_daterangepicker_10').daterangepicker({
                        startDate: formattedPeriodeMulai,
                        endDate: formattedPeriodeSelesai
                    });

                    $('#kt_datepicker_9').val(response.dataJadwal.jam_masuk);
                    $('#kt_datepicker_90').val(response.dataJadwal.jam_pulang);
                },
            });
        });
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#nama_divisi').change(function() {
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
                        $('#nama_posisi').empty(); 
                        response.dataPosisi.forEach(function(posisi) {
                            if (posisi.id_divisi === id_divisi) {
                                $('#nama_posisi').append($('<option></option>').attr('value', posisi.id).text(posisi.nama_posisi));
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
@endsection