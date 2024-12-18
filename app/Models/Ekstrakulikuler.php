<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;

    protected $tables = 'ekstrakulikuler';
    public $timestamps = true;
    public $fillable = ['nama_ekstrakulikuler', 'pembina_id'];
    public function pembina(){
        return $this->hasOne(Pembina::class, 'id', 'pembina_id');
    }
}
