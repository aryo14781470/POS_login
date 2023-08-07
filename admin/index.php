<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
        <title>
			<?php
				if (isset($_GET['page'])){
					$title = preg_replace("/_/", " ", $_GET['page']);
					echo $title;
				} else{
					echo "Dashboard";
				}
			?>
		</title>
<!--        --><?php //include('../cdn.php'); ?>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <?php include('header.php') ?>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('menu.php') ?>
            </div>
            <div id="layoutSidenav_content">
                <?php include('getPage.php') ?>
                <footer class="py-4 bg-light mt-auto">
                    <?php include('footer.php') ?>
                </footer>
            </div>
        </div>
        
    </body>
</html>

<!---->
<!--<script>-->
<!--	var minDate, maxDate;-->
<!---->
<!--	$(document).ready(function(){-->
<!---->
<!--		$.fn.dataTable.ext.search.push(-->
<!--			function( settings, data, dataIndex ) {-->
<!--				var min = minDate.val();-->
<!--				var max = maxDate.val();-->
<!--				// data[1] data digunakan untuk mengambil data dari kolom tanggal indeks ke 3 dari table-->
<!--				var date = new Date( data[3] );-->
<!---->
<!--				if (-->
<!--					( min === null && max === null ) ||-->
<!--					( min === null && date <= max ) ||-->
<!--					( min <= date && max === null ) ||-->
<!--					( min <= date && date <= max )-->
<!--				) {-->
<!--					return true;-->
<!--				}-->
<!--				return false;-->
<!--			}-->
<!--		);-->
<!---->
<!--		// Refilter the table-->
<!--		$('#dari_tanggal, #sampai_tanggal').on('change', function () {-->
<!--			table.draw();-->
<!--		});-->
<!---->
<!--		// Create date inputs-->
<!--		minDate = new DateTime($('#dari_tanggal'), {-->
<!--			format: 'MMMM Do YYYY'-->
<!--		});-->
<!--		maxDate = new DateTime($('#sampai_tanggal'), {-->
<!--			format: 'MMMM Do YYYY'-->
<!--		});-->
<!---->
<!--		$('#tableBarang').DataTable();-->
<!--		var table = $('#table_contoh').DataTable({-->
<!--			dom:-->
<!--				"<'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>>",-->
<!--			buttons: [-->
<!--				{-->
<!--					extend: 'excel',-->
<!--					filename: 'nama_file_excel',-->
<!--					exportOptions: {-->
<!--						columns: ':visible',-->
<!--						text: '',-->
<!--						modifier: {-->
<!--							selected: false-->
<!--						}-->
<!--					}-->
<!--				}, {-->
<!--					extend: 'pdf',-->
<!--					filename: 'nama_file_pdf',-->
<!--					exportOptions: {-->
<!--						columns: ':visible',-->
<!--						text: '',-->
<!--						modifier: {-->
<!--							selected: false-->
<!--						}-->
<!--					}-->
<!--				}, {-->
<!--					extend: 'print',-->
<!--					filename: 'nama_file_print',-->
<!--					exportOptions: {-->
<!--						columns: ':visible',-->
<!--						text: '',-->
<!--						modifier: {-->
<!--							selected: false-->
<!--						}-->
<!--					}-->
<!--				}, {-->
<!--					extend: 'colvis',-->
<!--					text: 'visible',-->
<!--					exportOptions: {-->
<!--						modifier: {-->
<!--							selected: false-->
<!--						}-->
<!--					}-->
<!--				}-->
<!--			],-->
<!--			columnDefs: [ {-->
<!--				targets: [-1],-->
<!--				visible: false,-->
<!--				searchable: false,-->
<!--				orderable: false,-->
<!--			} ],-->
<!--			select: false-->
<!--		});-->
<!---->
<!---->
<!--	});-->
<!--</script>-->
