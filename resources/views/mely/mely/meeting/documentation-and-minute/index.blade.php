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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dokumentasi dan Notulensi</h1>
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
                        <li class="breadcrumb-item text-dark">Dokumentasi dan Notulensi</li>
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
                                @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                                <a href="{{ route('doc-minutes.create') }}" type="button" class="btn btn-primary">
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
                                </a>
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
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_attendance_list">
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
                                @foreach ($docMinutes as $docMinute)
                                <!--begin::Table row-->
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('doc-minutes.details', $docMinute->id) }}"
                                            style="text-decoration: none; color: inherit;" class="text-hover-primary">
                                            @php
                                            $title = '';
                                            $id = '';
                                            foreach ($submissionModules as $submissionModule) {
                                            if ($docMinute->agenda_id == $submissionModule->id) {
                                            $title = $submissionModule->title;
                                            $id = $submissionModule->id;
                                            }
                                            }
                                            @endphp
                                            {{ $title }} ( ID : {{ $id }})
                                        </a>
                                    </td>
                                    <td>
                                        @php
                                        $statusResult = '';
                                        switch($docMinute->status) {
                                        case 'Baru Ditambahkan':
                                        $statusResult = 'secondary';
                                        break;
                                        case 'Telah Didistribusikan':
                                        $statusResult = 'primary';
                                        break;
                                        }
                                        @endphp
                                        <div class="badge badge-light-{{ $statusResult }} fw-bolder">
                                            {{ $docMinute->status }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($docMinute->updated_at)->format('d-m-Y H:i:s') }}
                                    </td>
                                    <td class="text-end">
                                        <a href="" class="btn btn-light btn-active-light-primary btn-sm"
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
                                                <a href="{{ route('doc-minutes.details', $docMinute->id) }}"
                                                    class="menu-link px-3">Detail</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('doc-minutes.edit', $docMinute->id) }}"
                                                    class="menu-link px-3 validasiupdate"
                                                    data-docminute-id="{{ $docMinute->id }}"
                                                    data-docminute-status="{{ $docMinute->status }}">Ubah Data</a>
                                                </button>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <form class="form-delete"
                                                    action="{{ route('doc-minutes.destroy', $docMinute->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="menu-link px-3 btn btn-sm validasidestroy"
                                                        type="submit" data-docminute-status="{{ $docMinute->status }}">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                                            <div class="menu-item px-3">
                                                <form class="form-update-status"
                                                    action="{{ route('doc-minutes.update-status', $docMinute->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="menu-link px-3 btn btn-sm validasiupdatestatus"
                                                        type="submit" data-docminute-status="{{ $docMinute->status }}">
                                                        Ubah Status
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                <!--end::Table row-->
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                        @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_1">
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
                        @endif
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
                        <tr>
                            <td>
                                <div class="badge badge-light-secondary fw-bolder">Baru Ditambahkan</div>
                            </td>
                            <td>:</td>
                            <td>Item baru ditambahkan ke dalam sistem polling.</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="badge badge-light-primary fw-bolder">Telah Didistribusikan</div>
                            </td>
                            <td>:</td>
                            <td>Rapat dan materi telah didistribusikan kepada peserta.</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

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
                table = document.querySelector('#kt_datatable_attendance_list');

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
        const form = $(this).closest("form");
        const docMinuteStatus = $(this).data('docminute-status');
        e.preventDefault();

        if (docMinuteStatus === 'Telah Didistribusikan') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data dengan status "Telah Didistribusikan" tidak dapat dihapus.',
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
        const docMinuteId = $(this).data('docminute-id');
        const docMinuteStatus = $(this).data('docminute-status');

        if (docMinuteStatus === 'Telah Didistribusikan') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data dengan status "Telah Didistribusikan" tidak dapat diubah.',
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
                        `/doc-minutes/${docMinuteId}/edit`; // Sesuaikan dengan URL edit yang sesuai
                }
            })
        }
    });

    $('.validasiupdatestatus').click(function (e) {
        e.preventDefault();
        const docMinuteStatus = $(this).data('docminute-status');

        const form = $(this).closest('form'); // Mendapatkan form terdekat

        if (docMinuteStatus === 'Baru Ditambahkan') {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan mengubah status dokumen ini. Tindakan ini tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ffc107',
                cancelButtonColor: '#adb5bd',
                confirmButtonText: 'Ubah',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit form jika dikonfirmasi
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Status "' + docMinuteStatus + '" tidak dapat diubah.',
            });
        }
    });

</script>
@endsection
