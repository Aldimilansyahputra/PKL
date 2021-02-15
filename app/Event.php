<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table ='events';
    protected $fillable = ['id','gambar', 'judul', 'deskripsi','link_website'];
}
