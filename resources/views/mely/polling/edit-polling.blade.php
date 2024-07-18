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
                        <li class="breadcrumb-item text-muted">Tindak Lanjut</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('pollings.index') }}" class="text-muted text-hover-primary">Polling
                                Keputusan</a>
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
                        <a href="{{ route('pollings.index') }}" class="btn btn-light align-self-center">Kembali</a>
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div class="collapse show">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('pollings.update', $polling->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="agenda_id" value="{{ $polling->agenda_id }}">

                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="required">Agenda Rapat</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <label class="col-form-label fw-bold fs-6">
                                            <span class="">{{ $submissionModule->title }} ( ID :
                                                {{ $submissionModule->id }} )</span>
                                        </label>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Pertanyaan</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="question" class="form-control form-control-lg"
                                            placeholder="Pertanyaan" autocomplete="off" required rows="5"
                                            data-kt-autosize="true" wrap="soft">{{ $polling->question }}</textarea>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6 mt-4">Opsi</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <!-- Loop through existing options -->
                                        @foreach($pollingDetails as $index => $pollingDetail)
                                        <div class="form-group row mt-3">
                                            <div class="col-md-9">
                                                <textarea name="option[]" class="form-control form-control-lg"
                                                    placeholder="Opsi" autocomplete="off" required rows="1"
                                                    data-kt-autosize="true"
                                                    wrap="soft">{{ $pollingDetail->option }}</textarea>
                                            </div>
                                            <div class="col-md-3">
                                                @if ($index === 0)
                                                <a href="javascript:void(0)"
                                                    class="btn btn-success btn-block mt-3 mt-md-0 addRow">
                                                    <i class="la la-plus"></i>
                                                </a>
                                                @else
                                                <a href="javascript:void(0)"
                                                    class="btn btn-danger btn-block mt-3 mt-md-0 deleteRow">
                                                    <i class="la la-trash-o"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- Template for new options -->
                                        <div class="form-group row mt-3 template-row" style="display: none;">
                                            <div class="col-md-9">
                                                <textarea name="option[]" class="form-control form-control-lg"
                                                    placeholder="Opsi" autocomplete="off" required rows="1"
                                                    data-kt-autosize="true" wrap="soft">auto_delete</textarea>
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
                                    <!--end::Col-->
                                </div>
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                                <button type="submit" class="btn btn-warning">Ubah</button>
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
        const form = $(this).closest("form");
        const topicStatus = $(this).data('topic-status');
        e.preventDefault();

        if (topicStatus === 'Diterima') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data dengan status "Diterima" tidak dapat dihapus.',
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
        const topicId = $(this).data('topic-id');
        const topicStatus = $(this).data('topic-status');

        if (topicStatus === 'Diterima') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data dengan status "Diterima" tidak dapat diubah.',
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
                    $('#kt_modal_edit_topic_' + topicId).modal('show');
                }
            })
        }
    });

    $('.validasiupdatestatus').click(function (e) {
        e.preventDefault();
        const topicId = $(this).data('topic-id');
        const topicStatus = $(this).data('topic-status');

        if (topicStatus === 'Menunggu Persetujuan') {
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
                    $('#kt_modal_edit_status_topic_' + topicId).modal('show');
                }
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Status "' + topicStatus + '" tidak dapat diubah.',
            });
        }
    });

</script>
@endsection
