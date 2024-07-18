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
                    <form action="{{ route('employee-schedule.update', $employeeSchedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6">
                                <!--begin::Card title-->
                                <input type="hidden" name="id_karyawan" value="{{ $employeeSchedule->id_karyawan }}">
                                <div class="card-title">
                                    <div class="col-lg-4">
                                        <div class="row mb-3">
                                            <label class="fw-bold text-muted mb-0 me-3">Divisi</label>
                                            <div class="col-lg-12 d-flex align-items-center">
                                                <input type="text" class="form-control mb-3" name="id_divisi" value="{{ $employeeSchedule->employee->division->nama_divisi }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="row mb-3 mx-3">
                                            <label class="fw-bold text-muted mb-0 me-3">Posisi</label>
                                            <div class="col-lg-12 d-flex align-items-center">
                                                <input type="text" class="form-control mb-3" name="id_posisi" value="{{ $employeeSchedule->employee->job_position->nama_posisi }}" readonly>
                                            </div>
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
                                            @foreach ($schedules as $sch )
                                                @if (old('id_jadwal', $employeeSchedule->id_jadwal) == $sch->id)
                                                    <option value="{{ $sch->id }}" selected>
                                                        {{  \Carbon\Carbon::make($sch->periode_mulai)->isoFormat('DD MMMM YYYY') }} sampai {{ \Carbon\Carbon::make($sch->periode_selesai)->isoFormat('DD MMMM YYYY') }}
                                                    </option>
                                                @else
                                                    <option value="{{ $sch->id }}">
                                                        {{  \Carbon\Carbon::make($sch->periode_mulai)->isoFormat('DD MMMM YYYY') }} sampai {{ \Carbon\Carbon::make($sch->periode_selesai)->isoFormat('DD MMMM YYYY') }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row mb-3">
                                            <div class="col-lg-12 d-flex align-items-center">
                                                <label class="fw-bold text-muted mb-0 me-3">Jam Masuk</label>
                                                @foreach ($schedules as $sch )
                                                    @if (old('id_jadwal', $employeeSchedule->id_jadwal) == $sch->id)
                                                        <input type="text" id="jam_masuk" class="form-control fw-bold fs-6 text-gray-800" value="{{ $sch->jam_masuk }}" readonly>
                                                    @endif                                                    
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row mb-3">
                                            <div class="col-lg-12 d-flex align-items-center">
                                                <label class="fw-bold text-muted mb-0 me-3">Jam Pulang</label>
                                                @foreach ($schedules as $sch )
                                                    @if (old('id_jadwal', $employeeSchedule->id_jadwal) == $sch->id)
                                                        <input type="text" id="jam_pulang" class="form-control fw-bold fs-6 text-gray-800" value="{{ $sch->jam_pulang }}" readonly>
                                                    @endif                                                    
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>                                                
                                </div>
                            </div>                       
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body py-4">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
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
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/uploads/karyawan/foto-karyawan/' . $employeeSchedule->employee->user->foto) }}" class="w-50px h-50px" alt="">
                                            </td>
                                            <td>{{ $employeeSchedule->employee->nama_lengkap }}</td>
                                            <td>{{ $employeeSchedule->employee->division->nama_divisi }}</td>
                                            <td>{{ $employeeSchedule->employee->job_position->nama_posisi }}</td>
                                        </tr>
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

<script>
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
            }
        });
    }
</script>