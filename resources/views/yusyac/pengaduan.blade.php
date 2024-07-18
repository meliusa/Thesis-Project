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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Pengaduan</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Support Center</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Pengaduan Ticket</li>
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
                <!--begin::Row-->
                <div class="row row-cols-2 row-cols-md-3 g-2 g-xl-4">
                    <div class="col-md-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil012.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
                                        <path
                                            d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z"
                                            fill="black" />
                                    </svg></span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $menunggu }}</div>
                                <div class="fw-bold fs-4 text-white">Ticket Menunggu</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-md-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil019.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
                                        <path
                                            d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM12 16.8C11 16.8 10.2 16.4 9.5 15.8C8.8 15.1 8.5 14.3 8.5 13.3C8.5 12.8 8.59999 12.3 8.79999 11.9L10 13.1V10.1C10 9.50001 9.6 9.10001 9 9.10001H6L7.29999 10.4C6.79999 11.3 6.5 12.2 6.5 13.3C6.5 14.8 7.10001 16.2 8.10001 17.2C9.10001 18.2 10.5 18.8 12 18.8C12.6 18.8 13 18.3 13 17.8C13 17.2 12.6 16.8 12 16.8ZM16.7 16.2C17.2 15.3 17.5 14.4 17.5 13.3C17.5 11.8 16.9 10.4 15.9 9.39999C14.9 8.39999 13.5 7.79999 12 7.79999C11.4 7.79999 11 8.19999 11 8.79999C11 9.39999 11.4 9.79999 12 9.79999C12.9 9.79999 13.8 10.2 14.5 10.8C15.2 11.5 15.5 12.3 15.5 13.3C15.5 13.8 15.4 14.3 15.2 14.7L14 13.5V16.5C14 17.1 14.4 17.5 15 17.5H18L16.7 16.2Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M12 16.8C11 16.8 10.2 16.4 9.5 15.8C8.8 15.1 8.5 14.3 8.5 13.3C8.5 12.8 8.59999 12.3 8.79999 11.9L7.29999 10.4C6.79999 11.3 6.5 12.2 6.5 13.3C6.5 14.8 7.10001 16.2 8.10001 17.2C9.10001 18.2 10.5 18.8 12 18.8C12.6 18.8 13 18.3 13 17.8C13 17.2 12.6 16.8 12 16.8Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M15.5 13.3C15.5 13.8 15.4 14.3 15.2 14.7L16.7 16.2C17.2 15.3 17.5 14.4 17.5 13.3C17.5 11.8 16.9 10.4 15.9 9.39999C14.9 8.39999 13.5 7.79999 12 7.79999C11.4 7.79999 11 8.19999 11 8.79999C11 9.39999 11.4 9.79999 12 9.79999C12.9 9.79999 13.8 10.2 14.5 10.8C15.1 11.5 15.5 12.4 15.5 13.3Z"
                                            fill="black" />
                                    </svg></span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $diproses }}</div>
                                <div class="fw-bold fs-4 text-white">Ticket Diproses</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-md-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil015.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
                                        <path opacity="0.3"
                                            d="M12 14.4L9.89999 16.5C9.69999 16.7 9.39999 16.8 9.19999 16.8C8.99999 16.8 8.7 16.7 8.5 16.5C8.1 16.1 8.1 15.5 8.5 15.1L10.6 13L12 14.4ZM13.4 13L15.5 10.9C15.9 10.5 15.9 9.90001 15.5 9.50001C15.1 9.10001 14.5 9.10001 14.1 9.50001L12 11.6L13.4 13Z"
                                            fill="black" />
                                        <path
                                            d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.2C9.7 3 10.2 3.20001 10.4 3.60001ZM13.4 13L15.5 10.9C15.9 10.5 15.9 9.9 15.5 9.5C15.1 9.1 14.5 9.1 14.1 9.5L12 11.6L9.89999 9.5C9.49999 9.1 8.9 9.1 8.5 9.5C8.1 9.9 8.1 10.5 8.5 10.9L10.6 13L8.5 15.1C8.1 15.5 8.1 16.1 8.5 16.5C8.7 16.7 9 16.8 9.2 16.8C9.4 16.8 9.69999 16.7 9.89999 16.5L12 14.4L14.1 16.5C14.3 16.7 14.6 16.8 14.8 16.8C15 16.8 15.3 16.7 15.5 16.5C15.9 16.1 15.9 15.5 15.5 15.1L13.4 13Z"
                                            fill="black" />
                                    </svg></span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $ditolak }}</div>
                                <div class="fw-bold fs-4 text-white">Ticket Ditolak</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-md-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil016.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
                                        <path opacity="0.3"
                                            d="M10.3 15.3L11 14.6L8.70002 12.3C8.30002 11.9 7.7 11.9 7.3 12.3C6.9 12.7 6.9 13.3 7.3 13.7L10.3 16.7C9.9 16.3 9.9 15.7 10.3 15.3Z"
                                            fill="black" />
                                        <path
                                            d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM11.7 16.7L16.7 11.7C17.1 11.3 17.1 10.7 16.7 10.3C16.3 9.89999 15.7 9.89999 15.3 10.3L11 14.6L8.70001 12.3C8.30001 11.9 7.69999 11.9 7.29999 12.3C6.89999 12.7 6.89999 13.3 7.29999 13.7L10.3 16.7C10.5 16.9 10.8 17 11 17C11.2 17 11.5 16.9 11.7 16.7Z"
                                            fill="black" />
                                    </svg></span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $selesai }}</div>
                                <div class="fw-bold fs-4 text-white">Ticket Selesai</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row g-2">
                    <div class="card shadow-sm">
                        <div class="card-header border-0 pt-6">
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
                                    class="form-control form-control w-250px ps-14" placeholder="Cari" />
                            </div>
                            <!--end::Search-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                @if (auth()->user()->id_role == 5)
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="btnModal"
                                        data-bs-target="#kt_modal_add_ticket">
                                        Create Ticket</button>
                                </div>
                                <!--end::Toolbar-->
                                @endif
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table table-row-bordered table-hover table-row-dashed fs-6 gy-5"
                                id="kt_datatable_ticket">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">No Ticket</th>
                                        <th class="min-w-125px">Subject Ticket</th>
                                        <th class="min-w-125px">Type Ticket</th>
                                        <th class="min-w-125px">Nama Pemohon</th>
                                        <th class="min-w-125px">Tanggal Diminta</th>
                                        <th class="min-w-125px">Diverifikasi</th>
                                        <th class="min-w-125px">Status</th>
                                        <th class="text-end min-w-100px">Action</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    @foreach ($pengaduan as $items)
                                    <!--begin::Table row-->
                                    <tr>
                                        <td>
                                            {{ $items->nomor_tiket }}
                                        </td>
                                        <!--begin::Type=-->
                                        <td>
                                            {{ $items->subjek_tiket }}
                                        </td>
                                        <!--end::Type=-->
                                        <!--begin::Type=-->
                                        <td>
                                            {{ $items->tipe_tiket->tipe_tiket}}
                                        </td>
                                        <!--end::Type=-->
                                        <!--begin::Duration=-->
                                        <td>
                                            {{ $items->employee->nama_lengkap}}
                                        </td>
                                        <!--end::Duration=-->
                                        <td>
                                            {{ $items->created_at }}
                                        </td>
                                        <td>
                                            {{  $items->admin->nama ?? ''  }}
                                        </td>
                                        <td>
                                            @if ($items->status === 'menunggu')
                                            <div class="badge badge-light-primary">Menunggu</div>
                                            @elseif($items->status === 'diproses')
                                            <div class="badge badge-light-warning">Diproses</div>
                                            @elseif($items->status === 'ditolak')
                                            <div class="badge badge-light-danger">Ditolak</div>
                                            @elseif($items->status === 'selesai')
                                            <div class="badge badge-light-success">Selesai</div>
                                            @endif
                                            {{-- <div class="badge badge-light-success">{{$items->status}}</div> --}}
                                        </td>
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            @if (auth()->user()->id_role == 5)
                                            @if ($items->status === 'menunggu')
                                            <a href="javascript:void(0)" class="btn btn-icon btn-warning btn-sm me-1"
                                                data-id="{{ $items->id}}" id="btn-edit"
                                                data-bs-target="#kt_modal_edit_ticket" data-bs-toggle="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <i class="bi bi-pencil-square"></i>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            @endif
                                            @endif
                                            <button href="javascript:void(0)" class="btn btn-icon btn-info btn-sm me-1"
                                                data-id="{{ $items->id}}" id="btn-show"
                                                data-bs-target="#kt_modal_show_ticket" data-bs-toggle="modal"
                                                type="button">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            @if (auth()->user()->id_role == 5)
                                            @if ($items->status === 'menunggu')
                                            <button data-id="{{ $items->id}}" id="btn-delete"
                                                class="btn btn-icon btn-danger btn-sm" type="button">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <i class="bi bi-trash"></i>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            @endif
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
                        <div class="card-footer">
                            <h3>Ticket Count : {{ count($pengaduan)}}</h3>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

    <!--begin::Modal - Create Ticket-->
    <div class="modal fade" id="kt_modal_add_ticket" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-labelledby="staticBackdrop">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Create Ticket</h2>
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
                    <form id="kt_modal_add_ticket" name="form" class="form" action="{{ route('pengaduan.store')}}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Scroll-->
                        <input type="hidden" name="id_employee" id="id_employee" value="">
                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Subject Ticket</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="subjek_tiket" class="form-control form-control mb-3 mb-lg-0"
                                    placeholder="Subject Ticket" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Subject Type</label>
                                <!--end::Label-->
                                <select class="form-select" data-control="select2"
                                    data-dropdown-parent="#kt_modal_add_ticket" data-allow-clear="true" name="id_tipe"
                                    data-placeholder="Select an option">
                                    <option></option>
                                    @foreach ($tipe as $items)
                                    <option value="{{ $items->id }}">{{$items->tipe_tiket}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Description Detail</label>
                                <!--end::Label-->
                                <textarea name="deskripsi" id="ckeditor"></textarea>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2">Upload Document</label>
                                <!--end::Label-->
                                <!--begin::Dropzone-->
                                <div class="dropzone dropzone-previews" id="uploadDocs">
                                    <!--begin::Message-->
                                    <div class="dz-message needsclick">
                                        <!--begin::Icon-->
                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                        <!--end::Icon-->

                                        <!--begin::Info-->
                                        <div class="ms-4">
                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to
                                                upload.</h3>
                                            <span class="fs-7 fw-bold text-gray-400">Upload Max
                                                Size 5MB. Upload File Extension .PDF .ZIP .RAR</span>
                                        </div>
                                        <input type="hidden" name="dokumen_pendukung" id="dokumen_pendukung">
                                        <!--end::Info-->
                                    </div>
                                </div>
                                <!--end::Dropzone-->
                                <span class="text-danger">*Jika upload Lebih Dari 1 File Gunakan .ZIP/.RAR</span>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Priority Ticket</label>
                                <!--end::Label-->
                                <div class="d-flex" data-kt-buttons="true">
                                    <div class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input" type="radio" value="minor" name="prioritas"
                                            id="minor" checked />
                                        <label class="form-check-label" for="minor">
                                            Minor
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input" type="radio" value="major" name="prioritas"
                                            id="major" />
                                        <label class="form-check-label" for="major">
                                            Major
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input" type="radio" value="critical" name="prioritas"
                                            id="critical" />
                                        <label class="form-check-label" for="critical">
                                            Critical
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-5">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" id="formSubmit">
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
    <!--end::Modal - Create Ticket-->

    <!--begin::Modal - Edit Ticket-->
    <div class="modal fade" id="kt_modal_edit_ticket" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-labelledby="staticBackdrop">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Update Ticket</h2>
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
                    <form id="kt_modal_edit_ticket" name="form" class="form" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <!--begin::Scroll-->
                        <input type="hidden" id="nomor_tiket" name="nomor_tiket" />
                        <input type="hidden" id="id_tiket" name="id_tiket" />

                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Subject Ticket</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="subjek_tiket" id="subjek_tiket"
                                    class="form-control form-control mb-3 mb-lg-0" placeholder="Subject Ticket" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Subject Type</label>
                                <!--end::Label-->
                                <select class="form-select" data-control="select2"
                                    data-dropdown-parent="#kt_modal_edit_ticket" data-allow-clear="true" name="id_tipe"
                                    id="id_tipe" data-placeholder="Select an option">
                                    {{-- <option></option> --}}
                                    @foreach ($tipe as $items)
                                    <option value="{{ $items->id }}">{{$items->tipe_tiket}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Description Detail</label>
                                <!--end::Label-->
                                <textarea name="deskripsi" id="edit-ckeditor"></textarea>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2">Upload Document</label>
                                <!--end::Label-->
                                <!--begin::Dropzone-->
                                <div class="dropzone dropzone-previews" id="uploadDocs-edit">
                                    <!--begin::Message-->
                                    <div class="dz-message needsclick">
                                        <!--begin::Icon-->
                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                        <!--end::Icon-->

                                        <!--begin::Info-->
                                        <div class="ms-4">
                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to
                                                upload.</h3>
                                            <span class="fs-7 fw-bold text-gray-400">Upload Max
                                                Size 5MB. Upload File Extension .PDF .ZIP .RAR</span>
                                        </div>
                                        <input type="hidden" id="dokumen_pendukung_edit"
                                            name="dokumen_pendukung_edit" />
                                        <!--end::Info-->
                                    </div>
                                </div>
                                <!--end::Dropzone-->
                                <span class="text-danger">*Jika upload Lebih Dari 1 File Gunakan .ZIP/.RAR</span>

                                {{-- <div id="existing-files" class="text-center">
                                    <a id="file_dokumen_pendukung" style="cursor: pointer"
                                        class="btn btn-sm btn-primary " download>Download File</a>
                                </div> --}}
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Priority Ticket</label>
                                <!--end::Label-->
                                <div class="d-flex" data-kt-buttons="true">
                                    <div class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input" type="radio" value="minor" name="prioritas"
                                            id="minor" checked />
                                        <label class="form-check-label" for="minor">
                                            Minor
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input" type="radio" value="major" name="prioritas"
                                            id="major" />
                                        <label class="form-check-label" for="major">
                                            Major
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input" type="radio" value="critical" name="prioritas"
                                            id="critical" />
                                        <label class="form-check-label" for="critical">
                                            Critical
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-5">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" id="updateForm" onclick="updateForm1()">
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
    <!--end::Modal - Edit Ticket-->

    <!--begin::Modal - Show Ticket-->
    <div class="modal fade" id="kt_modal_show_ticket" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-labelledby="staticBackdrop">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Details Ticket</h2>
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
                <div class="modal-body show-data scroll-y mx-5 mx-xl-15 my-7">
                    <input type="hidden" id="id_tiket" name="id_tiket" />
                </div>
                <!--end::Modal body-->
                <div class="modal-footer justify-content-center">
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Kembali</button>
                    </div>
                    <!--end::Actions-->
                </div>
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Show Ticket-->
</section>
@endsection
@section('custom-js')
<script>
    function updateForm1()
        {
            var id_tiket            = document.getElementById("id_tiket").value;
            //console.log('test');
            // let id_tiket = $(this).data('id');
            //define variable
            let subjek_tiket        = $('#subjek_tiket').val();
            let id_tipe             = $('#id_tipe').val();
            let deskripsi           = newEditor.getData();
            let dokumen_pendukung   = '';
            // Mendapatkan file yang diunggah
            let uploadedFiles       = uploadDocPengaduan.getAcceptedFiles();
            // Jika ada file yang diunggah
            if (uploadedFiles.length > 0) {
            // Jika ada file yang sudah diunggah sebelumnya
                if (dokumen_pendukung !== '') {
            // Hapus file yang sudah ada
                    let existingFile = { name: dokumen_pendukung, size: 12345 }; // Ganti dengan ukuran file yang sesuai
                    uploadDocPengaduan.removeFile(existingFile);
                }
            // Simpan file yang baru diunggah
            dokumen_pendukung       = $('#dokumen_pendukung_edit').val();
            }
            let prioritas           = $('input[name=prioritas]:checked').val();
            let csrf_token          = $('meta[name="csrf-token"]').attr('content');
            //ajax
            // var fd = new FormData();    
            // fd.append('file', input.files[0] );
            $.ajax({
                url: `pengaduan/update`,
                type: 'PUT',
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': csrf_token 
                },
                data: {
                    "id": id_tiket,
                    "subjek_tiket": subjek_tiket,
                    "id_tipe": id_tipe,
                    "deskripsi": deskripsi,
                    "dokumen_pendukung": dokumen_pendukung,
                    "prioritas" : prioritas
                },
                success: function(response) {
                //console.log(response);
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data updated successfully.',
                    showConfirmButton: false,
                    timer: 3000
                });
                window.location.href="{{route('pengaduan.index')}}?update=success";
                },
                error: function(xhr, status, error) {
                //console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to update data. Please try again later.',
                    showConfirmButton: false,
                    timer: 3000
                });
                }
            });
        }
</script>
<script>
    // Class definition
    var KTDatatablesButtons = function () {
        // Shared variables
        var table;
        var datatable;

        // Private functions
        var initDatatable = function () {
            datatable = $(table).DataTable({
                // 'lengthChange': false,
                'scrollX': true,
                'responsive': true,
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
                table = document.querySelector('#kt_datatable_ticket');

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
<script src="{{ asset ('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#ckeditor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
</script>
<script>
    Dropzone.autoDiscover = false;
    // Dropzone.options.demoform = false;	
    let token = $('meta[name="csrf-token"]').attr('content');

    var uploadDocPengaduan = new Dropzone("#uploadDocs", {
        url: "/pengaduan/store-image", // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 1,
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles: 'application/pdf,application/rar,application/zip',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        maxfilesexceeded: function(file) {
            this.removeAllFiles();
            this.addFile(file);
        },
        success: function(file, response) {
            if(response.status == 'success'){
                $('#dokumen_pendukung').val(response.name);
            }else{
                Swal.fire({
                    text: "Format file tidak sesuai!",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                }).then(function (result) {
                    if (result.isConfirmed) {
                        uploadDocPengaduan.removeFile(file);
                    }
                });	
            }
        },
        error: function(response) {
            console.log(response.status)
        }
    });
</script>
<script>
    var newEditor;

    ClassicEditor.create( document.querySelector( '#edit-ckeditor' ), { 
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
        }).then(editor => { 
            newEditor = editor;
        }).catch(error => {
            console.error(error);
    });
   
    var uploadDocPengaduan = new Dropzone("#uploadDocs-edit", {
        url: `pengaduan/store-image`, // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 1,
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles: 'application/pdf,application/rar,application/zip',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        maxfilesexceeded: function(file) {
            this.removeAllFiles();
            this.addFile(file);
        },
        success: function(file, response) {
            //$('#dokumen')
            if(response.status == 'success'){
                $('#dokumen_pendukung_edit').val(response.name);
            } else {
                Swal.fire({
                    text: "Format file tidak sesuai!",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                }).then(function (result) {
                    if (result.isConfirmed) {
                        uploadDocPengaduan.removeFile(file);
                    }
                });	
            }
        },
        error: function(response) {
            console.log(response.status)
        },
        sending: function(file, xhr, formData) {
            var nomor_tiket = document.getElementById("nomor_tiket").value;
            // Add custom data to the formData
            formData.append('nomor_tiket', nomor_tiket);
        }
    });

    $(document).on('click', '#btn-edit', function(e) {
        e.preventDefault();
        let id_tiket = $(this).data('id');
        $.ajax({
            url: `/pengaduan/${id_tiket}/edit`,
            method: 'GET',
            data: {
                id: id_tiket,
                _token: '{{ csrf_token() }}'
            },
            
            cache: false,
            success: function(response) {
                // Memeriksa apakah ada elemen dengan kelas 'dz-remove'
                var removeButtons = document.querySelectorAll('.dz-remove');
                if (removeButtons.length > 0) {
                    // Jika ada, maka lakukan pengklikan
                    removeButtons.forEach(function(element) {
                        element.click();
                    });
                } else {
                    // Jika tidak ada, tampilkan pesan atau lakukan tindakan lain yang sesuai
                    console.log("Tidak ada elemen dengan kelas 'dz-remove'.");
                }
                uploadDocPengaduan.fileDisplayed = false;
                $('#nomor_tiket').val(response.data.nomor_tiket);
                $('#id_tiket').val(response.data.id);
                $('#dokumen_pendukung_edit').val(response.data.dokumen_pendukung);
                // fill data to form
                $('#subjek_tiket').val(response.data.subjek_tiket);
                $('#id_tipe').empty();
                $.each(response.tipe, function(key, value) {
                    if (response.data.id_tipe == value.id) {
                        $('#id_tipe').val(value.id_tipe)
                    }
                        $('#id_tipe').append('<option value="' + value.id + '"' + ((response.data.id_tipe == value.id) ? 'selected' : '') + '>' + value.tipe_tiket + '</option>');
                    });
                $('#id_tipe').select2();
                if (newEditor) {
                    newEditor.setData(response.data.deskripsi);
                } else {
                    console.error('Editor is not initialized.');
                };

                if (response.data.dokumen_pendukung && uploadDocPengaduan) {
                    let mockFile = { name: response.data.dokumen_pendukung, size: 12345 };
                    if (!uploadDocPengaduan.fileDisplayed) {
                        uploadDocPengaduan.displayExistingFile(mockFile, response.file);
                        uploadDocPengaduan.fileDisplayed = true;
                    }
                } else {
                    console.error('Data is empty.');
                };

                $('input[name=prioritas][value=' + response.data.prioritas + ']').prop('checked', true);
                $('#kt_modal_edit_ticket').modal('show');
            }
        });

    });

    $(document).on('click', '#btn-delete', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Anda Tidak Dapat di Kembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#adb5bd',
            confirmButtonText: 'Hapus',
        }).then((result) => {
            if (result.isConfirmed) {
                let id_tiket = $(this).data('id');
            $.ajax({
            url: `/pengaduan/destroy`,
            method: 'DELETE',
            data: {
                id: id_tiket,
                _token: '{{ csrf_token() }}'
            },
            cache: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Deleted successfully.',
                    showConfirmButton: false,
                    timer: 3000
                });
                window.location.href="{{route('pengaduan.index')}}?delete=success";
            },
            error: function(xhr, status, error) {
                //console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to delete data. Please try again later.',
                    showConfirmButton: false,
                    timer: 3000
                });
                }
        });
            }
        })
    });

    $(document).on('click', '#btn-show', function(e) {
        e.preventDefault();
        let id_tiket = $(this).data('id');
        $.ajax({
            url: `pengaduan/` + id_tiket,
            method: 'GET',
            data: {
                id: id_tiket,
                _token: '{{ csrf_token() }}'
            },
            cache: false,
            success: function(response) {
            // Kosongkan isi modal sebelum menambahkan detail tiket
            $('.show-data').empty();
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Nomor Ticket</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="nomor_tiket"> : ' + response.data.nomor_tiket + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Nama Pemohon</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="nama_pemohon"> : ' + response.employee + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Tanggal Diminta</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="create_at"> : ' + response.data.created_at + '</span></div></div>');
            if (response.data.status != 'menunggu'){
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Disetujui Oleh</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="disetujui"> : ' + response.admin + '</span></div></div>');
            } else {
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Disetujui Oleh</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="disetujui"> : Menunggu Verifikasi</span></div></div>');
            }    
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Subject Ticket</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="subjek_tiket"> : ' + response.data.subjek_tiket + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Type Ticket</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="id_tipe"> : ' + response.tipe + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Deskripsi</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="deskripsi"> ' + response.data.deskripsi + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Document</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="dokumen_pendukung"> : ' + response.data.dokumen_pendukung + '</span></div></div>');
            if(response.data.status === 'menunggu') {
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Status</label><div class="col-lg-8 fv-row"><span class="badge badge-light-primary" id="status"> ' + response.data.status + '</span></div></div>');
            } else if(response.data.status === 'diproses'){
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Status</label><div class="col-lg-8 fv-row"><span class="badge badge-light-warning" id="status"> ' + response.data.status + '</span></div></div>');
            } else if(response.data.status === 'selesai') {
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Status</label><div class="col-lg-8 fv-row"><span class="badge badge-light-success" id="status"> ' + response.data.status + '</span></div></div>');
            } else {
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Status</label><div class="col-lg-8 fv-row"><span class="badge badge-light-danger" id="status"> ' + response.data.status + '</span></div></div>');
            }
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold">Prioritas</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="prioritas"> : ' + response.data.prioritas + '</span></div></div>');
            $('#kt_modal_show_ticket').modal('show');
            }
        });

    });

</script>
@endsection