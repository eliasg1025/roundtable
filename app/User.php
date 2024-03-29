<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ruc',
        'legal_registration',
        'type_id',
        'skype_url',
        'hangouts_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function type() // $user->type->name
    {
        return $this->belongsTo(Type::class); // Pertenece a un type
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_user')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function offers() // $user->offers
    {
        return $this->hasMany(Offer::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
	}

	public function ratings()
	{
		return $this->hasMany(Rating::class);
	}

	public function user_certifications()
	{
		return $this->hasMany(UserCertfication::class);
	}
	
	public function meetings()
	{
		return $this->hasMany(Meeting::class);
	}

    // Generar slug

    public function getUrlAttribute(): string
    {
        return route('business.show', ['slug' => $this->slug]);
    }

    public function getSlugAttribute(): string
    {
        return Str::slug($this->commercial_name) . '-' . $this->uuid;
    }
}
