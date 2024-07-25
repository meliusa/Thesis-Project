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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Polling Keputusan</h1>
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
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Polling Keputusan</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Post-->
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
                            <input type="text" data-kt-filter="search" class="form-control form-control w-250px ps-14"
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
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_topic"> --}}
                            @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                            <a href="{{ route('pollings.create') }}" type="button" class="btn btn-primary">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                            transform="rotate(-90 11.364 20.364)" fill="black" />
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Tambah Data</a>
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_polling">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-62.5px">No</th>
                                <th class="min-w-125px">Agenda</th>
                                <th class="min-w-125px">Status</th>
                                <th class="min-w-125px">Tanggal Pembuatan</th>
                                <th class="min-w-125px">Tanggal Diperbarui</th>
                                <th class="text-end min-w-100px">Aksi</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold">
                            @foreach ($pollings as $polling)
                            <!--begin::Table row-->
                            <tr>
                                <!--begin::Job=-->
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <a href="{{ route('pollings.show-polling', $polling->id) }}"
                                        class="text-hover-primary validasivoting"
                                        style="text-decoration: none; color: inherit;"
                                        data-polling-status="{{ $polling->status }}">

                                        @php
                                        $title = '';
                                        $id = '';
                                        $submissionModule = $submissionModules->firstWhere('id', $polling->agenda_id);
                                        if ($submissionModule) {
                                        $title = $submissionModule->title;
                                        $id = $submissionModule->id;
                                        }
                                        @endphp

                                        {{ $title }} ( ID : {{ $id }})
                                    </a>
                                </td>
                                <td>
                                    @php
                                    $statusResult = '';
                                    switch($polling->status) {
                                    case 'Baru Ditambahkan':
                                    $statusResult = 'secondary';
                                    break;
                                    case 'Selesai':
                                    $statusResult = 'success';
                                    break;
                                    case 'Proses':
                                    $statusResult = 'warning';
                                    break;
                                    default:
                                    $statusResult = 'primary';
                                    }
                                    @endphp
                                    <div class="badge badge-light-{{ $statusResult }} fw-bolder">
                                        {{ $polling->status }}
                                    </div>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($polling->created_at)->format('d-m-Y H:i:s') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($polling->updated_at)->format('d-m-Y H:i:s') }}
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
                                            <a href="{{ route('pollings.show-polling', $polling->id) }}"
                                                class="menu-link px-3 validasivoting"
                                                data-polling-status="{{ $polling->status }}">Voting</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                                        <div class="menu-item px-3">
                                            <a href="{{ route('pollings.edit', $polling->id) }}"
                                                class="menu-link px-3 validasiupdate"
                                                data-polling-id="{{ $polling->id }}"
                                                data-polling-status="{{ $polling->status }}">Ubah Data</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <form class="form-delete"
                                                action="{{ route('pollings.destroy', $polling->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="menu-link px-3 btn btn-sm validasidestroy" type="submit"
                                                    data-polling-status="{{ $polling->status }}">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('pollings.update-status', $polling->id) }}"
                                                class="menu-link px-3 validasiupdatestatus"
                                                data-polling-id="{{ $polling->id }}"
                                                data-polling-status="{{ $polling->status }}">Ubah Status</a>
                                            </button>
                                        </div>
                                        @endif
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('pollings.show-chart', $polling->id) }}"
                                                class="menu-link px-3 " data-polling-id="#"
                                                data-polling-status="#">Chart</a>
                                            </button>
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
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
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
        <!--end::Container-->
    </div>
    <!--end::Post-->
    </div>
    <!--end::Content-->

    <div class="modal fade" tabindex="-1" id="kt_modal_1">
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
                        @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                        <tr>
                            <td>
                                <div class="badge badge-light-secondary fw-bolder">Baru Ditambahkan</div>
                            </td>
                            <td>:</td>
                            <td>Item baru ditambahkan ke dalam sistem polling.</td>
                        </tr>
                        @endif
                        <tr>
                            <td>
                                <div class="badge badge-light-warning fw-bolder">Proses</div>
                            </td>
                            <td>:</td>
                            <td>Item sedang dalam proses atau tahap aktif untuk diproses lebih lanjut.</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="badge badge-light-success fw-bolder">Selesai</div>
                            </td>
                            <td>:</td>
                            <td>Item telah selesai diproses atau mencapai tahap akhir dalam siklusnya.</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    @foreach ($pollings as $polling)
    <div class="modal fade" id="kt_modal_edit_status_polling_{{ $polling->id }}" tabindex="-1" aria-hidden="true">
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
                    <form id="kt_modal_edit_status_polling_form_{{ $polling->id }}" class="form"
                        action="{{ route('pollings.update-status', $polling->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Status</label>
                                <select class="form-select form-select" data-control="" data-placeholder=""
                                    data-allow-clear="true"
                                    data-dropdown-parent="#kt_modal_edit_status_meeting_request_form" name="status">
                                    <option disabled>Pilih Status</option>
                                    @if($polling->status == 'Baru Ditambahkan')
                                    <option value="Proses" {{ $polling->status == 'Proses' ? 'selected' : '' }}>
                                        Proses
                                    </option>
                                    @endif
                                    @if($polling->status == 'Proses')
                                    <option value="Selesai" {{ $polling->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                    @endif
                                    @if($polling->status == 'Selesai')
                                    <option value="Proses" {{ $polling->status == 'Proses' ? 'selected' : '' }}>
                                        Proses
                                    </option>
                                    <option value="Selesai" {{ $polling->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                    @endif
                                </select>
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
                table = document.querySelector('#kt_datatable_polling');

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

    $('.validasivoting').click(function (e) {
        e.preventDefault();
        const pollingStatus = $(this).data('polling-status');
        const notDeletableStatuses = ['Selesai'];

        if (pollingStatus === 'Baru Ditambahkan') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Saat ini belum waktunya untuk memulai proses pemungutan suara.',
            });
        } else if (notDeletableStatuses.includes(pollingStatus)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Voting telah selesai dilaksanakan.',
            });
        } else {
            window.location.href = $(this).attr(
                'href'); // Mengarahkan ke halaman edit dengan mengambil href dari tautan
        }
    });

    $('.validasidestroy').click(function (e) {
        e.preventDefault();
        const form = $(this).closest("form");
        const pollingStatus = $(this).data('polling-status');
        const notDeletableStatuses = ['Proses', 'Selesai'];

        if (notDeletableStatuses.includes(pollingStatus)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Data dengan status "${pollingStatus}" tidak dapat dihapus.`,
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
        const pollingId = $(this).data('polling-id');
        const pollingStatus = $(this).data('polling-status');
        const notDeletableStatuses = ['Proses', 'Selesai'];

        if (notDeletableStatuses.includes(pollingStatus)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Data dengan status "${pollingStatus}" tidak dapat diubah.`,
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
                    window.location.href = $(this).attr(
                        'href'); // Mengarahkan ke halaman edit dengan mengambil href dari tautan
                }
            })
        }
    });


    $('.validasiupdatestatus').click(function (e) {
        e.preventDefault();
        const pollingId = $(this).data('polling-id');
        const pollingStatus = $(this).data('polling-status');

        if (pollingStatus == 'asd') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Data dengan status "${pollingStatus}" tidak dapat diubah.`,
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
                    $('#kt_modal_edit_status_polling_' + pollingId).modal('show');
                }
            })
        }
    });

</script>
@endsection
