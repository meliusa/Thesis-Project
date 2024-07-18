{{-- data karyawan --}}
<fieldset class="wizard-fieldset">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h2>Data Karyawan</h2>
            </div>
        </div>

        <div class="separator mb-2"></div>
        <div class="card-body pt-0">

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
            <input type="hidden" name="nama_lengkap">
            <div class="form-group mb-3">
                <label class="required form-label">NIK</label>
                <input type="text" class="form-control mb-3" onkeypress="return event.charCode>47 && event.charCode<58" id="kt_docs_maxlength_nik" maxlength="16" placeholder="NIK" name="nik">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Email</label>
                <input type="email" class="form-control  mb-3" id="" placeholder="Email" name="email">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Divisi</label>
                <select name="id_divisi" id="id_divisi" aria-label="" data-control="select2" data-placeholder=""
                    class="form-select mb-2">
                    <option selected disabled>Pilih Divisi</option>
                    @foreach ($division as $divisi)
                        <option value="{{ $divisi->id }}"> {{ $divisi->nama_divisi }} </option>
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
                <select name="id_pekerjaan" aria-label="" data-control="select2" data-placeholder=""
                    class="form-select mb-2">
                    <option selected disabled>Pilih Jenis Pekerjaan</option>
                    @foreach ($types as $pekerjaan)
                        <option value="{{ $pekerjaan->id }}"> {{ $pekerjaan->nama_pekerjaan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Agama</label>
                <select name="agama" aria-label="" data-control="select2" data-placeholder=""
                    class="form-select mb-2">
                    <option selected disabled>Pilih Agama</option>
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
                        <input class="form-check-input" name="jenis_kelamin" type="radio" value="laki-laki"
                            required />
                        <span class="fw-bold ps-2 fs-6">Laki-laki</span>
                    </label>
                    <!--end::Option-->
                    <!--begin::Option-->
                    <label class="form-check form-check-inline form-check-solid">
                        <input class="form-check-input" name="jenis_kelamin" type="radio" value="perempuan"
                            required />
                        <span class="fw-bold ps-2 fs-6">Perempuan</span>
                    </label>
                    <!--end::Option-->
                </div>
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Nomor Telepon</label>
                <input type="text" class="form-control  mb-3" id="" placeholder="Nomor Telepon"
                    name="no_hp" onkeypress="return event.charCode>47 && event.charCode<58">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Tempat Lahir</label>
                <input type="text" class="form-control  mb-3" id="" placeholder="Tempat Lahir"
                    name="tempat_lahir">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Tanggal Lahir</label>
                <input name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" id="kt_datepicker_1" />
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <input type="hidden" name="alamat_ktp">
            <div class="row mb-3">
                <label class="required form-label">Alamat KTP</label>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_ktp_provinsi" type="text" class="form-control"
                            placeholder="Provinsi" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_ktp_kota_kabupaten" type="text" class="form-control"
                            placeholder="Kota / Kabupaten" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_ktp_kecamatan" type="text" class="form-control"
                            placeholder="Kecamatan" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_ktp_kelurahan" type="text" class="form-control"
                            placeholder="Kelurahan" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="col-12">
                        <input name="alamat_ktp_jalan" type="text" class="form-control" placeholder="Jalan" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_ktp_rt" type="text" class="form-control" placeholder="RT" onkeypress="return event.charCode>47 && event.charCode<58"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_ktp_rw" type="text" class="form-control" placeholder="RW" onkeypress="return event.charCode>47 && event.charCode<58"/>
                    </div>
                </div>
            </div>

            <input type="hidden" name="tempat_tinggal">
            <div class="row mb-3">
                <label class="required form-label">Alamat Sekarang</label>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_tt_provinsi" type="text" class="form-control"
                            placeholder="Provinsi" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_tt_kota_kabupaten" type="text" class="form-control"
                            placeholder="Kota / Kabupaten" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_tt_kecamatan" type="text" class="form-control"
                            placeholder="Kecamatan" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_tt_kelurahan" type="text" class="form-control"
                            placeholder="Kelurahan" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="col-12">
                        <input name="alamat_tt_jalan" type="text" class="form-control" placeholder="Jalan" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_tt_rt" type="text" class="form-control" placeholder="RT" onkeypress="return event.charCode>47 && event.charCode<58"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="alamat_tt_rw" type="text" class="form-control" placeholder="RW" onkeypress="return event.charCode>47 && event.charCode<58"/>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Status Pernikahan</label>
                <select name="status_pernikahan" aria-label="" data-control="select2" data-placeholder=""
                    class="form-select mb-2">
                    <option selected disabled>Pilih Status Pernikahan</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Golongan Darah</label>
                <select name="golongan_darah" aria-label="" data-control="select2" data-placeholder=""
                    class="form-select mb-2">
                    <option selected disabled>Pilih Golongan Darah</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Kewarganegaraan</label>
                <select name="kewarganegaraan" aria-label="" data-control="select2" data-placeholder=""
                    class="form-select mb-2">
                    <option selected disabled>Pilih Kewarganegaraan</option>
                    <option value="WNI">Warga Negara Indonesia (WNI)</option>
                    <option value="WNA">Warga Negara Asing (WNA)</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Bank</label>
                <select name="bank" aria-label="" data-control="select2" data-placeholder=""
                    class="form-select mb-2">
                    <option selected disabled>Select a Bank</option>
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
                <input type="text" class="form-control  mb-3" id="" placeholder="Nomor Rekening"
                    name="nomor_rekening" onkeypress="return event.charCode>47 && event.charCode<58">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group d-flex justify-content-between">
                <a href="javascript:;" class="form-wizard-previous-btn float-left">Sebelumnya</a>
                <a href="javascript:;" class="form-wizard-next-btn float-right">Selanjutnya</a>
            </div>
        </div>
    </div>
</fieldset>
