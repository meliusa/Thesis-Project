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
                        <li class="breadcrumb-item text-dark">Tambah Data</li>
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
                            <h3 class="fw-bolder m-0">Tambah Data</h3>
                        </div>
                        <!--end::Card title-->
                        <a href="{{ route('doc-minutes.index') }}" class="btn btn-light align-self-center">Kembali</a>
                    </div>
                    <!--begin::Content-->
                    <div class="collapse show">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('doc-minutes.store') }}" method="POST" id="formUtama">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Agenda Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select class="form-select form-select-lg" name="agenda_id"
                                            data-control="select2">
                                            <option value="" selected disabled>Pilih Agenda Rapat</option>
                                            @foreach ($submissionModules as $submissionModule)
                                            <option value="{{ $submissionModule->id }}">{{ $submissionModule->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Rangkaian Acara
                                        Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="events" class="form-control form-control-lg"
                                            placeholder="Rangkaian Acara Rapat" autocomplete="off" required rows="5"
                                            data-kt-autosize="true" wrap="soft"></textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Keputusan Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="decisions" class="form-control form-control-lg"
                                            placeholder="Keputusan Rapat" autocomplete="off" required rows="5"
                                            data-kt-autosize="true" wrap="soft"></textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Q&A Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <div id="repeater">
                                            <!-- Begin Form group -->
                                            <div class="form-group row mt-3 template-row">
                                                <div class="col-md-9">
                                                    <textarea name="asker[]" class="form-control form-control-lg mb-5"
                                                        placeholder="Penanya Rapat" autocomplete="off" required rows="1"
                                                        data-kt-autosize="true" wrap="soft"></textarea>
                                                    <textarea name="question[]"
                                                        class="form-control form-control-lg mb-5"
                                                        placeholder="Pertanyaan Rapat" autocomplete="off" required
                                                        rows="1" data-kt-autosize="true" wrap="soft"></textarea>
                                                    <textarea name="answer[]" class="form-control form-control-lg mb-5"
                                                        placeholder="Jawaban Rapat" autocomplete="off" required rows="1"
                                                        data-kt-autosize="true" wrap="soft"></textarea>
                                                    <div class="separator my-10"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-success btn-block mt-3 mt-md-0 addRow">
                                                        <i class="la la-plus"></i> Tambah
                                                    </a>
                                                    <!-- Tombol hapus hanya ditampilkan untuk input yang di-clone -->
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-danger btn-block mt-3 mt-md-0 deleteRow"
                                                        style="display: none;">
                                                        <i class="la la-trash-o"></i> Hapus
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Form group -->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
    $(document).ready(function () {
        // Handle click event to add new row
        $('#repeater').on('click', '.addRow', function () {
            var newItem = $(this).closest('.form-group.row').clone(); // Clone entire row
            newItem.find('textarea').val(''); // Clear textarea fields in cloned row
            newItem.find('.addRow').remove(); // Remove add button from cloned row
            newItem.find('.deleteRow').show(); // Show delete button for cloned row
            $(this).closest('.form-group.row').after(newItem); // Insert cloned row after current row
        });

        // Handle click event to delete row
        $('#repeater').on('click', '.deleteRow', function () {
            if ($('#repeater .form-group.row').length > 1) { // Ensure at least one row remains
                $(this).closest('.form-group.row').remove();
            }
        });
    });

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
