<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'is_admin'];
    protected $hidden = ['password', 'remember_token'];

    public function capsules()
    {
        return $this->hasMany(Capsule::class);
    }

    public static function create(array $data)
    {
        try {
            $user = new self();
            $user->fill([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'is_admin' => $data['is_admin'] ?? false,
            ]);
            $user->save();
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error creating user: " . $e->getMessage());
        }
    }

    public static function findAll()
    {
        try {
            return self::all();
        } catch (\Exception $e) {
            throw new \Exception("Error fetching users: " . $e->getMessage());
        }
    }

    public static function find($id)
    {
        try {
            return self::findOrFail($id);
        } catch (\Exception $e) {
            throw new \Exception("Error fetching user: " . $e->getMessage());
        }
    }
}
