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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Ubah Password</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('event/event_management') }}"
                                class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Ubah Kata Sandi</li>
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
                            <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Foto KTP</label>
                                        <div class="col-lg-12 fv-row">
                                            <!--begin::Dropzone-->
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="uploadktp">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->

                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Masukkan file
                                                                di sini atau klik untuk mengunggah.</h3>
                                                            <span class="fs-7 fw-bold text-gray-400">Ukuran file
                                                                maksimum
                                                                2MB</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--end::Dropzone-->
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_user">
                                    <div class="form-group mb-3">
                                        <label class="required form-label">NIK</label>
                                        <input type="text" class="form-control  mb-3" placeholder="NIK" name="nik"
                                            required value="{{ $employee->nik }}" />
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control  mb-3" placeholder="Nama Lengkap"
                                            name="nama_lengkap" value="{{ $employee->nama_lengkap }}" />
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Email</label>
                                        <input type="email" class="form-control  mb-3" placeholder="Email" name="email"
                                            value="{{ $employee->email }}" />
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Divisi</label>
                                        <select name="id_divisi" id="id_divisi" aria-label="" data-control="select2" data-placeholder=""
                                            class="form-select mb-2">
                                            <option selected disabled>Pilih Divisi</option>
                                            @foreach ($division as $divisi)
                                                @if(old('id_divisi', $employee->id_divisi) == $divisi->id)
                                                    <option value="{{ $divisi->id }}" selected>
                                                        {{ $divisi->nama_divisi }}
                                                    </option>
                                                @else
                                                    <option value="{{ $divisi->id }}">
                                                        {{ $divisi->nama_divisi }}
                                                    </option>
                                                @endif
                                                {{-- <option value="{{ $divisi->id }} {{ old('id_divisi') == $divisi->id ? 'selected' : ''}}"> {{ $divisi->nama_divisi }} </option> --}}
                                            @endforeach
                                        </select>
                                    </div>
                        
                                    <div class="form-group mb-3">
                                        <label class="required form-label">Posisi Pekerjaan</label>
                                        <select name="id_posisi" id="id_posisi" aria-label="" data-control="select2" data-placeholder=""
                                            class="form-select mb-2">
                                            <option selected disabled>Pilih Posisi Pekerjaan</option>
                                            @foreach ($positions as $posisi)
                                                @if (old('id_posisi', $employee->id_posisi) == $posisi->id)
                                                    <option value="{{ $posisi->id }}" selected>
                                                        {{ $posisi->nama_posisi }}
                                                    </option>
                                                @else
                                                    <option value="{{ $posisi->id }}">
                                                        {{ $posisi->nama_posisi }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Posisi Pekerjaan</label>
                                        <select name="id_posisi" id="id_posisi" aria-label="" data-control="select2" data-placeholder=""
                                            class="form-select mb-2">
                                            <option selected disabled>Pilih Posisi Pekerjaan</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Jenis Pekerjaan</label>
                                        <select name="id_pekerjaan" aria-label="" data-control="select2"
                                            data-placeholder="" class="form-select mb-2">
                                            <option selected disabled>Pilih Jenis Pekerjaan</option>
                                            @foreach ($types as $pekerjaan)
                                                @if (old('id_pekerjaan', $employee->id_pekerjaan) == $pekerjaan->id)
                                                    <option value="{{ $pekerjaan->id }}" selected>
                                                        {{ $pekerjaan->nama_pekerjaan }}
                                                    </option>
                                                @else
                                                    <option value="{{ $pekerjaan->id }}">
                                                        {{ $pekerjaan->nama_pekerjaan }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Agama</label>
                                        {{-- <input type="text" class="form-control  mb-3" placeholder="Agama"
                                            name="agama" value="{{ $employee->agama }}" /> --}}
                                        <select name="agama" aria-label="" data-control="select2" data-placeholder=""
                                            class="form-select mb-2">
                                            <option selected value="{{ $employee->agama }}">{{ $employee->agama }}
                                            </option>
                                            <option value="Islam">Islam</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Kristen Katolik">Kristen Katolik</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Jenis Kelamin</label>
                                        <div class="d-flex align-items-center mt-3" data-kt-button="true">
                                            <!--begin::Option-->
                                            <label class="form-check form-check-inline form-check-solid me-5">
                                                <input class="form-check-input" name="jenis_kelamin" type="radio"
                                                    value="laki-laki" required
                                                    {{ $employee->jenis_kelamin == 'laki-laki' ? 'checked' : '' }} />
                                                <span class="fw-bold ps-2 fs-6">Laki-laki</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-inline form-check-solid">
                                                <input class="form-check-input" name="jenis_kelamin" type="radio"
                                                    value="perempuan" required
                                                    {{ $employee->jenis_kelamin == 'perempuan' ? 'checked' : '' }} />
                                                <span class="fw-bold ps-2 fs-6">Perempuan</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control  mb-3" id=""
                                            placeholder="Tempat Lahir" name="tempat_lahir" required
                                            value="{{ $employee->tempat_lahir }}" />
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"
                                            id="kt_datepicker_1"
                                            value="{{ date('m/d/Y', strtotime($employee->tanggal_lahir)) }}" />
                                        <!--  <div class="wizard-form-error"></div> -->
                                    </div>

                                    <input type="hidden" name="alamat_ktp">
                                    <div class="row mb-3">
                                        <label class="required form-label">Alamat KTP</label>
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_ktp_provinsi" type="text" class="form-control"
                                                    placeholder="Provinsi" required value="{{ $provk }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_ktp_kota_kabupaten" type="text"
                                                    class="form-control" placeholder="Kota / Kabupaten" required
                                                    value="{{ $kabk }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_ktp_kecamatan" type="text" class="form-control"
                                                    placeholder="Kecamatan" required value="{{ $keck }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_ktp_kelurahan" type="text" class="form-control"
                                                    placeholder="Kelurahan" required value="{{ $desak }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="col-12">
                                                <input name="alamat_ktp_jalan" type="text" class="form-control"
                                                    placeholder="Jalan" required value="{{ $jalank }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_ktp_rt" type="text" class="form-control"
                                                    placeholder="RT" required value="{{ $rtk }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_ktp_rw" type="text" class="form-control"
                                                    placeholder="RW" required value="{{ $rwk }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="tempat_tinggal">
                                    <div class="row mb-3">
                                        <label class="required form-label">Alamat Sekarang</label>
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_tt_provinsi" type="text" class="form-control"
                                                    placeholder="Provinsi" required value="{{ $prov }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_tt_kota_kabupaten" type="text"
                                                    class="form-control" placeholder="Kota / Kabupaten" required
                                                    value="{{ $kab }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_tt_kecamatan" type="text" class="form-control"
                                                    placeholder="Kecamatan" required value="{{ $kec }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_tt_kelurahan" type="text" class="form-control"
                                                    placeholder="Kelurahan" required value="{{ $desa }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="col-12">
                                                <input name="alamat_tt_jalan" type="text" class="form-control"
                                                    placeholder="Jalan" value="{{ $jalan }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_tt_rt" type="text" class="form-control"
                                                    placeholder="RT" required value="{{ $rt }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <input name="alamat_tt_rw" type="text" class="form-control"
                                                    placeholder="RW" required value="{{ $rw }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Status Pernikahan</label>
                                        <select name="status_pernikahan" aria-label="" data-control="select2"
                                            data-placeholder="" class="form-select mb-2">
                                            <option selected value="{{ $employee->status_pernikahan }}">
                                                {{ $employee->status_pernikahan }}</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Golongan Darah</label>
                                        <select name="golongan_darah" aria-label="" data-control="select2"
                                            data-placeholder="" class="form-select mb-2">
                                            <option selected value="{{ $employee->golongan_darah }}">
                                                {{ $employee->golongan_darah }}</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="required form-label">Kewarganegaraan</label>
                                        <select name="kewarganegaraan" aria-label="" data-control="select2"
                                            data-placeholder="" class="form-select mb-2">
                                            <option selected value="{{ $employee->kewarganegaraan }}">
                                                {{ $employee->kewarganegaraan }}</option>
                                            <option value="WNI">Warga Negara Indonesia (WNI)</option>
                                            <option value="WNA">Warga Negara Asing (WNA)</option>
                                        </select>
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
