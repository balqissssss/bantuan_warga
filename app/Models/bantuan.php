<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class bantuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_warga', 'total_bantuan', 'tanggal',
    ];
    public function warga()
    {
        return $this->belongsTo(warga::class, 'id_warga');
    }
}
