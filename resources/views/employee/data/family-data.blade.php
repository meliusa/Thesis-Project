{{-- data keluarga dan detail --}}
<fieldset class="wizard-fieldset">

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h2>Data Keluarga</h2>
            </div>
        </div>
        <div class="separator my-2"></div>
        <div class="card-body">

            <div class="form-group mb-3">
                <input type="hidden" name="id_karyawan">
                <label class="required form-label">Foto KK</label>
                <div class="col-lg-12 fv-row">
                    <!--begin::Dropzone-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Dropzone-->
                        <div class="dropzone" id="uploadkk">
                            <!--begin::Message-->
                            <div class="dz-message needsclick">
                                <!--begin::Icon-->
                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                <!--end::Icon-->

                                <!--begin::Info-->
                                <div class="ms-4">
                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Masukkan
                                        file
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

            <div class="form-group mb-3">
                <label class="required form-label">Nomor KK</label>
                <input type="text" class="form-control  mb-3"  id="kt_docs_maxlength_kk" maxlength="16" placeholder="Nomor KK" name="no_kk" onkeypress="return event.charCode>47 && event.charCode<58">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Nama Kepala Keluarga</label>
                <input type="text" class="form-control  mb-3" id="" placeholder="Nama Kepala Keluarga"
                    name="kepala_keluarga">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="row mb-3">
                <label class="required form-label">Alamat</label>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="provinsi" type="text" class="form-control" placeholder="Provinsi" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="kabupaten/kota" type="text" class="form-control"
                            placeholder="Kota / Kabupaten" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="desa/kelurahan" type="text" class="form-control" placeholder="Kelurahan" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="col-12">
                        <input name="alamat" type="text" class="form-control" placeholder="Jalan" />
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <input type="hidden" name="rt/rw">
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="rt" type="text" class="form-control" placeholder="RT" onkeypress="return event.charCode>47 && event.charCode<58"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <input name="rw" type="text" class="form-control" placeholder="RW" onkeypress="return event.charCode>47 && event.charCode<58"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="col-12">
                        <input name="kode_pos" type="text" class="form-control" placeholder="Kode Pos" onkeypress="return event.charCode>47 && event.charCode<58"/>
                    </div>
                </div>
            </div>

            <div class="separator my-2"></div>
            <!--begin::Repeater-->
            <div id="kt_docs_repeater_advanced" class="collapse show">

                <div class="card-header" data-bs-toggle="collapse" aria-expanded="true">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Data Detail Keluarga</h3>
                    </div>
                    <!--end::Card title-->
                </div>

                <div data-repeater-list="group-a">
                    <div data-repeater-item="group-a">
                        <div class="card-body border-top p-9">
                            <input type="hidden" name="id_keluarga">
                            <div class="form-group mb-3">
                                <label class="required form-label">Nama Lengkap</label>
                                <input type="text" class="form-control  mb-3" id=""
                                    placeholder="Nama Lengkap" name="nama_lengkap">
                                <!--  <div class="wizard-form-error"></div> -->
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">NIK</label>
                                <input type="text" class="form-control mb-3" onkeypress="return event.charCode>47 && event.charCode<58" data-kt-repeater="maxlength"  id="kt_docs_maxlength_nik_1" maxlength="16" placeholder="NIK"
                                    name="nik">
                                <!--  <div class="wizard-form-error"></div> -->
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Jenis Kelamin</label>
                                <div class="d-flex align-items-center mt-3" data-kt-button="true">
                                    <!--begin::Option-->
                                    <label class="form-check form-check-inline form-check-solid me-5">
                                        <input class="form-check-input" name="jenis_kelamin" type="radio"
                                            value="laki-laki" required />
                                        <span class="fw-bold ps-2 fs-6">Laki-laki</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label class="form-check form-check-inline form-check-solid">
                                        <input class="form-check-input" name="jenis_kelamin" type="radio"
                                            value="perempuan" required />
                                        <span class="fw-bold ps-2 fs-6">Perempuan</span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--  <div class="wizard-form-error"></div> -->
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Tempat Lahir</label>
                                <input type="text" class="form-control  mb-3" id=""
                                    placeholder="Tempat Lahir" name="tempat_lahir">
                                <!--  <div class="wizard-form-error"></div> -->
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Tanggal Lahir</label>
                                <input name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"
                                    data-kt-repeater="datepicker" />
                                <!--  <div class="wizard-form-error"></div> -->
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Agama</label>
                                <select name="agama" aria-label="" data-kt-repeater="select2"
                                    data-placeholder="Agama" class="form-select mb-2">
                                    <option selected disabled>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                    <option value="Kristen Protestan">Kristen Protestan
                                    </option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Pendidikan Terakhir</label>
                                <select name="pendidikan" aria-label="" data-kt-repeater="select2"
                                    data-placeholder="Pendidikan Terakhir" class="form-select mb-2">
                                    <option selected disabled>Pilih Pendidikan Terakhir</option>
                                    <option value="SLTP">SLTP</option>
                                    <option value="SLTA">SLTA</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah
                                    </option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Pekerjaan</label>
                                <select name="id_pekerjaan" aria-label="" data-kt-repeater="select2"
                                    data-placeholder="Pekerjaan" class="form-select mb-2">
                                    <option selected disabled>Pilih Pekerjaan</option>
                                    @foreach ($types as $pekerjaan)
                                        <option value="{{ $pekerjaan->id }}">
                                            {{ $pekerjaan->nama_pekerjaan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Status Pernikahan</label>
                                <select name="status_pernikahan" aria-label="" data-kt-repeater="select2"
                                    data-placeholder="Status Pernikahan" class="form-select mb-2">
                                    <option selected disabled>Pilih Status Pernikahan</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Hubungan Keluarga</label>
                                <select name="hubungan_keluarga" aria-label="" data-kt-repeater="select2"
                                    data-placeholder="Hubungan Keluarga" class="form-select mb-2">
                                    <option selected disabled>Pilih Hubungan Keluarga</option>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Istri atau Suami">Istri atau Suami</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Cucu">Cucu</option>
                                    <option value="Menantu">Menantu</option>
                                    <option value="Orang Tua">Orang Tua</option>
                                    <option value="Mertua">Mertua</option>
                                    <option value="Saudara Kandung">Saudara Kandung</option>
                                    <option value="Saudara Tiri">Saudara Tiri</option>
                                    <option value="Saudara Angkat">Saudara Angkat</option>
                                    <option value="Pembantu">Pembantu</option>
                                    <option value="Orang Lain">Orang Lain</option>
                                    <option value="Orang Dalam Perawatan">Orang Dalam Perawatan
                                    </option>
                                    <option value="Tunanetra`">Tunanetra`</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Kewarganegaraan</label>
                                <select name="kewarganegaraan" aria-label="" data-kt-repeater="select2"
                                    data-placeholder="Kewarganegaraan" class="form-select mb-2">
                                    <option selected disabled>Pilih Kewarganegaraan</option>
                                    <option value="WNI">Warga Negara Indonesia (WNI)
                                    </option>
                                    <option value="WNA">Warga Negara Asing (WNA)</option>
                                </select>
                            </div>

                            <div class="row mb-3">
                                <label class="required form-label">Dokumen Imigrasi</label>
                                <div class="col-md-6">
                                    <div class="col-12">
                                        <input name="no_passport" type="text" class="form-control" onkeypress="return event.charCode>47 && event.charCode<58"
                                            placeholder="Nomor Pasport" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-12">
                                        <input name="no_kitas" type="text" class="form-control" onkeypress="return event.charCode>47 && event.charCode<58"
                                            placeholder="Nomor Kitas / Kitap" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Nama Ayah</label>
                                <input type="text" class="form-control  mb-3" id=""
                                    placeholder="Nama Ayah" name="nama_ayah">
                                <!--  <div class="wizard-form-error"></div> -->
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Nama Ibu</label>
                                <input type="text" class="form-control  mb-3" id=""
                                    placeholder="Nama Ibu" name="nama_ibu">
                                <!--  <div class="wizard-form-error"></div> -->
                            </div>

                            <div class="form-group mb-3">
                                <div class="d-flex justify-content-end py-6">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-light-danger">
                                        <i class="la la-trash-o"></i>Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <div class="form-group mb-3">
                    <div class="d-flex justify-content-end px-9">
                        <a href="javascript:;" data-repeater-create="group-a" class="btn btn-light-primary">
                            <i class="la la-plus"></i>Tambah
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <a href="javascript:;" class="form-wizard-previous-btn float-left">Sebelumnya</a>
                <a href="javascript:;" class="form-wizard-next-btn float-right">Selanjutnya</a>
            </div>

        </div>
    </div>

</fieldset>
