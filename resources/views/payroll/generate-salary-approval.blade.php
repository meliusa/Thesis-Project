@extends('layouts.app')
@section('content')
    <section>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div class="container-xxl" id="kt_content_container">
                <!--begin::Card-->
                <div class="card">
                    <div class="m-0">
                        <!--begin::Invoice 2 sidebar-->
                        <div
                            class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
                            <!--begin::Labels-->
                            <div class="mb-8">
                                <span
                                    class="badge {{ $salaryGenerate->status == 'Disetujui' ? 'badge-light-success' : 'badge-light-warning' }} ">{{ $salaryGenerate->status }}</span>
                            </div>
                            <!--end::Labels-->
                            <!--begin::Title-->
                            <h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">Detail Penggajian
                                {{ \Carbon\Carbon::parse($salaryGenerate->tanggal_dibuat)->isoFormat('MMMM Y') }}
                            </h6>
                            <!--end::Title-->
                            <!--begin::Item-->
                            <div class="mb-6">
                                <div class="fw-bold text-gray-600 fs-7">Gaji Kotor:</div>
                                <div class="fw-bolder text-gray-800 fs-6"> @currency($gajiKotor) </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mb-6">
                                <div class="fw-bold text-gray-600 fs-7">Gaji Bersih:</div>
                                <div class="fw-bolder text-gray-800 fs-6">@currency($gajiBersih)</div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mb-6">
                                <div class="fw-bold text-gray-600 fs-7">Salary Advance [Bonus]:</div>
                                <div class="fw-bolder text-gray-800 fs-6">@currency($bonus)</div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mb-6">
                                <div class="fw-bold text-gray-600 fs-7">Salary Advance [Potongan]:</div>
                                <div class="fw-bolder text-gray-800 fs-6">@currency($potongan)</div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mb-6">
                                <div class="fw-bold text-gray-600 fs-7">PPh21:</div>
                                <div class="fw-bolder text-gray-800 fs-6">@currency($pph21)</div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mb-6">
                                <div class="fw-bold text-gray-600 fs-7">Asuransi:</div>
                                <div class="fw-bolder text-gray-800 fs-6">@currency($asuransi)</div>
                            </div>
                            <!--end::Item-->
                            @if ($salaryGenerate->status == 'Belum Disetujui')
                                <form action="{{ route('salary-generate.update', $salaryGenerate->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Disetujui">
                                    <input type="hidden" name="tanggal_disetujui"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    <input type="hidden" name="disetujui_oleh" value="{{ Auth::user()->nama }}">
                                    <button type="submit" class="btn btn-sm btn-primary">Setujui</button>
                                </form>
                            @endif
                        </div>
                        <!--end::Invoice 2 sidebar-->
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
