<?php

function tanggal($tgl){
    return date('d-M-Y H:i:s', strtotime($tgl));
}

?>