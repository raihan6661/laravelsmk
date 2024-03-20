<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';    // nama table pada database
    protected $primaryKey = 'id';   // primary key
    public $timestamps = false;      // true = butuh field created_at dan updated_at
}

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';      // nama table pada database
    protected $primaryKey = 'id';   // primary key
    protected $guarded = ['id'];
    public $timestamps = false;     // true = btuh field created_at dan updated_at
}



