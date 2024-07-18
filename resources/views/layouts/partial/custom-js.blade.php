@include('sweetalert::alert')
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('src/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('src/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('src/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('src/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('src/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('src/js/custom/widgets.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--begin::Page Custom Javascript(used by user list)-->
<script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
<script src="{{ asset('src/js/custom/apps/user-management/users/list/add.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--begin::Page Custom Javascript(Wizard)-->
<script src="{{ asset('src/js/custom/wizard/wizard.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--begin::Page Custom Javascript(Form Repeater)-->
<script src="{{ asset('src/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
<script src="{{ asset('src/js/custom/documentation/forms/formrepeater/advanced.js') }}"></script>
<script src="{{ asset('src/js/custom/documentation/forms/formrepeater/basic.js') }}"></script>
<!--end::Page Custom Javascript-->
<script src="{{ asset('assets/js/jquery-dateFormat.js') }}"></script>
<script src="{{ asset('src/js/custom/documentation/forms/daterangepicker.js') }}"></script>
<script src="{{ asset('src/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<!--end::Javascript-->
<script>
    $('.ondelete').click(function(e) {
        const form = $(this).closest("form");
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Anda Tidak Dapat di Kembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#adb5bd',
            confirmButtonText: 'Hapus',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('#kt_docs_maxlength_nik').maxlength({
            threshold: 16,
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });
        $('#kt_docs_maxlength_kk').maxlength({
            threshold: 16,
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });
        $('#kt_docs_maxlength_nik_1').maxlength({
            threshold: 16,
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });
    });
</script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#id_divisi').change(function() {
            var id_divisi = $(this).val();

            $.ajax({
                type: 'POST',
                url: '{{ route('getPosition') }}',
                data: {
                    id_divisi: id_divisi,
                    _token: '{{ csrf_token() }}'
                },
                cache: false,

                success: function(res) {
                    $('#id_posisi').html(res);
                },
                error: function(data) {
                    console.log("error:", data);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#id_karyawan').on('change', function() {
            let karyawanId = this.value;
            console.log(karyawanId)
            $('#gaji_bersih').val('');
            $.ajax({
                url: '{{ route('getSalary') }}?id=' + karyawanId,
                type: 'get',
                success: function(res) {
                    console.log(res)
                    $.each(res, function(key, value) {
                        // $('#gaji_bersih').val(value.gaji_bersih);
                        $('form').append(
                            '<input type="hidden" name="id_gaji" value="' +
                            value.id + '">',
                            '<input type="hidden" name="gaji_bersih" value="' +
                            value.gaji_bersih + '">'
                        )
                    });
                }
            });
        });
    });
</script>
<script>
    $("#kt_datepicker_1").flatpickr();
    $("#period_salary").flatpickr({
        dateFormat: "Y-m"
    });
    $("#kt_datepicker_8").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
    $("#kt_datepicker_80").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
</script>

<script>
    var myDropzone = new Dropzone("#uploadktp", {
        url: "/uploadktp", // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 1,
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response) {
            $('form').append('<input type="hidden" name="foto_ktp" value="' + response.name + '">')
        },
        error: function(response) {
            console.log(response.status)
        }
    });
</script>

<script>
    var myDropzone = new Dropzone("#uploadfoto", {
        url: "/uploadfotoSpr", // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 1,
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response) {
            $('#foto-input').val(response.name);
        },
        error: function(response) {
            console.log(response.status)
        }
    });
</script>

<script>
    var myDropzone = new Dropzone('#uploadkk', {
        url: '/uploadkk',
        paramName: 'file',
        maxFiles: 1,
        maxFilesize: 2,
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response) {
            $('form').append('<input type="hidden" name="foto_kk" value="' + response.name + '">')
        },
        error: function(response) {
            console.log(response)
        }
    })
</script>

<script>
    var uploadedDocumentMap = {}
    var myDropzone = new Dropzone("#dropzone-sertifikat", {
        url: "/uploadsertif", // Set the url for your upload script location
        uploadMultiple: true,
        maxFiles: 10,
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response) {
            $('form').append('<input type="hidden" name="file_sertifikat[]" value="' + response.name +
                '">')
            uploadedDocumentMap[file.name] = response.name
        },
        error: function(response) {
            console.log(response)
        }
    });
</script>
