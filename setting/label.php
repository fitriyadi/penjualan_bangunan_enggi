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


?>