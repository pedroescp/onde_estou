<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Locations extends Authenticatable
{
    protected $fillable = ['user_id', 'company_id', 'sector_id', 'date_time', 'return_forecast'];

    // Relacionamentos com as tabelas users, companies, e sectors
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
