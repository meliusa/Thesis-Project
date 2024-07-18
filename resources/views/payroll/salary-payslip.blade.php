@extends('layouts.app')
@section('content')
    <section>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div class="container-xxl" id="kt_content_container">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <div class="mw-lg-950px mx-auto w-100 mt-5">
                            <!-- begin::Header-->
                            <div class="d-flex justify-content-between flex-column flex-sm-row mb-8">
                                <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7 mt-10">SLIP GAJI</h4>
                                <!--end::Logo-->
                                <div class="text-sm-end">
                                    <!--begin::Logo-->
                                    <a href="#" class="d-block mw-150px ms-sm-auto">
                                        <img alt="Logo" src="{{ asset('src/media/logos/logo.png') }}" class="w-100" />
                                    </a>
                                    <!--end::Logo-->
                                    <!--begin::Text-->
                                    <div class="text-sm-end fw-bold fs-4 text-muted mt-1">
                                        <div>Jl. Hasanudin No.10, Karanganyar,</div>
                                        <div>Kec. Panggungrejo, Kota Pasuruan,</div>
                                        <div>Jawa Timur 67131</div>
                                    </div>
                                    <!--end::Text-->
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="pb-12">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column gap-7 gap-md-10">
                                    <div class="separator"></div>
                                    <!--begin::Separator-->
                                    <!--begin::Order details-->
                                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bolder">
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">NIK</span>
                                            <span class="fs-5"> {{ $employeeSalary->employee->nik }} </span>
                                        </div>
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Nama</span>
                                            <span class="fs-5"> {{ $employeeSalary->employee->nama_lengkap }} </span>
                                        </div>
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Divisi</span>
                                            <span class="fs-5">
                                                {{ $employeeSalary->employee->division->nama_divisi }} </span>
                                        </div>
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Posisi</span>
                                            <span class="fs-5">
                                                {{ $employeeSalary->employee->job_position->nama_posisi }} </span>
                                        </div>
                                        <div class="flex-root d-flex flex-column">
                                            <span class="text-muted">Periode</span>
                                            <span class="fs-5">
                                                {{ $detail[0]->bulan }}
                                                {{ $detail[0]->tahun }}
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Order details-->
                                    <!--begin:Order summary-->
                                    <div class="d-flex justify-content-between flex-column">
                                        <!--begin::Table-->
                                        <div class="table-responsive border-bottom mb-9">
                                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                <thead>
                                                    <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                        <th class="min-w-100px pb-2">Deskripsi</th>
                                                        <th class="min-w-100px text pb-2">Jumlah</th>
                                                        <th class="min-w-100px text pb-2">Catatan</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-bold text-gray-600">
                                                    <!--begin::Products-->
                                                    <tr>
                                                        <td>Gaji Kotor:</td>
                                                        <td> @currency($employeeSalary->gaji_pokok) </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>PPh21:</td>
                                                        <td>@currency($employeeSalary->PPH21)</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Asuransi:</td>
                                                        <td>@currency($employeeSalary->asuransi)</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Salary Advance [Bonus]:</td>
                                                        <td> @currency($bonus) </td>
                                                        <td></td>
                                                    </tr>
                                                    @foreach ($ketBonus as $ket)
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td> {{ $ket }} </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td>Salary Advance [Potongan]:</td>
                                                        <td> @currency($potongan) </td>
                                                        <td></td>
                                                    </tr>
                                                    @foreach ($ketPotongan as $ket)
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td> {{ $ket }} </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td class="fs-3 text-dark fw-bolder text">Gaji Bersih:</td>
                                                        <td class="text-dark fs-3 fw-boldest text" colspan="2">
                                                            @currency($detail[0]->total_gaji) </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs-3 text-dark fw-bolder text">Terbilang:</td>
                                                        <td class="text-dark fs-3 fw-boldest text" colspan="2">
                                                            {{ ucwords(Terbilang::make($detail[0]->total_gaji, ' rupiah')) }}
                                                            {{-- @currency($gajiKaryawan->detail_gaji_karyawan->total_gaji) --}}
                                                        </td>
                                                    </tr>
                                                    <!--end::Grand total-->
                                                </tbody>
                                            </table>
                                            <table class="table align-middle table-dashed fs-6 gy-5 mb-0">
                                                <thead>
                                                    <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                        <th class="min-w-350px pb-2"></th>
                                                        <th class="min-w-70px text pb-2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-bold text-gray-600">
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}<br>
                                                            Manajer HRD</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>(........................)</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!--end::Table-->
                                    </div>

                                    <!--end:Order summary-->
                                </div>
                                <a href="{{ route('printPayslip', ['id' => $employeeSalary->id, 'month' => $detail[0]->bulan]) }}"
                                    class="btn btn-primary my-1 mt-0">PDF</a>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
        </div>
    </section>
@endsection
