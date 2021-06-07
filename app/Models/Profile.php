<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function profileImage(){
      $imagePath =  ($this->image) ? $this->image : 'profile/w4byjUXY3PBeTu56qL8RebjmE3J84h0usXSdEHTh.png';
      return '/storage/'  . $imagePath;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function followers(){
      return $this->belongsToMany(User::class);
  }
}


