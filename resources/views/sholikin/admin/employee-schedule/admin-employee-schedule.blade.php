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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Jadwal Karyawan</h1>
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
                    <li class="breadcrumb-item text-dark">Data Jadwal Karyawan</li>
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
                            <a href="{{ route('employee-schedule.create') }}" class="btn btn-primary m-1">Tambah Data</a>
                            <a href="{{ url('excelSalaryAdvance') }}" target="_blank" class="btn btn-success m-1">Export Data</a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_admin_employee_schedule">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0 text-center">
                            <th class="min-w-50px">No</th>
                            <th class="min-w-125px">Karyawan</th>
                            <th class="min-w-125px">Periode</th>
                            <th class="min-w-110px">Jam</th>
                            @if (auth()->user()->id_role == 1 || auth()->user()->id_role == 2)
                            <th class="text-end min-w-110px">Aksi</th>
                            @endif
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold text-center">
                            @foreach ($employeeSch as $emp)
                            <!--begin::Table row-->
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/uploads/karyawan/foto-karyawan/' . $emp->employee->user->foto) }}" class="w-50px h-50px" alt="">
                                <br>
                                <b>Nama : </b> {{$emp->employee->nama_lengkap}}
                                <br>
                                <b>Divisi : </b> {{$emp->employee->division->nama_divisi}}
                                <br>
                                <b>Posisi : </b> {{$emp->employee->job_position->nama_posisi}}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::make($emp->schedule->periode_mulai)->isoFormat('DD MMMM YYYY') }}
                                s/d
                                {{ \Carbon\Carbon::make($emp->schedule->periode_selesai)->isoFormat('DD MMMM YYYY') }}
                            </td>
                            <td>
                                <b>Masuk : </b> {{ $emp->schedule->jam_masuk }}
                                <br>
                                <b>Pulang : </b> {{ $emp->schedule->jam_pulang }}
                            </td>
                            <td class="text-end">
                                <a href="{{ route('employee-schedule.edit', $emp->id) }}"
                                    class="btn btn-icon btn-warning btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-3">
                                    <i class="bi bi-pencil-square"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <a href="{{ route('employee-schedule.show', $emp->id) }}"
                                    class="btn btn-icon btn-info btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-3">
                                    <i class="bi bi-eye"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
                                <form class="d-inline"
                                    action="{{ route('employee-schedule.destroy', $emp->id) }}"
                                    method="post">
                                    @method('delete')
                                    @csrf
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
                table = document.querySelector('#kt_table_admin_employee_schedule');
    
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
@endsection