<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warga extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'umur', 'status', 'pekerjaan', 'tempat_tinggal', 'penghasilan',
    ];
    public function bantuans(): HasMany
    {
        return $this->hasMany(Bantuan::class, 'id_warga');
    }
}

