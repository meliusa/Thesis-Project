"use strict";

var KTUsersList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_users');
    var datatable;

    // Private functions
    var initUserTable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            "pageLength": 10,
            "lengthChange": true,
            'columnDefs': [{
                    orderable: false,
                    targets: 0
                }, // Disable ordering on column 0 (checkbox)
                {
                    orderable: false,
                    targets: -1
                }, // Disable ordering on column 6 (actions)                
            ]
        });
    }

    return {
        // Public functions  
        init: function () {
            if (!table) {
                return;
            }

            initUserTable();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersList.init();
});
