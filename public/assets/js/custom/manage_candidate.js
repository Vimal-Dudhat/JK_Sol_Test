$(document).ready(function() {

    var oTable = $('table').dataTable({
        "aoColumns": [
            {"mData": "candidate_id"},
            {"mData": "name", "sClass": "text-center"},
            {"mData": "field", "sClass": "text-center"},
            {"mData": "mode", "sClass": "text-center"},
            {"mData": "user_name", "sClass": "text-center"},
            {"mData": "password", "sClass": "text-center"},
            {"mData": "time", "sClass": "text-center"},
            {"mData": "total_questions", "sClass": "text-center"},
            {"mData": "action", "sClass": "text-center"},
            ],
        // set the initial value
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
        "orderCellsTop": true,
        "bLengthChange": true,
        "pageLength": 25,
        // "searching": false,
        "bDestroy": true,
        "bStateSave": true,
        "aaSorting": [],
        "bProcessing": true,
        "bServerSide": true,
        "scrollX": true,
        "sServerMethod": "POST",
        "sAjaxSource": base_url+"get-candidate-list",
        // "drawCallback": function(settings) {
        //     $(".select_2").formSelect();
        // },
        "lengthMenu": [ 25, 50, 75, 100],
        "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        "sPaginationType": "full_numbers",
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page",
            "sEmptyTable": "No data available",
            "oPaginate": {
                "sPrevious": "Prev",
                "sNext": "Next"
            }
        },
        "aoColumnDefs": [
        {"bSortable": true, "aTargets": [0]},
        {"bSortable": false, "aTargets": [1]},
        {"bSortable": false, "aTargets": [2]},
        {"bSortable": false, "aTargets": [3]},
        {"bSortable": false, "aTargets": [4]},
        {"bSortable": false, "aTargets": [5]},
        {"bSortable": false, "aTargets": [6]},
        {"bSortable": false, "aTargets": [7]},
        {"bSortable": false, "aTargets": [8]},
        ],
    });
} );

function update_product_status(product_id, status) {

    $.ajax({
        type: 'POST',
        url: base_url + 'update-product-status',
        data: {
            product_id: product_id,
            status: status
        },
        success: function (data) {
            if (data == 'false') {
                location.reload();
            }
        }
    });
}


