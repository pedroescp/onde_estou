<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\CompaniesStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Companies extends Authenticatable
{

    public $timestamps = true;

    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'status', 'parent_id'];

    // Relacionamento com a tabela sectors
    public function sectors()
    {
        return $this->hasMany(Sector::class, 'company_id');
    }

    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (CompaniesStatus $status) => $status->name,
        );
    }
}
