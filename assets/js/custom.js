// =============  Data Table - (Start) ================= //

$(document).ready(function(){
    $('#tableBarang').DataTable();
});

$(document).ready(function(){
    $('#exportTableBarang').DataTable({
        buttons:['excel', 'pdf', 'print'],
        dom: 'Bfrtip',
        responsive: true,
        "bFilter": false,
        "bInfo": false,
    });
});

var minDate, maxDate;

$(document).ready(function(){

	$.fn.dataTable.ext.search.push(
		function( settings, data, dataIndex ) {
			var min = minDate.val();
			var max = maxDate.val();
			// data[1] data digunakan untuk mengambil data dari kolom tanggal indeks ke 3 dari table
			var date = new Date( data[3] );

			if (
				( min === null && max === null ) ||
				( min === null && date <= max ) ||
				( min <= date && max === null ) ||
				( min <= date && date <= max )
			) {
				return true;
			}
			return false;
		}
	);

	// Refilter the table
	$('#dari_tanggal, #sampai_tanggal').on('change', function () {
		// table.draw();
		if ($('#dari_tanggal').val() === '' && $('#sampai_tanggal').val() === '') {
			// Kembalikan tabel ke kondisi awal tanpa filter
			table.draw();
		} else {
			// Lakukan filter dengan tanggal yang dipilih
			table.draw();
		}
	});

	// Create date inputs
	minDate = new DateTime($('#dari_tanggal'), {
		format: 'MMMM Do YYYY'
	});
	maxDate = new DateTime($('#sampai_tanggal'), {
		format: 'MMMM Do YYYY'
	});

	var table = $('#table_contoh').DataTable({
		dom: "<'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>>",
		buttons: [
			{
				extend: 'excel',
				filename: 'nama_file_excel',
				exportOptions: {
					columns: ':visible',
					text: '',
					modifier: {
						selected: false
					}
				}
			}, {
				extend: 'pdf',
				filename: 'nama_file_pdf',
				exportOptions: {
					columns: ':visible',
					text: '',
					modifier: {
						selected: false
					}
				}
			}, {
				extend: 'print',
				filename: 'nama_file_print',
				exportOptions: {
					columns: ':visible',
					text: '',
					modifier: {
						selected: false
					}
				}
			}, {
				extend: 'colvis',
				text: 'visible',
				exportOptions: {
					modifier: {
						selected: false
					}
				}
			}
		],
		columnDefs: [ {
			targets: [-1],
			visible: false,
			searchable: false,
			orderable: false,
		} ],
		select: false,
		paging: false,
		"bPaginate": false,
		"bLengthChange": false,
		"bAutoWidth": false
	});


});


window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
