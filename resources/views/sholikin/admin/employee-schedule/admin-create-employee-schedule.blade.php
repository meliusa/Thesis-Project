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
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Jadwal Karyawan</h1>
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
                            <li class="breadcrumb-item text-muted">Manajemen Jadwal Karyawan</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-dark">Data Jadwal Karyawan</li>
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
                    <form action="{{ route('employee-schedule.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!-- Filter by Divisi -->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <select id="id_division" class="form-select" data-control="select2" data-placeholder="Filter by Divisi">
                                                <option value="">Filter by Divisi</option>
                                                @foreach ($divisions as $divisi)
                                                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Filter by Posisi -->
                                    <div class="d-flex align-items-center position-relative my-1 mx-3">
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <select id="id_position" data-control="select2" class="form-select" data-placeholder="Filter by Posisi" onchange="callFunctions()">
                                                {{-- <option value="" selected disabled>Filter by Posisi</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card title-->
                            </div>

                            <div class="card-header border-0 pt-2">
                                <div class="row">
                                    {{-- periode --}}
                                    <div class="col-lg-4">
                                        <select name="id_jadwal" id="id_jadwal" data-control="select2" class="form-select mb-3" data-placeholder="Pilih Periode" onchange="getScheduleDetail()">
                                            <option selected disabled>Pilih Periode</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row mb-3">
                                            <div class="col-lg-12 d-flex align-items-center">
                                                <label class="fw-bold text-muted mb-0 me-3">Jam Masuk</label>
                                                <input type="text" id="jam_masuk" class="form-control fw-bold fs-6 text-gray-800" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row mb-3">
                                            <div class="col-lg-12 d-flex align-items-center">
                                                <label class="fw-bold text-muted mb-0 me-3">Jam Pulang</label>
                                                <input type="text" id="jam_pulang" class="form-control fw-bold fs-6 text-gray-800" readonly>
                                            </div>
                                        </div>
                                    </div>                                                
                                </div>
                            </div>                
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body py-4">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_add_admin_employee_schedule">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-50px">No</th>
                                            <th class="min-w-50px">Checkbox</th>
                                            <th class="min-w-125px">Foto</th>
                                            <th class="min-w-125px">Nama Karyawan</th>
                                            <th class="min-w-100px">Divisi</th>
                                            <th class="min-w-125px">Posisi Pekerjaan</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->  
                                    <!--begin::Table body-->
                                    <tbody id="employee_table_body" class="text-gray-600 fw-bold">
                                        <!-- Data karyawan akan ditampilkan di sini -->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                                <!--begin::Actions-->
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="button" class="btn btn-light me-3"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" id="submitBtn" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
                                        <span class="indicator-progress">Mohon tunggu...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </form>
                    <!--end::Card-->
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
                    table = document.querySelector('#kt_table_add_admin_employee_schedule');

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
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#id_division').change(function() {
                var id_divisi = $(this).val();

                $.ajax({
                    url: '/get-position-for-schedule',
                    type: 'POST',
                    data: {
                        id_division: id_divisi,
                        _token: '{{ csrf_token() }}'
                    },
                    cache: false,

                    success: function(response) {
                        console.log(response);  
                        $('#id_position').empty(); 
                        $('#id_position').html(
                            '<option value="" selected disabled>Pilih Posisi</option>'
                        );
                        response.dataPosisi.forEach(function(posisi) {
                            if (posisi.id_divisi === id_divisi) {
                                $('#id_position').append($('<option></option>').attr('value', posisi.id).text(posisi.nama_posisi));
                            }
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#submitBtn').click(function(e) {
                e.preventDefault();

                var id_posisi = $('#id_position').val();
                var id_jadwal = $('#id_jadwal').val();
                var id_karyawan = [];

                $('input[name="id_karyawan[]"]:checked').each(function() {
                    id_karyawan.push($(this).val());
                });

                if (id_posisi == null) {
                    toastr.error('Pilih  divisi dan posisi terlebih dahulu');
                    return false;
                }

                if (id_jadwal == null) {
                    toastr.error('Pilih periode terlebih dahulu');
                    return false;
                }

                if (id_karyawan.length == 0) {
                    toastr.error('Pilih karyawan terlebih dahulu');
                    return false;
                }

                $.ajax({
                    type: 'POST',
                    url: '{{ route('employee-schedule.store') }}',
                    data: {
                        id_jadwal: id_jadwal,
                        id_karyawan: id_karyawan
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            toastr.success(response.message);
                            setTimeout(function() {
                                window.location.href = '{{ route('employee-schedule.index') }}';
                            }, 1000);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText
                        toastr.error('Terjadi kesalahan: ' + errorMessage);
                    }
                });
            })
        });

        function callFunctions(){
            getSchedule();
            getEmployee();
        }

        function getSchedule() {
            var id_divisi = $('#id_division').val();
            var id_posisi = $('#id_position').val();
            $('#jam_masuk').val('');
            $('#jam_pulang').val('');
            
            $.ajax({
                type: 'GET',
                url: '{{ url('get-schedule') }}?id_divisi=' + id_divisi + '&id_posisi=' + id_posisi,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    $('#id_jadwal').empty();
                    $('#id_jadwal').html('<option value="" selected disabled>Pilih Periode</option>');
                    $.each(response, function(key, value) {
                        var parts = value.periode_mulai.split('-');
                        var startDate = new Date(parts[0], parts[1] - 1, parts[2]);
                        var formattedPeriodeMulai = startDate.getDate() + ' ' + getMonthName(startDate.getMonth()) + ' ' + startDate.getFullYear();

                        parts = value.periode_selesai.split('-');
                        var endDate = new Date(parts[0], parts[1] - 1, parts[2]);
                        var formattedPeriodeSelesai = endDate.getDate() + ' ' + getMonthName(endDate.getMonth()) + ' ' + endDate.getFullYear();
                        $('#id_jadwal').append('<option value="' + value.id + '">' + formattedPeriodeMulai + ' s/d ' + formattedPeriodeSelesai + '</option>');
                    });
                },
                error: function(data) {
                    console.log("error: ", data);
                }
            });
        }

        function getMonthName(monthIndex) {
            var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                            "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            return monthNames[monthIndex];
        }

        function getScheduleDetail() {
            var id_jadwal = $('#id_jadwal').val();

            $.ajax({
                type: 'GET',
                url: '{{ url('get-schedule-detail') }}?id_jadwal=' + id_jadwal,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    $('#jam_masuk').val(response.jam_masuk);
                    $('#jam_pulang').val(response.jam_pulang);
                    //console.log(response.karyawan.length);
                   
                    if(response.karyawan.length > 0)
                    {
                        response.karyawan.forEach(function (data) {
                            console.log(data);
                            $('#karyawan_'+ data).remove();
                        });
                    
                    }else{
                        getEmployee();
                    }
                    
                }
            });
        }

        function getEmployee() {
            var id_divisi = $('#id_division').val();
            var id_posisi = $('#id_position').val();

            $.ajax({
                type: 'GET',
                url: '{{ url('get-employee') }}?id_divisi=' + id_divisi + '&id_posisi=' + id_posisi,
                dataType: 'json',
                cache: false,
                success: function(response) {
                    // console.log(response);
                    var html = '';
                    response.forEach(function (data, index) {
                        html += '<tr  id="karyawan_'+data.id+'">';
                        html += '<td>' + (index + 1) + '</td>';
                        html += '<td><input class="form-check-input" type="checkbox" name="id_karyawan[]" value="' + data.id + '" id="centang_'+ data.id +' " style="width: 18px; height: 18px;"></td>';
                        html += '<td><img src="{{ asset('storage/uploads/karyawan/foto-karyawan') }}/' + data.foto + '" alt="' + data.nama_lengkap + '" class="w-50px h-50px"></td>';
                        html += '<td>' + data.nama_lengkap + '</td>';
                        html += '<td>' + data.divisi + '</td>';
                        html += '<td>' + data.posisi + '</td>';
                        html += '</tr>';
                    });
                    $('#employee_table_body').html(html);
                },
                error: function(xhr, status, error) {
                    console.error("error: ", xhr, status, error);
                }
            });
        }
    </script>
@endsection
