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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Ubah Data</h1>
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
                        <a href="{{ route('doc-minutes.index') }}" class="btn btn-light align-self-center">Kembali</a>
                    </div>
                    <!--begin::Content-->
                    <div class="collapse show">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('doc-minutes.update', $docMinute->id) }}" method="POST"
                            id="formUtama">
                            @csrf
                            @method('PUT')
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Agenda Rapat</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        @php
                                        $nameResult = '';
                                        foreach ($submissionModules as $submissionModule) {
                                        if ($docMinute->agenda_id == $submissionModule->id) {
                                        $nameResult = $submissionModule->title;
                                        break; // Optional: Keluar dari loop setelah menemukan match
                                        }
                                        }
                                        @endphp
                                        <label class="col-form-label fw-bold fs-6">{{ $nameResult }} (ID : {{ $docMinute->agenda_id }})</label>
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
                                            data-kt-autosize="true" wrap="soft">{{ $docMinute->events }}</textarea>
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
                                            data-kt-autosize="true" wrap="soft">{{ $docMinute->decisions }}</textarea>
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
                                            @foreach($docMinuteQnaDetails as $index => $qnaDetail)
                                            <div class="form-group row mt-3">
                                                <div class="col-md-9">
                                                    <textarea name="asker[]" class="form-control form-control-lg mb-5"
                                                        placeholder="Penanya Rapat" autocomplete="off" required rows="1"
                                                        data-kt-autosize="true"
                                                        wrap="soft">{{ $qnaDetail->asker }}</textarea>
                                                    <textarea name="question[]"
                                                        class="form-control form-control-lg mb-5"
                                                        placeholder="Pertanyaan Rapat" autocomplete="off" required
                                                        rows="1" data-kt-autosize="true"
                                                        wrap="soft">{{ $qnaDetail->question }}</textarea>
                                                    <textarea name="answer[]" class="form-control form-control-lg mb-5"
                                                        placeholder="Jawaban Rapat" autocomplete="off" required rows="1"
                                                        data-kt-autosize="true"
                                                        wrap="soft">{{ $qnaDetail->answer }}</textarea>
                                                    <div class="separator my-10"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    @if ($index === 0)
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-success btn-block mt-3 mt-md-0 addRow">
                                                        <i class="la la-plus"></i> Tambah
                                                    </a>
                                                    @else
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-danger btn-block mt-3 mt-md-0 deleteRow">
                                                        <i class="la la-trash-o"></i> Hapus
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- End Form group -->
                                            <!-- Template for new options -->
                                            <div class="form-group row mt-3 template-row" style="display: none;">
                                                <div class="col-md-9">
                                                    <textarea name="asker[]" class="form-control form-control-lg mb-5"
                                                        placeholder="Penanya Rapat" autocomplete="off" required rows="1"
                                                        data-kt-autosize="true" wrap="soft">auto_delete</textarea>
                                                    <textarea name="question[]"
                                                        class="form-control form-control-lg mb-5"
                                                        placeholder="Pertanyaan Rapat" autocomplete="off" required
                                                        rows="1" data-kt-autosize="true" wrap="soft">auto_delete</textarea>
                                                    <textarea name="answer[]" class="form-control form-control-lg mb-5"
                                                        placeholder="Jawaban Rapat" autocomplete="off" required rows="1"
                                                        data-kt-autosize="true" wrap="soft">auto_delete</textarea>
                                                    <div class="separator my-10"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-success btn-block mt-3 mt-md-0 addRow">
                                                        <i class="la la-plus"></i>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-danger btn-block mt-3 mt-md-0 deleteRow"
                                                        style="display: none;">
                                                        <i class="la la-trash-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--end::Repeater-->
                                        </div>
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
    $(document).ready(function () {
        // Menangani klik untuk menambah baris baru
        $('#kt_content_container').on('click', '.addRow', function () {
            var newItem = $('.template-row').clone().removeClass('template-row').removeAttr(
                'style'); // Kloning baris template
            newItem.find('textarea').val(''); // Mengosongkan input field
            newItem.find('.addRow').remove(); // Menghapus tombol tambah dari baris yang dikloning
            newItem.find('.deleteRow').show(); // Menampilkan tombol hapus untuk baris yang dikloning
            $(this).closest('.form-group.row').after(
                newItem); // Memasukkan baris yang dikloning setelah baris saat ini
        });

        // Menangani klik untuk menghapus baris
        $('#kt_content_container').on('click', '.deleteRow', function () {
            $(this).closest('.form-group.row').remove();
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
