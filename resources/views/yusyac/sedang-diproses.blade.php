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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Statistics</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Widgets</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Statistics</li>
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
                                @endif
                                <!--end::Toolbar-->
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
                                            {{ $items->admin->nama ?? '' }}
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

                </div>
                <input type="hidden" id="id_tiket" name="id_tiket" />
                <!--end::Modal body-->
                <div class="modal-footer justify-content-center">
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Kembali</button>

                        <a style="cursor: pointer" class="btn btn-danger me-3" id="tolak"
                            onclick="confirmButton('Tolak','ditolak','#F1416C',  'Apakah Anda Yakin Untuk Menolak?', 'Data Tidak Dapat Di Ubah Ketika Sudah Ditolak')">
                            Tolak
                        </a>

                        <a style="cursor: pointer" class="btn btn-success me-3" id="setujui"
                            onclick="confirmButton('Setujui','diproses','#50CD89', 'Apakah Anda Yakin Untuk Menyetujui?', 'Data Tidak Dapat Di Hapus Ketika Sudah Disetujui')">
                            Setujui
                        </a>

                        <a style="cursor: pointer" class="btn btn-success me-3" id="selesai"
                            onclick="confirmButton('Selesai','selesai','#50CD89',  'Apakah Anda Yakin Ingin Menyelesaikan?', 'Data Tidak Dapat Di Ubah Ketika Sudah Diselesaikan')">
                            Selesai
                        </a>
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
    function confirmButton(statusConfirm, status, color, title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: color,
            cancelButtonColor: '#adb5bd',
            confirmButtonText: statusConfirm,
        }).then((result) => {
            if (result.isConfirmed) {
               let id_tiket = $('#id_tiket').val();
                //console.log();
                window.location.href="{{url('update-status-diproses-admin')}}?status="+status+"&id=" + id_tiket;
            }
        })
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
<script>
    $(document).on('click', '#btn-show', function(e) {
        e.preventDefault();
        let id_tiket = $(this).data('id');
        $('#id_tiket').val(id_tiket);
       // console.log(id_tiket);
       $('#setujui').show();
       $('#tolak').show();
       $('#selesai').hide();
        $.ajax({
            url: `pengaduan-admin-diproses/` + id_tiket,
            method: 'GET',
            data: {
                id: id_tiket,
                _token: '{{ csrf_token() }}'
            },
            cache: false,
            success: function(response) {
            // Kosongkan isi modal sebelum menambahkan detail tiket
            if(response.data.status != 'menunggu')
            {
                $('#setujui').hide();
                $('#tolak').hide();
            }

            if(response.data.status == 'diproses')
            {
                $('#selesai').show();
            }
            $('.show-data').empty();
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Nomor Ticket</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="nomor_tiket"> : ' + response.data.nomor_tiket + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Nama Pemohon</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="nama_pemohon"> : ' + response.employee + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Tanggal Diminta</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="create_at"> : ' + response.data.created_at + '</span></div></div>');
            if (response.data.status != 'menunggu'){
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Disetujui Oleh</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="disetujui"> : ' + response.admin + '</span></div></div>');
            } else {
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Disetujui Oleh</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="disetujui"> : Menunggu Verifikasi</span></div></div>');
            }
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Subject Ticket</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="subjek_tiket"> : ' + response.data.subjek_tiket + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Type Ticket</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="id_tipe"> : ' + response.tipe + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Deskripsi</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="deskripsi"> ' + response.data.deskripsi + '</span></div></div>');
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Document</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="dokumen_pendukung"> : ' + response.data.dokumen_pendukung + '</span><a id="file_dokumen_pendukung" style="cursor: pointer" class="btn btn-sm btn-primary ms-3" download>Download File</a></div></div>');
            $('#file_dokumen_pendukung').attr('href', response.file);
            if(response.data.status === 'menunggu') {
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Status</label><div class="col-lg-8 fv-row"><span class="badge badge-light-primary fs-7" id="status"> ' + response.data.status + '</span></div></div>');
            } else if(response.data.status === 'diproses'){
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Status</label><div class="col-lg-8 fv-row"><span class="badge badge-light-warning fs-7" id="status"> ' + response.data.status + '</span></div></div>');
            } else if(response.data.status === 'selesai') {
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Status</label><div class="col-lg-8 fv-row"><span class="badge badge-light-success fs-7" id="status"> ' + response.data.status + '</span></div></div>');
            } else {
                $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Status</label><div class="col-lg-8 fv-row"><span class="badge badge-light-danger fs-7" id="status"> ' + response.data.status + '</span></div></div>');
            }
            $('.show-data').append('<div class="row mb-3"><label class="col-lg-4 fw-bold fs-6">Prioritas</label><div class="col-lg-8 fv-row"><span class="fw-bold text-gray-800 fs-6" id="prioritas"> : ' + response.data.prioritas + '</span></div></div>');
            $('#kt_modal_show_ticket').modal('show');
            }
        });

    });

</script>
@endsection