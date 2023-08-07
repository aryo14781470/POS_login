<main>
    <div class="container px-4">
        <h2 class="mt-4">Report</h2>
		<?php
		if(isset($_SESSION['alert'])){
			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
		}
		?>

<!--	Card Filter -->
		<div class="row">
			<div class="col-lg-4" id="formfilter">
				<div class="card">
					<div class="card-header">
						<Strong>Form Filter</Strong>
					</div>
					<form action="" method="post">
						<div class="card-body">
							<div class="input-group mb-2">
								<span style="width:100px" class="input-group-text">Filter by :</span>
								<select class="form-select" name="periode" id="periode" title="Pilih Tahun Ajaran" required>
									<option value="">-PILIH-</option>
									<option value="tanggal">Tanggal</option>
									<option value="bulan">Bulan</option>
									<option value="tahun">Tahun</option>
									<option value="sales">Sales</option>
									<option value="barang">Barang</option>
									<option value="activity">Activity</option>
								</select>
							</div>
							<button onclick="prosesReset()" type="button" id="btnreset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
							<!--ketika di klik tombol Proses, maka akan mengeksekusi fungsi javascript prosesPeriode() , untuk menampilkan form-->
							<button onclick="prosesPeriode()" type="button" id="btnproses" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Proses</button>
							<!--ketika di klik tombol Reset, maka akan mengeksekusi fungsi javascript prosesReset() , untuk menyembunyikan form-->
						</div>
					</form>
				</div>
			</div>
			<?php include "modal/sales.php"; ?>
			<?php include "modal/barang.php"; ?>
		</div>

<!--		--><?php
//			if (isset($_POST['periode'])){
//				$periode = $_POST['periode'];
//				switch ($periode){
//					case ("sales") :
//						include "modal/sales.php";
//						break;
//					case ("barang") :
//						include "modal/barang.php";
//						break;
//					default :
//						include "modal/result.php";
//				}
//			}else{
//				include "modal/result.php";
//			}
//		?>
<!--		--><?php //include "modal/result.php"; ?>

    </div>
</main>

<script type="text/javascript">

/*digunakan untuk menyembunyikan form tanggal, bulan dan tahun saat halaman di load */
    $(document).ready(function() {

		$("#sales").hide();
		$("#barang").hide();
		// $("#summary").hide();
		$("#btnreset").hide();

    });

/*digunakan untuk menampilkan form tanggal, bulan dan tahun*/

    function prosesPeriode(){
        var periode = $("[name='periode']").val();

		switch (periode) {
			case ("sales") :
				$("#btnproses").hide();
				$("#btnreset").show();
				$("#sales").show();
				break;
			case ("barang") :
				$("#btnproses").hide();
				$("#btnreset").show();
				$("#barang").show();
				break;
		}

        // if(periode == "tanggal"){
        //     $("#btnproses").hide();
		// 	$("[name='valnilai']").val('tanggal');
        //     $("#tanggalfilter").show();
		//
        // }else if(periode == "bulan"){
        //     $("#btnproses").hide();
        //     $("[name='valnilai']").val('bulan');
        //     $("#bulanfilter").show();
		//
        // }else if(periode == "tahun") {
		// 	$("#btnproses").hide();
		// 	$("[name='valnilai']").val('tahun');
		// 	$("#tahunfilter").show();
		// }
    }

/*digunakan untuk menytembunyikan form tanggal, bulan dan tahun*/

    function prosesReset(){
        $("#btnproses").show();
		$("#btnreset").hide();

		$("#sales").hide();
		$("#barang").hide();
        // $("#tanggalfilter").hide();
        // $("#tahunfilter").hide();
        // $("#bulanfilter").hide();
        // $("#cardbayar").hide();
		//
        // $("#periode").val('');
        // $("#tanggalawal").val('');
        // $("#tanggalakhir").val('');
        // $("#tahun1").val('');
        // $("#bulanawal").val('');
        // $("#bulanakhir").val('');
        // $("#tahun2").val('');
        // $("#targetbayar").empty();
    }

</script>

