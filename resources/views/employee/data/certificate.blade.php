{{-- data sertifikat --}}
<fieldset class="wizard-fieldset">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h2>Data Sertifikat</h2>
            </div>
        </div>
        <div class="card-body pt-0">

            <div class="form-group mb-3">
                <input type="hidden" name="id_karyawan">
                <label class="required form-label">Sertifikat</label>
                <div class="col-lg-12 fv-row">
                    <!--begin::Dropzone-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Dropzone-->
                        <div class="dropzone" id="dropzone-sertifikat">
                            <!--begin::Message-->
                            <div class="dz-message needsclick">
                                <!--begin::Icon-->
                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                <!--end::Icon-->

                                <!--begin::Info-->
                                <div class="ms-4">
                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Masukkan file
                                        di sini atau klik untuk mengunggah.</h3>
                                    <span class="fs-7 fw-bold text-gray-400">Unggah Hingga 10
                                        File. File Maks
                                        Ukuran 20MB
                                    </span>
                                </div> <!--end::Info-->
                            </div>
                        </div>
                        <!--end::Dropzone-->
                    </div>
                    <!--end::Input group-->
                    <!--end::Dropzone-->
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <a href="javascript:;" class="form-wizard-previous-btn float-left">Sebelumnya</a>
                <a href="javascript:;" class="form-wizard-next-btn float-right">Setelahnya</a>
            </div>
        </div>
    </div>
</fieldset>
