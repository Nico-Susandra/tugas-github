<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    
    protected $table = 'music';

    
    protected $fillable = [
        'nama_penyewa',
        'nama_alat_musik',
        'tanggal_pinjam',
        'tanggal_kembali',
        'harga_sewa',
        'keterangan',
    ];

    // Jika Anda ingin menambahkan relasi, Anda bisa melakukannya di sini
    // Contoh: public function user() { return $this->belongsTo(User::class); }
}