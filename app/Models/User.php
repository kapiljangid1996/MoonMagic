<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'image',
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
    ];

    public function isAdmin() 
    {
       return $this->role === 'admin';
    }

    public function isUser() 
    {
       return $this->role === 'user';
    }

    public static function editUser($request)
    { 
        $decrypted_id = Crypt::decrypt($request->id);

        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$decrypted_id],
            'password'  => ['string', 'min:8', 'sometimes', 'nullable'],
        ]);

        $users = User::find($decrypted_id);
        $users -> name = $request->name;
        $users -> email = $request->email;

        if( isset( $request->password ) && !empty( $request->password ) ) {
            $users -> password = Hash::make($request->password);
        }

        $old_image = $request->old_image;

        if ( $request->file('image') ) {

            if( !empty( $old_image ) ) {
                unlink(public_path("Uploads/User/{$old_image}"));
            }

            $imageName = time().'-'.request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/User'), $imageName); 
            $users->image = $imageName;
        }

        $users->save();
    }
}
