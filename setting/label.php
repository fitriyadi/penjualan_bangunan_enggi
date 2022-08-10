<?php
function label($jenis)
{
    switch ($jenis) {
        case 'Koleris':
            return "<span class='badge badge-warning'>Koleris</span>";
            break;

        case 'Melankolis':
            return "<span class='badge badge-secondary'>Melankolis</span>";
            break;

        case 'Plegmatis':
            return "<span class='badge badge-info'>Plegmatis</span>";
            break;

         case 'Sanguin':
            return "<span class='badge badge-primary'>Sanguin</span>";
            break;

        default:
            return "";
            break;
    }
}

function label_jenis_bayar($jenis)
{
    switch ($jenis) {
        case 'Langsung':
            return "<span class='badge badge-primary'>Langsung</span>";
            break;

        case 'Kredit':
            return "<span class='badge badge-warning'>Kredit</span>";
            break;

        default:
            return "";
            break;
    }
}

function label_status_bayar($jenis)
{
    switch ($jenis) {
        case 'Lunas':
            return "<span class='badge badge-success'>Lunas</span>";
            break;

        case 'Belum Lunas':
            return "<span class='badge badge-danger'>Belum Lunas</span>";
            break;

        default:
            return "";
            break;
    }
}

function label_stok($stok,$min)
{
    if($stok>$min){
        return "<span class='badge badge-success'>$stok</span>";
    }else{
        return "<span class='badge badge-danger'>$stok</span>";
    }
}


?>