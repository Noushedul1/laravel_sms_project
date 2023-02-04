<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

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
        'two_factor_recovery_codes',
        'two_factor_secret',
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
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public static $user;
    public $users;
    public $search;
    public static function adduser($request)
    {
        self::$user = new User();
        self::$user->name = $request->name;
        self::$user->email = $request->email;
        self::$user->password = bcrypt($request->password);
        self::$user->save();
    }
    // public function manage($request)
    // {
    //     $this->search = $request['search'] ?? '';
    //     if($this->search !='')
    //     {
    //         // $this->users = User::where('name','=',$this->search)->get();
    //         // Must use "$this->search"
    //         // $this->users = User::where('name','LIKE',"%$this->search")->get();
    //         // $this->users = User::where('name','LIKE',"$this->search%")->get(); 
    //         return self::$users = User::where('name','LIKE',"%$this->search%")->orWhere('email','LIKE',"%$this->search%")->get();
    //     }
    //     else
    //     {
    //         return $this->users = User::all();
    //     }
    // }
    public static function updateUser($request,$id)
    {
        self::$user = User::find($id);
        self::$user->name = $request->name;
        self::$user->email = $request->email;
        if(isset($request->password))
        {
            self::$user->password = bcrypt($request->password);
        }
        self::$user->save();
    }
}
