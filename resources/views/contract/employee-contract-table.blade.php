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
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Kontrak Karyawan</h1>
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
                            <li class="breadcrumb-item text-muted">Manajemen Kontrak</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-dark">Data Kontrak Karyawan</li>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_employee_contract">
                                        <span class="svg-icon svg-icon-2">
                                            Tambah Data
                                    </button>
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Modal - Add task-->
                                <div class="modal fade" id="kt_modal_add_employee_contract" tabindex="-1"
                                    aria-hidden="true">
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
                                                <form id="kt_modal_add_employee_contract" class="form"
                                                    action="{{ route('employee-contract.store') }}" method="POST">
                                                    @csrf
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                        data-kt-scroll="true"
                                                        data-kt-scroll-activate="{default: false, lg: true}"
                                                        data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <label for="" class="required form-label">Nama
                                                                Karyawan</label>
                                                            <select class="form-select form-select" data-control="select2"
                                                                data-dropdown-parent="#kt_modal_add_employee_contract"
                                                                data-placeholder="Select Employee Name"
                                                                data-allow-clear="true" name="id_karyawan">
                                                                <option value="" selected disabled>Select Employee
                                                                    Name</option>
                                                                @foreach ($employees as $employee)
                                                                    <option value="{{ $employee->id }}">
                                                                        {{ $employee->nama_lengkap }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!--end::Input group-->


                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <label for="" class="required form-label">Tipe
                                                                Kontrak</label>
                                                            <select class="form-select form-select" data-control="select2"
                                                                data-dropdown-parent="#kt_modal_add_employee_contract"
                                                                data-placeholder="Select Contract Type"
                                                                data-allow-clear="true" name="id_kontrak"
                                                                id="id_kontrak">
                                                                <option value="" selected disabled>Select Contract
                                                                    Type</option>
                                                                @foreach ($contracts as $contract)
                                                                    <option value="{{ $contract->id }}">
                                                                        {{ $contract->tipe_kontrak }} -
                                                                        {{ $contract->durasi }} bulan </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="form-group mb-3">
                                                            <label class="required form-label">Durasi</label>
                                                            <input type="text" class="form-control  mb-3"
                                                                id="durasi" placeholder="Durasi" disabled>
                                                            <!--  <div class="wizard-form-error"></div> -->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <div class="col-md-6 fv-row">
                                                                <label for="" class="required form-label">Tanggal
                                                                    Mulai</label>
                                                                <input class="form-control form-control"
                                                                    placeholder="Pick date" id="kt_datepicker_10"
                                                                    name="tanggal_mulai" />
                                                            </div>
                                                            <div class="col-md-6 fv-row">
                                                                <label for="" class="required form-label">Tanggal
                                                                    Selesai</label>
                                                                <input class="form-control form-control" type="text"
                                                                    placeholder="End Date" name="tanggal_selesai"
                                                                    id="end_date" readonly />
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
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_employee_contract">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">No</th>
                                        <th class="min-w-125px">Nama Karyawan</th>
                                        <th class="min-w-125px">Tipe Kontrak</th>
                                        <th class="min-w-125px">Durasi</th>
                                        <th class="min-w-125px">Tanggal Mulai</th>
                                        <th class="min-w-125px">Tanggal Selesai</th>
                                        @if (Auth::user()->id_role != 4)
                                            <th class="text-end min-w-100px">Aksi</th>
                                        @endif
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    @foreach ($employeeContracts as $employeeContract)
                                        <!--begin::Table row-->
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $employeeContract->employee->nama_lengkap }}</td>
                                            <!--begin::Type=-->
                                            <td>{{ $employeeContract->contract->tipe_kontrak }}</td>
                                            <!--end::Type=-->
                                            <!--begin::Duration=-->
                                            <td>{{ $employeeContract->contract->durasi }} Bulan</td>
                                            <!--end::Duration=-->
                                            <td>{{ $employeeContract->tanggal_mulai }}</td>
                                            <td>{{ $employeeContract->tanggal_selesai }}</td>
                                            <!--begin::Action=-->
                                            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)
                                                <td class="text-end">
                                                    <a href="javascript:void(0)" id="btn-edit-post"
                                                        class="edit_data btn btn-icon btn-warning btn-sm me-1"
                                                        data-id="{{ $employeeContract->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_edit_employee_contract">
                                                        <span class="svg-icon svg-icon-3">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </span>
                                                    </a>
                                                    {{-- <button class="edit_data btn btn-icon btn-warning btn-sm me-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_edit_employee_contract"
                                                        value="{{ $employeeContract->id }}">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button> --}}
                                                    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
                                                        <form class="d-inline"
                                                            action="{{ route('employee-contract.destroy', $employeeContract->id) }}"
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
                                            @endif
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
        <!--begin::Modal - Add task-->
        <div class="modal fade" id="kt_modal_edit_employee_contract" tabindex="-1" aria-hidden="true">
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
                        <form id="kt_modal_edit_employee_contract" class="form edit_form" method="POST">
                            @method('PUT')
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-offset="300px">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label for="" class="required form-label">Nama
                                        Karyawan</label>
                                    <input type="text" class="form-control  mb-3" id="nama_karyawan"
                                        placeholder="Employee" disabled />
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label for="" class="required form-label">Tipe
                                        Kontrak</label>
                                    <select class="form-select form-select" data-control="select2"
                                        data-dropdown-parent="#kt_modal_edit_employee_contract" data-allow-clear="true"
                                        name="id_kontrak" id="id_kontrak_edit">
                                        <option value="" selected disabled>Select Contract
                                            Type</option>
                                    </select>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="form-group mb-3">
                                    <label class="required form-label">Durasi</label>
                                    <input type="text" class="form-control  mb-3" id="durasi_edit"
                                        placeholder="Durasi" disabled/>
                                    <!--  <div class="wizard-form-error"></div> -->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <div class="col-md-6 fv-row">
                                        <label for="" class="required form-label">Tanggal
                                            Mulai</label>
                                        <input class="form-control form-control-solid start-date" placeholder="Pick date"
                                            id="kt_datepicker_11" name="tanggal_mulai"/>
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label for="" class="required form-label">Tanggal
                                            Selesai</label>
                                        <input class="form-control form-control" type="text" placeholder="End Date"
                                            name="tanggal_selesai" id="end_date_edit" readonly />
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Simpan</span>
                                    <span class="indicator-progress">Mohon tunggu...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                    table = document.querySelector('#kt_datatable_employee_contract');

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
        $('body').on('click', '#btn-edit-post', function() {
            let employeeContractId = $(this).data('id');

            //fetch detail post with ajax
            $.ajax({
                url: `/employee-contract/${employeeContractId}`,
                type: "GET",
                success: function(response) {
                    console.log(response);
                    $('.edit_form').attr('action',
                        `/employee-contract/${response.dataEmployeeContract.id}`)
                    $("#kt_datepicker_11").flatpickr({
                        defaultDate: response.dataEmployeeContract.tanggal_mulai
                    });
                    $('#nama_karyawan').val(response.dataEmployee[0].nama_lengkap);
                    $('#id_kontrak_edit').html(
                        '<option value="" selected disabled>Select Contract Type</option>');
                    $.each(response.dataContract, function(key, value) {
                        if (response.dataEmployeeContract.id_kontrak == value.id) {
                            $('#durasi_edit').val(value.durasi)
                        }
                        $('#id_kontrak_edit')
                            .append(
                                '<option value="' + value.id + '"' + ((response.dataEmployeeContract.id_kontrak == value.id) ? 'selected' : '') + '>' + value.tipe_kontrak + " - " + value.durasi + " bulan" +
                                '</option>');
                    });
                    $('.start-date').val(response.dataEmployeeContract.tanggal_mulai)
                    $('#end_date_edit').val(response.dataEmployeeContract.tanggal_selesai)
                }
            });
        });
        $('#id_kontrak_edit').on('change', function() {
            let kontrakid = this.value;
            $.ajax({
                url: '{{ route('getContract') }}?id=' + kontrakid,
                type: 'get',
                success: function(res) {
                    console.log(res, 'res');
                    $.each(res, function(key, value) {
                        $('#durasi_edit').val(value.durasi);
                        const today = new Date($('.start-date').val());
                        const endDate = new Date(today.getFullYear(),
                            today.getMonth() + value.durasi, today.getDate())
                        $('#end_date_edit').val($.format.date(endDate,
                            "yyyy-MM-dd"))
                    });
                }
            });
        });
        $('.start-date').on('change', function() {
            const durasi = parseInt($('#durasi_edit').val())
            const startDate = new Date(this.value);
            const endDate = new Date(startDate.getFullYear(),
                startDate.getMonth() + durasi, startDate.getDate())
            $('#end_date_edit').val($.format.date(endDate, "yyyy-MM-dd"))
        })
    </script>
      <script>
        $(document).ready(function() {
            $('#id_kontrak').on('change', function() {
                let kontrakid = this.value;
                $('#durasi').val('');
                $.ajax({
                    url: '{{ route('getContract') }}?id=' + kontrakid,
                    type: 'get',
                    success: function(res) {
                        $.each(res, function(key, value) {
                            $('#durasi').val(value.durasi);
                            const today = new Date();
                            const endDate = new Date(today.getFullYear(),
                                today.getMonth() + value.durasi, today.getDate())
                            $('#end_date').val($.format.date(endDate, "yyyy-MM-dd"))
                        });
                    }
                });
            });
            $('input[name="tanggal_mulai"]').on('change', function() {
                const durasi = parseInt($('#durasi').val())
                const startDate = new Date(this.value);
                const endDate = new Date(startDate.getFullYear(),
                    startDate.getMonth() + durasi, startDate.getDate())
                $('#end_date').val($.format.date(endDate, "yyyy-MM-dd"))
            })
        });
    </script>
    <script>
     $("#kt_datepicker_10").flatpickr({
        defaultDate: Date.now()
    });
    </script>
@endsection