{{-- data gaji karyawan --}}
<fieldset class="wizard-fieldset">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h2>Data Gaji Karyawan</h2>
            </div>
        </div>
        <div class="card-body pt-0">

            <input type="hidden" class="form-control" name="id_karyawan">
            <input type="hidden" class="form-control" name="nik_karyawan">
            <input type="hidden" class="form-control" name="gaji_bersih">

            <div class="form-group mb-3">
                <label class="required form-label">Gaji Pokok</label>
                <input type="text" class="form-control  mb-3" id="" placeholder="Gaji Pokok"
                    name="gaji_pokok">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">PPh21</label>
                <input type="text" class="form-control  mb-3" id="" placeholder="PPh21" name="PPH21">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Asuransi</label>
                <input type="text" class="form-control  mb-3" id="" placeholder="Asuransi" name="asuransi">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group d-flex justify-content-between">
                <a href="javascript:;" class="form-wizard-previous-btn float-left">Sebelumnya</a>
                <button type="submit" class="form-wizard-submit float-right border-0">Simpan</button>
            </div>
        </div>
    </div>
</fieldset>
