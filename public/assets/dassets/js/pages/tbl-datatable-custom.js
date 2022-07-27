'use strict';
$(document).ready(function() {
    // [ Zero-configuration ] start
    $('#zero-configuration').DataTable();

    // [ HTML5-Export ] start
    $('#key-act-button1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                text: 'Export Search Results',
                className: 'btn btn-default',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5,]
                }
            }
        ]

    });
	$('#key-act-button2').DataTable({
       dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                text: 'Export Search Results',
                className: 'btn btn-default',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4,]
                }
            }
        ] 
        
    });

	$('#key-act-button3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                text: 'Export Search Results',
                className: 'btn btn-default',
                exportOptions: {
                    columns: [0, 1, 2, 3,]
                }
            }
        ]

    });
	$('#key-act-button4').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                text: 'Export Search Results',
                className: 'btn btn-default',
                exportOptions: {
                    columns: [0, 1, 2, 3,4,5,6,7,]
                }
            }
        ]

    });
	$('#key-act-button').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                text: 'Export Search Results',
                className: 'btn btn-default',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,]
                }
            }
        ]

    });

    // [ Columns-Reorder ] start
    $('#col-reorder').DataTable({
        colReorder: true
    });

    // [ Fixed-Columns ] start
    $('#fixed-columns-left').DataTable({
        scrollY: "300px",
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        fixedColumns: true,
    });
    $('#fixed-columns-left-right').DataTable({
        scrollY: "300px",
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        fixedColumns: true,
        fixedColumns: {
            leftColumns: 1,
            rightColumns: 1
        },
    });
    $('#fixed-header').DataTable({
        fixedHeader: true
    });

    // [ Scrolling-table ] start
    $('#scrolling-table').DataTable({
        scrollY: 300,
        paging: false,
        keys: true
    });

    // [ Responsive-table ] start
    $('#responsive-table').DataTable({
    });

    $('#responsive-table-model').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function(row) {
                        var data = row.data();
                        return 'Details for ' + data[0] + ' ' + data[1];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});
