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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Agenda Rapat</h1>
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
                        <li class="breadcrumb-item text-dark">Agenda Rapat</li>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                            transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-filter="search"
                                    class="form-control form-control w-250px ps-14" placeholder="Cari Data" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Add user-->
                                @if(auth()->user()->id_role == 2)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_agenda">
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
                                @endif
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
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_topic">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">No</th>
                                    <th class="min-w-125px">Agenda</th>
                                    <th class="min-w-125px">Tanggal dan Waktu</th>
                                    <th class="min-w-125px">Tipe</th>
                                    <th class="min-w-125px">Status</th>
                                    <th class="text-end min-w-100px">Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @foreach ($agendas as $agenda)
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Job=-->
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $agenda->topic->title }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($agenda->date)->format('d-m-Y') }}
                                        {{ \Carbon\Carbon::parse($agenda->time)->format('H:i:s') }}
                                    </td>
                                    <td>
                                        {{ $agenda->meeting_type }}
                                    </td>
                                    <td>
                                        @php
                                        $statusResult = '';
                                        switch($agenda->status) {
                                        case 'Diterima':
                                        $statusResult = 'success';
                                        break;
                                        case 'Menunggu Persetujuan':
                                        $statusResult = 'warning';
                                        break;
                                        case 'Ditolak':
                                        $statusResult = 'danger';
                                        break;
                                        case 'Dijadwalkan':
                                        $statusResult = 'warning';
                                        break;
                                        case 'Selesai':
                                        $statusResult = 'success';
                                        break;
                                        case 'Notula Tersedia':
                                        $statusResult = 'primary';
                                        break;
                                        default:
                                        $statusResult = 'primary';
                                        }
                                        @endphp
                                        <div class="badge badge-light-{{ $statusResult }} fw-bolder">
                                            {{ $agenda->status }}
                                        </div>
                                    </td>
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
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
                                                <a href="{{ route('agendas.details', $agenda->id) }}"
                                                    class="menu-link px-3">Detail</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->id_role == 2)
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 validasiupdate"
                                                    data-agenda-id="{{ $agenda->id }}"
                                                    data-agenda-status="{{ $agenda->status }}">Ubah</a>
                                                </button>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <form class="form-delete"
                                                    action="{{ route('agendas.destroy',$agenda->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="menu-link px-3 btn btn-sm validasidestroy"
                                                        type="submit" data-agenda-status="{{ $agenda->status }}">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if ($agenda->status == 'Menunggu Persetujuan' || $agenda->status ==
                                            'Ditolak')
                                            @if (auth()->user()->id_role == 1)
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 validasiupdatestatus"
                                                    data-agenda-id="{{ $agenda->id }}"
                                                    data-agenda-status="{{ $agenda->status }}">Status</a>
                                            </div>
                                            @endif
                                            @elseif($agenda->status == 'Diterima')
                                            @if (auth()->user()->id_role == 2)
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 validasiupdatestatus"
                                                    data-agenda-id="{{ $agenda->id }}"
                                                    data-agenda-status="{{ $agenda->status }}">Status</a>
                                            </div>
                                            @endif
                                            @elseif($agenda->status == 'Dijadwalkan' || $agenda->status == 'Selesai' ||
                                            $agenda->status == 'Notula Tersedia')
                                            @if (auth()->user()->id_role == 2 || auth()->user()->id_role == 3)
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 validasiupdatestatus"
                                                    data-agenda-id="{{ $agenda->id }}"
                                                    data-agenda-status="{{ $agenda->status }}">Status</a>
                                            </div>
                                            @endif
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
    <div class="modal fade" id="kt_modal_add_agenda" tabindex="-1" aria-hidden="true">
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
                    <form id="kt_modal_add_agenda_form" class="form" action="{{ route('agendas.store') }}"
                        method="POST">
                        @csrf
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Topik</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select" data-control="select2" data-placeholder=""
                                    data-allow-clear="true" data-dropdown-parent="#kt_modal_add_agenda_form"
                                    name="topic_id">
                                    <option selected disabled>Pilih Topik</option>
                                    @foreach ($topics as $topic)
                                    @if ($topic->status == "Diterima")
                                    <option value="{{ $topic->id }}">{{ $topic->title }} ( ID
                                        Topik :
                                        {{ $topic->id }} )</option>
                                    @endif
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-7">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Tanggal</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" class="form-control" placeholder="Tanggal" name="date"
                                    id="kt_datepicker_1" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Jam</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="time" class="form-control" placeholder="Jam" name="time"
                                    id="kt_datepicker_8" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group for Meeting Type-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <div class="mb-3">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-5 fw-bold">
                                    <span class="required">Tipe Pertemuan</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="'Daring' untuk 'Online' dan 'Tatap Muka' untuk
                                    'Offline'"></i>
                                </label>
                                <!--end::Label-->
                            </div>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="btn-group w-100 w-lg-50" data-kt-buttons="true"
                                data-kt-buttons-target="[data-kt-button]">
                                <!--begin::Radio-->
                                <label
                                    class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success"
                                    data-kt-button="true">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="meeting_type" value="Daring" />
                                    <!--end::Input-->
                                    Daring</label>
                                <!--end::Radio-->
                                <!--begin::Radio-->
                                <label
                                    class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success active"
                                    data-kt-button="true">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="meeting_type" checked="checked"
                                        value="Tatap Muka" />
                                    <!--end::Input-->
                                    Tatap Muka</label>
                                <!--end::Radio-->
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Tempat Pertemuan</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="meeting_address" class="form-control form-control mb-3 mb-lg-0"
                                placeholder="Tempat Pertemuan atau Link Platform Konferensi" autocomplete="off" required
                                rows="5" data-kt-autosize="true"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
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

    @foreach ($agendas as $agenda)
    <div class="modal fade" id="kt_modal_edit_agenda_{{ $agenda->id }}" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Ubah Data</h2>
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
                    <form id="kt_modal_edit_agenda_form_{{ $agenda->id }}" class="form"
                        action="{{ route('agendas.update', $agenda->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Topik</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control mb-3 mb-lg-0" required
                                    value="{{ $agenda->topic->title }} ( ID : {{ $agenda->topic->id }})" disabled />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-7">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Tanggal</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" class="form-control" placeholder="Tanggal" name="date"
                                    id="kt_datepicker_1" required value="{{ $agenda->date }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Jam</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="time" class="form-control" placeholder="Jam" name="time"
                                    id="kt_datepicker_8" required value="{{ $agenda->time }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group for Meeting Type-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <div class="mb-3">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-5 fw-bold">
                                    <span class="required">Tipe Pertemuan</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="'Daring' untuk 'Online' dan 'Tatap Muka' untuk
                                    'Offline'"></i>
                                </label>
                                <!--end::Label-->
                            </div>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="btn-group w-100 w-lg-50" data-kt-buttons="true"
                                data-kt-buttons-target="[data-kt-button]">
                                <!--begin::Radio-->
                                <label
                                    class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success {{ $agenda->meeting_type == 'Daring' ? 'active' : '' }}"
                                    data-kt-button="true">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="meeting_type" value="Daring"
                                        @if($agenda->meeting_type == 'Daring') checked @endif />
                                    <!--end::Input-->
                                    Daring
                                </label>
                                <!--end::Radio-->

                                <!--begin::Radio-->
                                <label
                                    class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success {{ $agenda->meeting_type == 'Tatap Muka' ? 'active' : '' }}"
                                    data-kt-button="true">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="meeting_type" value="Tatap Muka"
                                        @if($agenda->meeting_type == 'Tatap Muka') checked @endif />
                                    <!--end::Input-->
                                    Tatap Muka
                                </label>
                                <!--end::Radio-->
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Tempat Pertemuan</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="meeting_address" class="form-control form-control mb-3 mb-lg-0"
                                placeholder="Tempat Pertemuan atau Link Platform Konferensi" autocomplete="off" required
                                rows="5" data-kt-autosize="true">{{ $agenda->meeting_address }}</textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
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

    @foreach ($agendas as $agenda)
    <div class="modal fade" id="kt_modal_edit_status_agenda_{{ $agenda->id }}" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Ubah Data</h2>
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
                    <form id="kt_modal_edit_status_agenda_form_{{ $agenda->id }}" class="form"
                        action="{{ route('agendas.update-status', $agenda->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Status</label>
                                <select class="form-select form-select" data-control="" data-placeholder=""
                                    data-allow-clear="true"
                                    data-dropdown-parent="#kt_modal_edit_status_agenda_form_{{ $agenda->id }}"
                                    name="status">
                                    <option disabled>Pilih Status</option>
                                    @if($agenda->status == 'Menunggu Persetujuan')
                                    <option value="Diterima" {{ $agenda->status == 'Diterima' ? 'selected' : '' }}>
                                        Diterima</option>
                                    <option value="Ditolak" {{ $agenda->status == 'Ditolak' ? 'selected' : '' }}>Ditolak
                                    </option>
                                    @elseif($agenda->status == 'Diterima')
                                    <option value="Dijadwalkan"
                                        {{ $agenda->status == 'Dijadwalkan' ? 'selected' : '' }}>Dijadwalkan</option>
                                    <option value="Selesai" {{ $agenda->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                    <option value="Notula Tersedia"
                                        {{ $agenda->status == 'Notula Tersedia' ? 'selected' : '' }}>Notula Tersedia
                                    </option>
                                    @elseif($agenda->status == 'Dijadwalkan')
                                    <option value="Selesai" {{ $agenda->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                    <option value="Notula Tersedia"
                                        {{ $agenda->status == 'Notula Tersedia' ? 'selected' : '' }}>Notula Tersedia
                                    </option>
                                    @elseif($agenda->status == 'Selesai')
                                    <option value="Notula Tersedia"
                                        {{ $agenda->status == 'Notula Tersedia' ? 'selected' : '' }}>Notula Tersedia
                                    </option>
                                    @endif
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Alasan Penolakan</label>
                                <!--end::Label-->
                                <!--begin::Textarea-->
                                <textarea name="rejection_reason" class="form-control form-control mb-3 mb-lg-0"
                                    placeholder="Alasan Penolakan"
                                    autocomplete="off">{{ $agenda->rejection_reason }}</textarea>
                                <!--end::Textarea-->
                            </div>
                            <!--end::Input group-->
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
                table = document.querySelector('#kt_datatable_topic');

                if (!table) {
                    return;
                }

                initDatatable();
                handleSearchDatatable();
            }
        };
    }();

    // Reset form fields when the "Cancel" button is clicked
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function (event) {
            const form = this.querySelector('form');
            if (form) {
                form.reset();
            }
        });
    });

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesButtons.init();
    });

    $('.validasidestroy').click(function (e) {
        e.preventDefault();
        const form = $(this).closest("form");
        const agendaStatus = $(this).data('agenda-status');
        const notDeletableStatuses = ['Diterima', 'Dijadwalkan', 'Selesai', 'Notula Tersedia'];

        if (notDeletableStatuses.includes(agendaStatus)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Data dengan status "${agendaStatus}" tidak dapat dihapus.`,
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
                if (result.isConfirmed) form.submit();
            });
        }
    });

    $('.validasiupdate').click(function (e) {
        e.preventDefault();
        const agendaId = $(this).data('agenda-id');
        const agendaStatus = $(this).data('agenda-status');
        const notDeletableStatuses = ['Diterima', 'Dijadwalkan', 'Selesai', 'Notula Tersedia'];

        if (notDeletableStatuses.includes(agendaStatus)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Data dengan status "${agendaStatus}" tidak dapat diubah.`,
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
                    $('#kt_modal_edit_agenda_' + agendaId).modal('show');
                }
            });
        }
    });


    $('.validasiupdatestatus').click(function (e) {
        e.preventDefault();
        const agendaId = $(this).data('agenda-id');
        const agendaStatus = $(this).data('agenda-status');

        if (agendaStatus == 'Ditolak' || agendaStatus == 'Notula Tersedia') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Data dengan status "${agendaStatus}" tidak dapat diubah.`,
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
                    $('#kt_modal_edit_status_agenda_' + agendaId).modal('show');
                }
            })
        }
    });

</script>
@endsection
