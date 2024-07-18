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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Modul Pengajuan</h1>
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
                        <li class="breadcrumb-item text-dark">Modul Pengajuan</li>
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
                    <!--begin::Card body-->
                    <div class="card-body py-4">

                        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Modul
                                    Pengajuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Tindak Lanjut</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Dibatalkan</a>
                            </li>
                            {{-- <li class="nav-item ms-auto">
                                <!-- ms-auto untuk memindahkan ke kanan -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_submission_module">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                                transform="rotate(-90 11.364 20.364)" fill="black" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Tambah Data
                                </button>
                            </li> --}}
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
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
                                                <input type="text" data-kt-filter="search_tab1"
                                                    class="form-control form-control w-250px ps-14"
                                                    placeholder="Cari Data" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end">
                                                <!--begin::Add user-->
                                                <a href="{{ route('submission-modules.create') }}" type="button"
                                                    class="btn btn-primary">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                                height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                                                fill="black" />
                                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Tambah Data
                                                </a>
                                                <!--end::Add user-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body py-4">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                            id="kt_datatable_submission_module_tab1">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-62.5px">No</th>
                                                    <th class="min-w-125px">Judul Rapat</th>
                                                    <th class="min-w-125px">Status</th>
                                                    <th class="min-w-125px">Terakhir Diperbarui</th>
                                                    <th class="text-end min-w-125px">Aksi</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold">
                                                @foreach ($submissionModules_tab1 as $submissionModule_tab1)
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Job=-->
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td> <a href="{{ route('submission-modules.details', $submissionModule_tab1->id) }}"
                                                            style="text-decoration: none; color: inherit;"
                                                            class="text-hover-primary">
                                                            {{ $submissionModule_tab1->title }} ( ID :
                                                            {{ $submissionModule_tab1->id }})
                                                        </a></td>
                                                    <td>
                                                        @php
                                                        $statusResult = '';
                                                        switch($submissionModule_tab1->status) {
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
                                                        <div class="badge badge-light-{{ $statusResult }} fw-bolder">
                                                            {{ $submissionModule_tab1->status }}
                                                        </div>
                                                    </td>
                                                    <td> {{ \Carbon\Carbon::parse($submissionModule_tab1->updated_at)->format('d-m-Y H:i:s') }}
                                                    </td>

                                                    <!--begin::Action=-->
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-light btn-active-light-primary btn-sm"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">Aksi
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                            <span class="svg-icon svg-icon-5 m-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon--></a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="{{ route('submission-modules.details', $submissionModule_tab1->id) }}"
                                                                    class="menu-link px-3">Detail</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="{{ route('submission-modules.edit', $submissionModule_tab1->id) }}"
                                                                    class="menu-link px-3 validasiupdate"
                                                                    data-submissionmodule-id="{{ $submissionModule_tab1->id }}"
                                                                    data-submissionmodule-status="{{ $submissionModule_tab1->status }}">Ubah
                                                                    Data</a>
                                                                </button>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <form class="form-delete"
                                                                    action="{{ route('submission-modules.destroy', $submissionModule_tab1->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button
                                                                        class="menu-link px-3 btn btn-sm validasidestroy"
                                                                        type="submit"
                                                                        data-submissionmodule-status="{{ $submissionModule_tab1->status }}">
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3 validasiupdatestatus"
                                                                    data-submissionmodule-id="{{ $submissionModule_tab1->id }}"
                                                                    data-submissionmodule-status="{{ $submissionModule_tab1->status }}">Ubah
                                                                    Status</a>
                                                                </button>
                                                            </div>
                                                            @endif
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                    <!--end::Action=-->
                                                    <!--end::Job=-->
                                                </tr>
                                                <!--end::Table row-->
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#description_tab1">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <!-- Ganti path SVG dengan tanda seru -->
                                                    <path
                                                        d="M12 4C12.5523 4 13 4.44772 13 5V11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11V5C11 4.44772 11.4477 4 12 4Z"
                                                        fill="black" />
                                                    <path
                                                        d="M12 13C12.5523 13 13 13.4477 13 14V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V14C11 13.4477 11.4477 13 12 13Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Tampilkan Keterangan</button>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
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
                                                <input type="text" data-kt-filter="search_tab2"
                                                    class="form-control form-control w-250px ps-14"
                                                    placeholder="Cari Data" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body py-4">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                            id="kt_datatable_submission_module_tab2">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-62.5px">No</th>
                                                    <th class="min-w-125px">Judul Rapat</th>
                                                    <th class="min-w-125px">Status</th>
                                                    <th class="min-w-125px">Terakhir Diperbarui</th>
                                                    <th class="text-end min-w-125px">Aksi</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold">
                                                @foreach ($submissionModules_tab2 as $submissionModule_tab2)
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Job=-->
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td> <a href="{{ route('submission-modules.details', $submissionModule_tab2->id) }}"
                                                            style="text-decoration: none; color: inherit;"
                                                            class="text-hover-primary">
                                                            {{ $submissionModule_tab2->title }} ( ID :
                                                            {{ $submissionModule_tab2->id }})
                                                        </a></td>
                                                    <td>
                                                        @php
                                                        $statusResult = '';
                                                        switch($submissionModule_tab2->status) {
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
                                                        <div class="badge badge-light-{{ $statusResult }} fw-bolder">
                                                            {{ $submissionModule_tab2->status }}
                                                        </div>
                                                    </td>
                                                    <td> {{ \Carbon\Carbon::parse($submissionModule_tab2->updated_at)->format('d-m-Y H:i:s') }}
                                                    </td>

                                                    <!--begin::Action=-->
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-light btn-active-light-primary btn-sm"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">Aksi
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                            <span class="svg-icon svg-icon-5 m-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon--></a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="{{ route('submission-modules.details', $submissionModule_tab2->id) }}"
                                                                    class="menu-link px-3">Detail</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3 validasiupdatestatus"
                                                                    data-submissionmodule-id="{{ $submissionModule_tab2->id }}"
                                                                    data-submissionmodule-status="{{ $submissionModule_tab2->status }}">Ubah
                                                                    Status</a>
                                                                </button>
                                                            </div>
                                                            @endif
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                    <!--end::Action=-->
                                                    <!--end::Job=-->
                                                </tr>
                                                <!--end::Table row-->
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#description_tab2">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <!-- Ganti path SVG dengan tanda seru -->
                                                    <path
                                                        d="M12 4C12.5523 4 13 4.44772 13 5V11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11V5C11 4.44772 11.4477 4 12 4Z"
                                                        fill="black" />
                                                    <path
                                                        d="M12 13C12.5523 13 13 13.4477 13 14V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V14C11 13.4477 11.4477 13 12 13Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Tampilkan Keterangan</button>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>

                            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
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
                                                <input type="text" data-kt-filter="search_tab3"
                                                    class="form-control form-control w-250px ps-14"
                                                    placeholder="Cari Data" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body py-4">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                            id="kt_datatable_submission_module_tab3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-62.5px">No</th>
                                                    <th class="min-w-125px">Judul Rapat</th>
                                                    <th class="min-w-125px">Status</th>
                                                    <th class="min-w-125px">Terakhir Diperbarui</th>
                                                    <th class="text-end min-w-125px">Aksi</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold">
                                                @foreach ($submissionModules_tab3 as $submissionModule_tab3)
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Job=-->
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td> <a href="{{ route('submission-modules.details', $submissionModule_tab3->id) }}"
                                                            style="text-decoration: none; color: inherit;"
                                                            class="text-hover-primary">
                                                            {{ $submissionModule_tab3->title }} ( ID :
                                                            {{ $submissionModule_tab3->id }})
                                                        </a></td>
                                                    <td>
                                                        @php
                                                        $statusResult = '';
                                                        switch($submissionModule_tab3->status) {
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
                                                        <div class="badge badge-light-{{ $statusResult }} fw-bolder">
                                                            {{ $submissionModule_tab3->status }}
                                                        </div>
                                                    </td>
                                                    <td> {{ \Carbon\Carbon::parse($submissionModule_tab3->updated_at)->format('d-m-Y H:i:s') }}
                                                    </td>

                                                    <!--begin::Action=-->
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-light btn-active-light-primary btn-sm"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">Aksi
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                            <span class="svg-icon svg-icon-5 m-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon--></a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="{{ route('submission-modules.details', $submissionModule_tab3->id) }}"
                                                                    class="menu-link px-3">Detail</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                    <!--end::Action=-->
                                                    <!--end::Job=-->
                                                </tr>
                                                <!--end::Table row-->
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#description_tab3">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <!-- Ganti path SVG dengan tanda seru -->
                                                    <path
                                                        d="M12 4C12.5523 4 13 4.44772 13 5V11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11V5C11 4.44772 11.4477 4 12 4Z"
                                                        fill="black" />
                                                    <path
                                                        d="M12 13C12.5523 13 13 13.4477 13 14V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V14C11 13.4477 11.4477 13 12 13Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Tampilkan Keterangan</button>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                        </div>
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

    <div class="modal fade" tabindex="-1" id="description_tab1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Keterangan</h5>
                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-auto"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <!-- Icon close, bisa diganti dengan icon close yang sesuai -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <div class="badge badge-light-secondary fw-bolder">Baru Ditambahkan</div>
                            </td>
                            <td>:</td>
                            <td>Rapat ini baru saja ditambahkan ke dalam sistem dan belum mengalami proses
                                persetujuan atau distribusi undangan.</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="badge badge-light-warning fw-bolder">Proses Persetujuan</div>
                            </td>
                            <td>:</td>
                            <td>Sedang dalam proses untuk mendapatkan persetujuan dari pihak terkait.</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="badge badge-light-success fw-bolder">Sudah Disetujui</div>
                            </td>
                            <td>:</td>
                            <td>Telah mendapatkan persetujuan dari pihak terkait.</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="description_tab2">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Keterangan</h5>
                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-auto"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <!-- Icon close, bisa diganti dengan icon close yang sesuai -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <div class="badge badge-light-primary fw-bolder">Undangan Didistribusikan</div>
                            </td>
                            <td>:</td>
                            <td>Undangan untuk rapat sudah didistribusikan kepada peserta rapat.</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="badge badge-light-success fw-bolder">Telah Dilaksanakan</div>
                            </td>
                            <td>:</td>
                            <td>Rapat atau kegiatan sudah dilaksanakan sesuai jadwal yang telah ditentukan.</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="badge badge-light-info fw-bolder">Notula Tersedia</div>
                            </td>
                            <td>:</td>
                            <td>Notula atau ringkasan hasil rapat sudah tersedia untuk dilihat atau didistribusikan.
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="description_tab3">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Keterangan</h5>
                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-auto"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <!-- Icon close, bisa diganti dengan icon close yang sesuai -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <div class="badge badge-light-danger fw-bolder">Batal Dilaksanakan</div>
                            </td>
                            <td>:</td>
                            <td>Rapat atau kegiatan batal dilaksanakan sesuai jadwal yang telah ditentukan.</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    @foreach ($submissionModules as $submissionModule)
    <div class="modal fade" id="kt_modal_edit_status_submission_module_{{ $submissionModule->id }}" tabindex="-1"
        aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Ubah Status</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" type="button" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
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
                    <form id="kt_modal_edit_status_submission_module_form_{{ $submissionModule->id }}" class="form"
                        action="{{ route('submission-modules.update-status', $submissionModule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Status</label>
                                <select class="form-select form-select" data-control="" data-placeholder=""
                                    data-allow-clear="true"
                                    data-dropdown-parent="#kt_modal_edit_status_submission_module_form_{{ $submissionModule->id }}"
                                    name="status">
                                    <option disabled>Pilih Status</option>
                                    @if($submissionModule->status == 'Baru Ditambahkan')
                                    <option value="Proses Persetujuan"
                                        {{ $submissionModule->status == 'Proses Persetujuan' ? 'selected' : '' }}>
                                        Proses Persetujuan</option>

                                    @elseif($submissionModule->status == 'Proses Persetujuan')
                                    <option value="Sudah Disetujui"
                                        {{ $submissionModule->status == 'Sudah Disetujui' ? 'selected' : '' }}>Sudah
                                        Disetujui</option>

                                    @elseif($submissionModule->status == 'Sudah Disetujui')
                                    <option value="Undangan Didistribusikan"
                                        {{ $submissionModule->status == 'Undangan Didistribusikan' ? 'selected' : '' }}>
                                        Undangan Didistribusikan
                                    </option>

                                    @elseif($submissionModule->status == 'Undangan Didistribusikan')
                                    <option value="Telah Dilaksanakan"
                                        {{ $submissionModule->status == 'Telah Dilaksanakan' ? 'selected' : '' }}>Telah
                                        Dilaksanakan
                                    </option>
                                    <option value="Dibatalkan"
                                        {{ $submissionModule->status == 'Dibatalkan' ? 'selected' : '' }}>
                                        Dibatalkan</option>
                                    @endif
                                </select>
                            </div>
                            <!--end::Input group-->
                            @if ($submissionModule->status == 'Undangan Didistribusikan')
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Alasan Dibatalkan</label>
                                <textarea name="reason_cancelled" class="form-control form-control-lg"
                                    placeholder="Alasan Dibatalkan" autocomplete="off" rows="5"
                                    data-kt-autosize="true" wrap="soft"></textarea>
                            </div>
                            @endif
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning">
                                <span class="indicator-label">Ubah</span>
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
    @endforeach

</section>
@endsection
@section('custom-js')
<script>
    // Class definition
    var KTDatatablesButtons_tab1 = function () {
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
            const filterSearch = document.querySelector('[data-kt-filter="search_tab1"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        // Public methods
        return {
            init: function () {
                table = document.querySelector('#kt_datatable_submission_module_tab1');

                if (!table) {
                    return;
                }

                initDatatable();
                handleSearchDatatable();
            }
        };
    }();

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesButtons_tab1.init();
    });

    var KTDatatablesButtons_tab2 = function () {
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
            const filterSearch = document.querySelector('[data-kt-filter="search_tab2"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        // Public methods
        return {
            init: function () {
                table = document.querySelector('#kt_datatable_submission_module_tab2');

                if (!table) {
                    return;
                }

                initDatatable();
                handleSearchDatatable();
            }
        };
    }();

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesButtons_tab2.init();
    });

    var KTDatatablesButtons_tab3 = function () {
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
            const filterSearch = document.querySelector('[data-kt-filter="search_tab3"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        // Public methods
        return {
            init: function () {
                table = document.querySelector('#kt_datatable_submission_module_tab3');

                if (!table) {
                    return;
                }

                initDatatable();
                handleSearchDatatable();
            }
        };
    }();

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesButtons_tab3.init();
    });


    // Reset form fields when the "Cancel" button is clicked
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function (event) {
            const form = this.querySelector('form');
            if (form) {
                form.reset();
            }
        });
    });


    $('.validasidestroy').click(function (e) {
        const form = $(this).closest("form");
        const submissionModuleStatus = $(this).data('submissionmodule-status');
        e.preventDefault();

        const disallowedStatuses = [
            'Proses Persetujuan',
            'Sudah Disetujui',
            'Undangan Didistribusikan',
            'Telah Dilaksanakan',
            'Notula Tersedia',
            'Dibatalkan'
        ];

        if (disallowedStatuses.includes(submissionModuleStatus)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Data dengan status ${submissionModuleStatus} tidak dapat dihapus.`,
            });
        } else {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan menghapus data ini. Tindakan ini tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#adb5bd',
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    });

    $('.validasiupdate').click(function (e) {
        e.preventDefault();
        const submissionModuleId = $(this).data('submissionmodule-id');
        const submissionModuleStatus = $(this).data('submissionmodule-status');

        const disallowedStatuses = [
            'Proses Persetujuan',
            'Sudah Disetujui',
            'Undangan Didistribusikan',
            'Telah Dilaksanakan',
            'Notula Tersedia',
        ];

        if (disallowedStatuses.includes(submissionModuleStatus)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Data dengan status ${submissionModuleStatus} tidak dapat diubah.`,
            });
        } else {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan mengubah data ini. Tindakan ini tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ffc107',
                cancelButtonColor: '#adb5bd',
                confirmButtonText: 'Ubah',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to edit page
                    window.location.href =
                        `/submission-modules/${submissionModuleId}/edit`; // Sesuaikan dengan URL edit yang sesuai
                }
            })
        }
    });

    $('.validasiupdatestatus').click(function (e) {
        e.preventDefault();

        const submissionModuleId = $(this).data('submissionmodule-id');
        const submissionModuleStatus = $(this).data('submissionmodule-status');

        // Daftar status yang dapat diubah
        const changableStatuses = [
            'Baru Ditambahkan',
            'Sudah Disetujui',
            'Proses Persetujuan',
            'Undangan Didistribusikan',
        ];

        // Memeriksa apakah status ada di dalam daftar yang dapat diubah
        if (changableStatuses.includes(submissionModuleStatus)) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan mengubah data ini. Tindakan ini tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ffc107',
                cancelButtonColor: '#adb5bd',
                confirmButtonText: 'Ubah',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#kt_modal_edit_status_submission_module_' + submissionModuleId).modal('show');
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Status "' + submissionModuleStatus + '" tidak dapat diubah.',
            });
        }
    });

</script>
@endsection
