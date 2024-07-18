"use strict";

// Class definition
var KTFormRepeaterAdvanced = function () {
    // Private functions
    var example1 = function () {
        $('#kt_docs_repeater_advanced').repeater({
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

                $(this).find('[data-kt-repeater="maxlength"]').maxlength();

            },

            hide: function (deleteElement) {
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya. Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).slideUp(deleteElement);
                        Swal.fire(
                            'Terhapus!',
                            'Data Telah Dihapus!',
                            'success'
                        )
                    }
                })
            },

            ready: function(setIndexes){
                // Init select
                $('[data-kt-repeater="select2"]').select2();

                // Init flatpickr
                $('[data-kt-repeater="datepicker"]').flatpickr();

                $('[data-kt-repeater="maxlength"]').maxlength();

            },

            isFirstItemUndeletable: true
        });        
    }

    return {
        // Public Functions
        init: function () {
            example1();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTFormRepeaterAdvanced.init();
});
