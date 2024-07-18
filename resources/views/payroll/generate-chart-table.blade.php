@extends('layouts.app')
@section('content')
    <section>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div class="container-xxl" id="kt_content_container">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <div class="card-title">
                                Daftar Gaji Karyawan
                            </div>
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Add user-->
                                <a href="#" class="btn btn-primary"><i class="bi bi-printer"></i> PDF</a>
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
                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    id="kt_table_users">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px sorting sorting_desc" tabindex="0"
                                                aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                style="width: 195.887px;" aria-sort="descending">NO</th>
                                            <th class="min-w-125px sorting sorting_desc" tabindex="0"
                                                aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                style="width: 195.887px;" aria-sort="descending">NAMA KARYAWAN</th>
                                            <th class="min-w-125px sorting sorting_desc" tabindex="0"
                                                aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                style="width: 195.887px;" aria-sort="descending">GAJI KOTOR</th>
                                            <th class="min-w-125px sorting sorting_desc" tabindex="0"
                                                aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                style="width: 195.887px;" aria-sort="descending">GAJI BERSIH</th>
                                            <th class="min-w-125px sorting sorting_desc" tabindex="0"
                                                aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                style="width: 195.887px;" aria-sort="descending">GAJI TAMBAHAN [POTONGAN]
                                            </th>
                                            <th class="min-w-125px sorting sorting_desc" tabindex="0"
                                                aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                style="width: 195.887px;" aria-sort="descending">GAJI TAMBAHAN [BONUS]</th>
                                            <th class="min-w-125px sorting sorting_desc" tabindex="0"
                                                aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                style="width: 195.887px;" aria-sort="descending">PPH21</th>
                                            <th class="min-w-125px sorting sorting_desc" tabindex="0"
                                                aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                style="width: 195.887px;" aria-sort="descending">ASURANSI</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">
                                        @foreach ($employeeSalaries as $emSa)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $emSa->employee->nama_lengkap }}</td>
                                                <td>@currency($emSa->gaji_pokok)</td>
                                                <td>@currency($emSa->gaji_bersih)</td>
                                                <td>@currency($bonuses)</td>
                                                <td>@currency($potongans)</td>
                                                <td>@currency($emSa->PPH21)</td>
                                                <td>@currency($emSa->asuransi)</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <div class="row">
                                <div
                                    class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                </div>
                                <div
                                    class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                    {{-- <ul class="pagination">
                                    <li class="page-item previous disabled"><span
                                            class="page-link">Previous</span></span></li>
                                    <li class="page-item "><a href="#" class="page-link">1</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                                    <li class="page-item "><a href="#" class="page-link">4</a></li>
                                    <li class="page-item "><a href="#" class="page-link">5</a></li>
                                    <li class="page-item "><a href="#" class="page-link">6</a></li>
                                    <li class="page-item next"><a class="page-link" href="#">Next</span></a></li>>
                                    </li>
                                </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
        </div>
    </section>
@endsection
