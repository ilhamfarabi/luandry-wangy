<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'user_id','layanan_id','nama_pelanggan','jumlah','total_harga','status'
    ];

    public function layanan() {
        return $this->belongsTo(Layanan::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
