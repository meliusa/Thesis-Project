"use strict";

// Class definition
var KTFormRepeaterBasic = function () {
    // Private functions
    var example2 = function () {
        $('#kt_docs_repeater_basic').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();

                // Re-init select2
                $(this).find('[data-kt-repeater="select2"]').select2();

                // Re-init flatpickr
                $(this).find('[data-kt-repeater="datepicker"]').flatpickr();
            },

            hide: function (deleteElement) {
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: 'Anda akan menghapus data ini. Tindakan ini tidak dapat dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#adb5bd',
                    confirmButtonText: 'Hapus',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).slideUp(deleteElement);
                        Swal.fire(
                            'Berhasil!',
                            'Data Berhasil Dihapus!',
                            'success'
                        )
                    }
                })
            },

            ready: function (setIndexes) {
                // Init select
                $('[data-kt-repeater="select2"]').select2();

                // Init flatpickr
                $('[data-kt-repeater="datepicker"]').flatpickr();


            },

            isFirstItemUndeletable: true

        });
    }

    return {
        // Public Functions
        init: function () {
            example2();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTFormRepeaterBasic.init();
});
