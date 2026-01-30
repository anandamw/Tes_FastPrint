<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $primaryKey = 'id_status';
    public $incrementing = true;
    protected $fillable = ['nama_status'];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'status_id', 'id_status');
    }
}
