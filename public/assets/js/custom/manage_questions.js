$(document).ready(function() {

    $('table thead tr').clone(true).appendTo( '#product_list thead' );
    
    $('table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();

        if(title =='Action' || title =='Image'){
           
            $(this).html( '' );

        }else{

            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            
            $( 'input', this ).on( 'keyup change', function () {
                if ( oTable.api().column(i).search() !== this.value ) {
                    oTable
                    .api().column(i)
                    .search( this.value )
                    .draw();
                }
            });
        }
    } );

    var oTable = $('table').dataTable({
        "aoColumns": [
            {"mData": "que_id"},
            {"mData": "question"},
            {"mData": "mode", "sClass": "text-center"},
            {"mData": "answer_type", "sClass": "text-center"},
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
        "sAjaxSource": base_url+"get-question-list",
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