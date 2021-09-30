<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function login($request) {
        $validate = $request->validate([
            'email' => 'email|required|exists:users,email',
            'password' => 'string|min:6|required',
        ]);

        // Check email
        $user = User::where('email', $validate['email'])->first();

        // Check password
        if(!$user || !Hash::check($validate['password'], $user->password)) {
            return response([
                'message' => 'invalid credentials'
            ])->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken($user->first_name . ' ' . $user->last_name)->plainTextToken;
        return ['user' => $user, 'token' => $token];
    }

    /**
     *
     * Get the companies that belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    /**
     * Get all of the gigs for the user.
     */
    public function gigs()
    {
        return $this->hasManyThrough(Gig::class, Company::class, );
    }
}
