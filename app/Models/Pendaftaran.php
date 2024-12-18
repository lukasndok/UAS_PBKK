<?php

namespace App\Models;

use App\Models\Ekstrakulikuler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $tables = 'pendaftarans';
    public $timestamps = true;
    public $fillable = ['nama_lengkap', 'alamat', 'kota', 'tanggal_lahir',
        'kelas', 'foto_url', 'ekstrakulikuler_id', 'status', 'tanggal_pendaftaran',
        'user_id'];
    public function ekstrakulikuler(){
        return $this->hasOne(Ekstrakulikuler::class, 'id', 'ekstrakulikuler_id');
    }
}
