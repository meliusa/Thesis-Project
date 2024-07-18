@extends('layouts.app')
@section('content')
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Ubah Data Gaji</h1>
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
                        <li class="breadcrumb-item text-dark">Ubah Data Gaji</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <div id="" class="collapse show">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <!--begin::Container-->
                <div class="container-xxl" id="kt_content_container">
                    <!--begin::Basic info-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Content-->
                        <div id="kt_docs_repeater_advanced" class="collapse show">
                            <!--begin::Form-->
                            {{-- id="kt_account_profile_details_form" --}}
                            <form action="{{ route('employee-salary.update', $employeeSalary->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Bank</label>
                                        <select name="bank" aria-label="" data-control="select2" data-placeholder=""
                                            class="form-select mb-2">
                                            <option selected value="{{ $employeeSalary->employee->bank }}">
                                                {{ $employeeSalary->employee->bank }}</option>
                                            <option value="Mandiri">Bank Mandiri</option>
                                            <option value="BRI">Bank Rakyat Indonesia (BRI)</option>
                                            <option value="BCA">Bank Central Asia (BCA)</option>
                                            <option value="BNI">Bank Negara Indonesia (BNI)</option>
                                            <option value="CIMB">Bank CIMB Niaga</option>
                                            <option value="Danamon">Bank Danamon</option>
                                            <option value="Permata">Bank Permata</option>
                                            <option value="BTN">Bank Tabungan Negara (BTN)</option>
                                            <option value="Mega">Bank Mega</option>
                                            <option value="OCBC">Bank OCBC NISP</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Nomor Rekening</label>
                                        <input type="text" class="form-control  mb-3" id=""
                                            placeholder="Nomor Rekening" name="nomor_rekening"
                                            value="{{ $employeeSalary->employee->nomor_rekening }}">
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Gaji Pokok</label>
                                        <input type="text" class="form-control  mb-3" id=""
                                            placeholder="Gaji Pokok" name="gaji_pokok"
                                            value="{{ $employeeSalary->gaji_pokok }}">
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">PPh21</label>
                                        <input type="text" class="form-control  mb-3" id="" placeholder="PPh21"
                                            name="PPH21" value="{{ $employeeSalary->PPH21 }}">
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Asuransi</label>
                                        <input type="text" class="form-control  mb-3" id=""
                                            placeholder="Asuransi" name="asuransi" value="{{ $employeeSalary->asuransi }}">
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <!--begin::Input group-->
                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end">
                                        <a href="{{ url()->previous() }}" class="btn btn-light me-3">Batal</a>
                                        {{-- <button type="reset" class="btn btn-light me-3"
                                            data-bs-dismiss="modal">Batal</button> --}}
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Simpan</span>
                                            <span class="indicator-progress">Mohon tunggu...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Basic info-->
                </div>
            </div>
            <!--end::Container-->
        </div>
    </div>
    <!--end::Post-->
    <!--end::Content-->
    {{-- @include('event.management.create.modal') --}}
@endsection
