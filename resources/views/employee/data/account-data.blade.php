{{-- data account karyawan --}}
<fieldset class="wizard-fieldset show">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h2>Data Akun Karyawan</h2>
            </div>
        </div>
        <div class="separator mb-2"></div>
        <div class="card-body pt-0">
        <div class="card-body pt-0">
            <div class="form-group mb-3">
                <label class="required form-label">Foto Formal</label>
                <div class="col-lg-8">
                    <!--begin::Image input-->
                    <input type="hidden" name="foto">
                    <div class="image-input image-input-outline" data-kt-image-input="true"
                        style="background-image: url('assets/media/svg/avatars/blank.svg'); background-size: contain; background-repeat: no-repeat;">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-125px h-125px"
                            style="background-image: url(assets/media/avatars/30    0-1.jpg); background-size: contain; background-repeat: no-repeat;">
                        </div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Remove-->
                    </div>

                    <!--end::Image input-->
                    <!--begin::Hint-->
                    <div class="form-text">Jenis file yang diizinkan: png, jpg, jpeg.</div>
                    <!--end::Hint-->
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Nama Lengkap</label>
                <input type="text" class="form-control  mb-3" placeholder="Nama Lenngkap"
                    name="nama">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Role</label>
                <select name="id_role" aria-label="" data-control="select2" data-placeholder=""
                    class="form-select mb-2">
                    <option selected disabled>Pilih Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"> {{ $role->nama_role }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Username</label>
                <input type="text" class="form-control  mb-3" placeholder="Username"
                    name="username">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group mb-3">
                <label class="required form-label">Password</label>
                <input type="text" class="form-control  mb-3" placeholder="Password"
                    name="password">
                <!--  <div class="wizard-form-error"></div> -->
            </div>

            <div class="form-group d-flex justify-content-between">
                <a href="javascript:;" class="form-wizard-previous-btn float-left">Sebelumnya</a>
                <a href="javascript:;" class="form-wizard-next-btn float-right">Selanjutnya</a>
            </div>
        </div>
    </div>
</fieldset>
