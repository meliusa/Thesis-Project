@extends('layouts.app')
@section('custom-css')
@endsection
@section('content')
<style>
    td:first-child, th:first-child{
        position: sticky;
        left: 0;
        z-index: 1;
        background-color: #fff;
    }
    td:nth-child(2), th:nth-child(2){
        position: sticky;
        left: 0;
        z-index: 1;
        background-color: #fff;
    }
</style>
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
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data KPI Kehadiran</h1>
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
                            <li class="breadcrumb-item text-muted">Key Performance Indicator</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-dark">Data Key Performance Indicator</li>
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
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_admin_kpi_attendance">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row for sticky karyawan column-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-50px sticky-col">No</th>
                                            <th class="min-w-100px sticky-col">Karyawan</th>
                                            <th class="min-w-100px">Januari</th>
                                            <th class="min-w-110px">Februari</th>
                                            <th class="min-w-100px">Maret</th>
                                            <th class="min-w-100px">April</th>
                                            <th class="min-w-100px">Mei</th>
                                            <th class="min-w-100px">Juni</th>
                                            <th class="min-w-100px">Juli</th>
                                            <th class="min-w-100px">Agustus</th>
                                            <th class="min-w-100px">September</th>
                                            <th class="min-w-100px">Oktober</th>
                                            <th class="min-w-100px">November</th>
                                            <th class="min-w-100px">Desember</th>
                                        </tr>
                                        <!--end::Table row for sticky karyawan column-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">
                                        @foreach ($employee as $key => $item)
                                        <!--begin::Table row-->
                                        <tr>
                                            <td class="text-center sticky-col">{{ $key+1 }}</td>
                                            <td class="text-center sticky-col">
                                                <img src="{{ asset('storage/uploads/karyawan/foto-karyawan/' . $item->user->foto) }}" class="w-50px h-50px" alt="">
                                                <br>
                                                <b>Nama : </b> {{$item->nama_lengkap}}
                                                <br>
                                                <b>Divisi : </b> {{$item->division->nama_divisi}}
                                                <br>
                                                <b>Posisi : </b> {{$item->job_position->nama_posisi}}
                                            </td>
                                            <!-- Repeat the column for each month -->
                                            <!-- For example, assuming there's attendance data for each month -->
                                            <td>Attendance Data Januari</td>
                                            <td>Attendance Data Februari</td>
                                            <!-- Continue for each month -->
                                        </tr>
                                        <!--end::Table row-->
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
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
                table = document.querySelector('#kt_datatable_admin_kpi_attendance');

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