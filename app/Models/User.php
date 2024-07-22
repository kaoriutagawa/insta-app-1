<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    const ADMIN_ROLE_ID = 1;
    const USER_ROLE_ID = 2;

    //user has many posts
    public function posts(){
        return $this->hasMany(Post::class)->latest();
    }

    public function commentsToPosts(){
        return $this->hasMany(Comment::class)->latest();
    }

    //user is following many users
    //user has many follows
    public function follows(){
        return $this->hasMany(Follow::class, 'follower_id');
    }

    //user is followed by many users
    public function followers(){
        return $this->hasMany(Follow::class, 'followed_id');
    }

    //return true if $this user is followed by auth user
    public function isFollowing(){
        return $this->followers()->where('follower_id', Auth::user()->id)->exists();
    }

    public function followsYou(){
        return $this->follows()->where('followed_id', Auth::user()->id)->exists();
    }
   

}
