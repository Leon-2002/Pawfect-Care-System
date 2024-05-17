<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Review;
use App\Models\Bookings;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
        // all column will be validate
        protected $guarded =[];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    //  protected $primaryKey = 'UserID';

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    public function bookings()
    {
        return $this->hasMany(Bookings::class, 'EmployeeID');
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'UserID');
    }

    // public function services()
    // {
    //     return $this->hasMany(Service::class, 'UserID');
    // }

    public function Services()
    {
        return $this->hasMany(Service::class, 'EmployeeID');
    }
    
    public function service_provider(){
        return $this->hasMany(Bookings::class, 'EmployeeID');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'ReviewID');
    }

    public function employee()
    {
        return $this->hasMany(Review::class, 'EmployeeID');
    }
}
