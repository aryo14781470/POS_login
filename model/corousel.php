<?php

	function corousel_indikators(){
		$result = viewBarang();
		$active = "active";
		$indicator = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<li data-bs-target="#corousel-produk" data-bs-slide-to="'.$indicator.'" class="'.$active.'"></li>';
			$active = "";
			$indicator++;
		}
	}

	function corousel_inners(){
		$result = viewBarang();
		$active = "active";
		while ($row = mysqli_fetch_assoc($result)) {
			echo content_corousel($active, $row["gambar_brg"], $row['nama_brg'], $row['id_bahan'], $row['id_sheet'], $row['harga_brg'], $row['desk_brg']);
			$active = "";
		}
	}
