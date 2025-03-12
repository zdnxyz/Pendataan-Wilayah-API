<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['id_umkm', 'tanggal', 'income', 'outcome', 'profit_loss', 'bukti_transaksi'];

    // Relasi ke User
    public function user() {
        return $this->belongsTo(User::class, 'id_umkm');
    }

    // Relasi ke UMKM
    public function umkm() {
        return $this->belongsTo(Umkm::class, 'id_umkm');
    }
}
