<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = ['village_name', 'address', 'email', 'logo', 'phone'];

    public static function getSetting(): self
    {
        return self::firstOrCreate([], [
            'village_name' => 'Desa Sudimoro',
            'address' => 'Desa Sudimoro, Kecamatan Musuk, Kabupaten Boyolali, Jawa Tengah',
            'email' => 'info@desasudimoro.desa.id',
            'phone' => '+62 812-3456-7890',
        ]);
    }
}
