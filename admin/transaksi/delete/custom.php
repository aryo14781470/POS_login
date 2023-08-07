
<!-- Cek jquery-->
<!--script type="text/javascript">
$(document).ready(function(){
    if (jQuery) {  
    // jQuery is loaded  
    alert("Yeah!");
    } else {
    // jQuery is not loaded
    alert("Doesn't Work");
    }
});
</script-->
<script>
    $(document).ready(function(){
        // Kategori dependent ajax
        $("#kategori").on("change",function(){
            var kategori = $(this).val();
            $.ajax({
                url : 'transaksi/select.php',
                type:"POST",
                cache:false,
                data:{kategori_id : kategori},
                success:function(data){
                    console.log(data);
                    $("#desain").html(data);
                }
            });			
        });

        $("#desain").on("change",function(){
            var gambar = $(this).val();
            $.ajax({
                url : 'transaksi/select.php',
                type:"POST",
                cache:false,
                data:{gambar_id : gambar},
                beforeSend: function(){
                    $('#gambar').empty();
                },
                success:function(data){
                    console.log(data);
                    $("#gambar").html(data);
                    //$('#city').html('<option value="">Select city</option>');
                }
            });			
        });
    });

    function getModel(){
        let kategori = $('#kategori').val();
        $.ajax({
            type: 'POST',
            url: 'transaksi/selection.php',
            cache:false,
            data: {
                kategori_id : kategori,
                function_name : 'getModel'
            },
            beforeSend: function(){
                $('#desain').empty(),
                $('#desain').append('<option value="">--PILIH--</option>')
            },
            success: function(response){
                let data = JSON.parse(response);
                for (let index = 0; index < data.length; index++) {
                    $('#desain').append('<option value="'+data[index].id_gambar+'">'+data[index].nama_gambar+'</option>')
                }
            }
        })
    };
    
    function getGambar(){
        let desain = $('#desain').val();
        console.log(desain);
        $.ajax({
            type: 'POST',
            url: 'transaksi/selection.php',
            cache:false,
            data: {
                gambar_id : desain,
                function_name : 'getGambar'
            },
            success: function(response){
                //let data = JSON.parse(response);
                //alert(data);
                console.log(response);
                $("#gambar").html(response);
            }
        })
    }

</script>
<!-- Cart Custom-->
<div class="row card">
    <div class="card-header">
        <strong>Custom PO</strong>
    </div>
    <div class="card-body">
    <form action="/" method="post">
        <table class="table table-bordered">
            <tr>
                <th>Id Barang</th>
                <td>
                    <input type="text" name="id_barang" class="form-control" value="<?php set_id_brg($_POST['order'])?>" >
                </td>
            </tr>
            <tr>
                <th>Type Barang</th>
                <td>
                <select class="form-select" name="kategori" id="kategori" required>
                    <option selected>--PILIH--</option>
                    <?php
                        $kategori = viewKategori();
                        while ($rowKategori = mysqli_fetch_array($kategori)){
                    ?>
                            <option value="<?php echo $rowKategori['id_kategori']; ?>">(<?php echo $rowKategori['id_kategori']; ?>)<?php echo $rowKategori['nama_kategori']; ?></option>
                    <?php } ?>
                </select>
                </td>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <td>
                    <input type="text" name="nama" class="form-control" placeholder="nama barang" required>
                </td>
            </tr>
            <tr>
                <th>Bahan</th>
                <td>
                <select class="form-select" name="bahan" id="bahan" required>
                    <option value="">--PILIH--</option>
                    <?php
                        $bahan = viewBahan();
                        while($rowBahan = mysqli_fetch_array($bahan)){
                    ?>
                        <option value="<?= $rowBahan['id_bahan']; ?>"><?= $rowBahan['id_bahan']; ?> (<?= $rowBahan['nama_bahan']; ?>)</option>
                    <?php
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <th>Ukuran</th>
                <td>
                <select class="form-select" name="ukuran" required>
                    <option value="">--PILIH--</option>
                    <?php
                        $ukuran = viewUkuran();
                        while($rowUkuran = mysqli_fetch_array($ukuran)){
                    ?>
                        <option value="<?= $rowUkuran['id_ukuran']; ?>"><?= $rowUkuran['nama_ukuran']; ?></option>
                    <?php
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <th>Sheet</th>
                <td>
                <select class="form-select" name="sheet" required>
                    <option value="">--PILIH--</option>
                    <?php
                        $sheet = viewSheet();
                        while($rowSheet = mysqli_fetch_array($sheet)){
                    ?>
                        <option value="<?= $rowSheet['id_sheet']; ?>"><?= $rowSheet['lapisan_sheet']; ?></option>
                    <?php
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <th>Type Model</th>
                <td>
                    <select class="form-select" name="desain" id="desain" required>
                        <option value="">--PILIH--</option>
                    </select>
                    <br>
                    <div id="gambar">
                        <img src="../assets/img/desain/noimages.jpg" class="rounded mx-auto d-block" width="200px" height="200px" alt="noimage.jpg">
                    </div>
                </td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>
                    <input type="number" name="jumlah" class="form-control" placeholder="jumlah beli" required>
                </td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>
                    <input type="number" name="harga" class="form-control" placeholder="harga" required>
                </td>
            </tr>
        </table>
    </div>
        <div class="card-footer">
            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Proses</button>
            <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
        </div>
    </form>
</div>

