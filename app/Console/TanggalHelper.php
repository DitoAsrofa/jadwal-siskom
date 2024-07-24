<?php

namespace App\Helpers;

use Carbon\Carbon;

class TanggalHelper
{
    public static function formatTanggalIndonesia($tanggal)
    {
        return Carbon::parse($tanggal)->translatedFormat('l, d F Y');
    }
}
