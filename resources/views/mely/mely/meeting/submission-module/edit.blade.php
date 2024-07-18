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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Tambah Data</h1>
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
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('submission-modules.index') }}"
                                class="text-muted text-hover-primary">Modul Pengajuan</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Ubah Data</li>
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
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" aria-expanded="true">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Ubah Data</h3>
                        </div>
                        <!--end::Card title-->
                        <a href="{{ route('submission-modules.index') }}"
                            class="btn btn-light align-self-center">Kembali</a>
                    </div>
                    <!--begin::Content-->
                    <div class="collapse show">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('submission-modules.update', $submissionModule->id) }}"
                            method="POST" id="formUtama">
                            @csrf
                            @method('PUT')
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Pengaju Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="user_id" class="form-control form-control-lg"
                                            placeholder="Pengaju Rapat" autocomplete="off" required @php $nameResult=''
                                            ; @endphp @foreach ($users as $user) @if ($submissionModule->user_id ==
                                        $user->id)
                                        @php
                                        $nameResult = $user->nama;
                                        @endphp
                                        @endif
                                        @endforeach
                                        value="{{ $nameResult }} ( ID : {{ $submissionModule->user_id }} )" disabled />
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="separator my-10"></div>

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Judul Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="title" class="form-control form-control-lg"
                                            placeholder="Judul Rapat" autocomplete="off" required
                                            value="{{ $submissionModule->title }}" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Tujuan Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="purpose" class="form-control form-control-lg"
                                            placeholder="Tujuan Rapat" autocomplete="off" required
                                            value="{{ $submissionModule->purpose }}" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Agenda Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="agenda" class="form-control form-control-lg"
                                            placeholder="Agenda Rapat" autocomplete="off" required rows="5"
                                            data-kt-autosize="true"
                                            wrap="soft">{{ $submissionModule->agenda }}</textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-0">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Tanggal dan Waktu
                                        Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <div class="row g-9 mb-7">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Input-->
                                                <input type="date" class="form-control" placeholder="Tanggal Rapat"
                                                    name="date" id="kt_datepicker_1" required
                                                    value="{{ $submissionModule->date }}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Input-->
                                                <input type="time" class="form-control" placeholder="Waktu Rapat"
                                                    name="time" id="kt_datepicker_8" required
                                                    value="{{ $submissionModule->time }}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Durasi Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="duration" class="form-control form-control-lg"
                                            placeholder="Durasi Rapat" autocomplete="off" required
                                            value="{{ $submissionModule->duration }}" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Tipe Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <div class="btn-group w-100 w-lg-50" data-kt-buttons="true"
                                            data-kt-buttons-target="[data-kt-button]">
                                            <!--begin::Radio-->
                                            <label
                                                class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success {{ $submissionModule->type == 'Daring' ? 'active' : '' }}"
                                                data-kt-button="true">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="type" value="Daring"
                                                    @if($submissionModule->type == 'Daring') checked @endif />
                                                <!--end::Input-->
                                                Daring</label>
                                            <!--end::Radio-->
                                            <!--begin::Radio-->
                                            <label
                                                class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success active {{ $submissionModule->type == 'Tatap Muka' ? 'active' : '' }}"
                                                data-kt-button="true">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="type"
                                                    @if($submissionModule->type == 'Tatap Muka') checked @endif
                                                value="Tatap Muka" />
                                                <!--end::Input-->
                                                Tatap Muka</label>
                                            <!--end::Radio-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Lokasi Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="location" class="form-control form-control-lg"
                                            placeholder="Lokasi Rapat" autocomplete="off" required
                                            rows="5">{{ $submissionModule->location }}</textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Link Dokumen
                                        Pendukung Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="supporting_document" class="form-control form-control-lg"
                                            placeholder="Link Dokumen Pendukung Rapat" autocomplete="off" required
                                            rows="5">{{ $submissionModule->supporting_document }}</textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Nota Bene Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="postscript" class="form-control form-control-lg"
                                            placeholder="Nota Bene Rapat" autocomplete="off" required rows="5"
                                            data-kt-autosize="true"
                                            wrap="soft">{{ $submissionModule->postscript }}</textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="separator my-10"></div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Partisipan
                                        Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        @foreach ($meetingParticipants as $meetingParticipant)
                                        @php
                                        $nameResult = '';
                                        $roleNameResult = '';
                                        @endphp
                                        @foreach ($users as $user)
                                        @if ($meetingParticipant->participant_id == $user->id)
                                        @php
                                        $nameResult = $user->nama;
                                        @endphp
                                        @foreach ($roles as $role)
                                        @if ($user->id_role == $role->id)
                                        @php
                                        $roleNameResult = $role->nama_role;
                                        @endphp
                                        @endif
                                        @endforeach
                                        @endif
                                        @endforeach
                                        <label class="col-form-label fw-bold fs-6">
                                            - {{ $roleNameResult }}, {{ $nameResult }} ( ID :
                                            {{ $meetingParticipant->participant_id }} )
                                        </label>
                                        @endforeach
                                    </div>
                                    <!--end::Col-->
                                </div>

                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                                <button type="submit" class="btn btn-warning">Ubah</button>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
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
                table = document.querySelector('#kt_datatable_users');

                if (!table) {
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

    // Reset form fields when the "Cancel" button is clicked
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function (event) {
            const form = this.querySelector('form');
            if (form) {
                form.reset();
            }
        });
    });

</script>
@endsection
