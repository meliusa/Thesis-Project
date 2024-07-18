{{-- data riwayat pekerjaan --}}
<fieldset class="wizard-fieldset">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h2>Data Riwayat Pekerjaan</h2>
            </div>
        </div>

        <div class="card-body">
            <div id="kt_docs_repeater_basic" class="collapse show">

                <div data-repeater-list="group-b">
                    <div data-repeater-item="group-b">
                        <input type="hidden" name="id_karyawan">
                        <div class="card-body border-top p-9">

                            <div class="form-group mb-3">
                                <label class="required form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control  mb-3" id=""
                                    placeholder="Nama Perusahaan" name="nama_perusahaan">
                                <!--  <div class="wizard-form-error"></div> -->
                            </div>

                            <label for="date" class="required form-label">Lama
                                Bekerja</label>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="col-12">
                                        <div class="input-group date" id="startDate">
                                            <input name="tgl_masuk" class="form-control" placeholder="Tanggal Mulai"
                                                data-kt-repeater="datepicker" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-12">
                                        <div class="input-group date" id="endDate">
                                            <input name="tgl_keluar" class="form-control" placeholder="Tanggal Selesai"
                                                data-kt-repeater="datepicker" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="required form-label">Posisi Pekerjaan</label>
                                <input type="text" class="form-control" id="" placeholder="Posisi Pekerjaan"
                                    name="posisi">
                                <!--  <div class="wizard-form-error"></div> -->
                            </div>

                            <div class="form-group">
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
                        <a href="javascript:;" data-repeater-create="group-b" class="btn btn-light-primary">
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
