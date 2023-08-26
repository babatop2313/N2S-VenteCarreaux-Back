<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\UserInfo;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password','prenom', 'nom', 'telephone', 'image', 'profil', 'affectation',
        'status','dep_id','region_id',
    ];


    public function roles()
    {
        return $this->hasOne(Role::class);

    }
    public function userinfo()
    {
        return $this->hasOne(UserInfo::class);
    }
        public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    public function dep(){
        return $this->belongsTo(Dep::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

     public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


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
    ];
    /**
 * Always encrypt the password when it is updated.
 *
  * @param $value
 * @return string
 */

}
