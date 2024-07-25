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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Detail Daftar Kehadiran</h1>
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
                        <li class="breadcrumb-item text-muted">Tindak Lanjut</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('attendance-lists.index') }}" class="text-muted text-hover-primary">Daftar
                                Kehadiran</a>
                        </li>
                        <!--end::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Detail Daftar Kehadiran</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
                    <div class="m-0">
                    </div>
                    <!--begin::Primary button-->
                    <a href="{{ URL::previous() }}" class="btn btn-light align-self-center">Kembali</a>
                    <!--end::Primary button-->
                </div>
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
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">
                                <a href="{{ route('submission-modules.details', $submissionModule->id) }}"
                                    style="text-decoration: none; color: inherit;" class="text-hover-primary">
                                    Agenda Rapat : {{ $submissionModule->title }} ( ID : {{ $submissionModule->id }})
                                </a>
                            </h3>
                        </div>
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->

                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Action-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-filter="search"
                                        class="form-control form-control w-250px ps-14" placeholder="Cari Data" />
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_presence">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-62.5px">No</th>
                                    <th class="min-w-125px">Partisipan</th>
                                    <th class="min-w-125px">Konfirmasi Email</th>
                                    <th class="min-w-125px">Presensi 1</th>
                                    <th class="min-w-125px">Presensi 2</th>
                                    <th class="min-w-125px">Penyebab Tidak Hadir</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @foreach ($meetingParticipants as $meetingParticipant)
                                <!--begin::Table row-->
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        @php
                                        $result = ''; // Inisialisasi variabel $result

                                        foreach ($users as $user) {
                                        if ($meetingParticipant->participant_id == $user->id) {
                                        $result = $user->nama; // Menggunakan assignment '=' bukan '=='
                                        break; // Menghentikan loop setelah ditemukan user yang sesuai
                                        }
                                        }
                                        @endphp

                                        {{ $result ? $result : 'Nama Tidak Ditemukan' }} (ID Partisipan:
                                        {{ $meetingParticipant->participant_id }})
                                    </td>
                                    <td>
                                        @php
                                        $confirmed_at = $meetingParticipant->confirmed_at ?
                                        \Carbon\Carbon::parse($meetingParticipant->confirmed_at)->format('d-m-Y H:i:s')
                                        : '-';
                                        @endphp
                                        {{ $confirmed_at }}
                                    </td>
                                    <td>@php
                                        $initial_absen_at = $meetingParticipant->initial_absen_at ?
                                        \Carbon\Carbon::parse($meetingParticipant->initial_absen_at)->format('d-m-Y
                                        H:i:s') : '-';
                                        @endphp
                                        {{ $initial_absen_at }}</td>
                                    <td>
                                        @php
                                        $final_absen_at = $meetingParticipant->final_absen_at ?
                                        \Carbon\Carbon::parse($meetingParticipant->final_absen_at)->format('d-m-Y
                                        H:i:s') : '-';
                                        @endphp
                                        {{ $final_absen_at }}
                                    </td>
                                    <td>
                                        @if($meetingParticipant->not_attending_reason)
                                        {{ $meetingParticipant->not_attending_reason }}
                                        @else
                                        @if(auth()->user()->id_role == 3 || auth()->user()->id_role == 4)
                                        <a href="#" class="btn btn-icon btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_not_attending_reason_{{ $submissionModule->id }}_{{ $meetingParticipant->participant_id }}"><i
                                                class="las la-plus fs-2 me-2"></i></a>
                                        @else
                                        -
                                        @endif
                                        @endif
                                    </td>
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

    @foreach ($meetingParticipants as $meetingParticipant)
    <div class="modal fade"
        id="kt_modal_not_attending_reason_{{ $submissionModule->id }}_{{ $meetingParticipant->participant_id }}"
        tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Form Tidak Hadir</h2>
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
                    <form id="kt_modal_not_attending_reason_form_{{ $submissionModule->id }}" class="form"
                        action="{{ route('meeting-participants.update-not-attending-reason', $submissionModule->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="participant_id" value="{{ $meetingParticipant->participant_id }}">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Alasan Tidak Hadir</label>
                                <textarea name="not_attending_reason" class="form-control form-control-lg"
                                    placeholder="Alasan Tidak Hadir" autocomplete="off" rows="5" data-kt-autosize="true"
                                    wrap="soft" required></textarea>
                            </div>
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
                table = document.querySelector('#kt_datatable_presence');

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
        KTDatatablesButtons.init();
    });

</script>
@endsection
