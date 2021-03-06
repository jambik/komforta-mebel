<?php

namespace App;

use App\Traits\ResourceableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait, ResourceableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'provider_id',
        'provider',
        'avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @param $userData
     * @return static
     */
    public static function findByUserNameOrCreate($userData)
    {
        $user = User::where('provider_id', $userData->id)->where('provider', $userData->provider)->first();

        if( ! $user)
        {
            $user = User::create([
                'provider_id' => $userData->id,
                'provider' => $userData->provider,
                'name' => $userData->name,
                'email' => $userData->email,
                'avatar' => $userData->avatar
            ]);
        }

        static::checkIfUserNeedsUpdating($userData, $user);

        return $user;
    }

    /**
     * @param $userData
     * @param $user
     */
    public static function checkIfUserNeedsUpdating($userData, $user)
    {
        $socialData = [
            'avatar' => $userData->avatar,
            'email'  => $userData->email,
            'name'   => $userData->name
        ];
        $dbData = [
            'avatar' => $user->avatar,
            'email'  => $user->email,
            'name'   => $user->name
        ];

        if (!empty(array_diff($socialData, $dbData)))
        {
            $user->avatar = $userData->avatar;
            $user->email  = $userData->email;
            $user->name   = $userData->name;
            $user->save();
        }
    }
}
