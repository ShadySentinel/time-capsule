<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\IpLocationService;
use Illuminate\Support\Facades\App;

class Capsule extends Model
{
    protected $fillable = ['user_id', 'message', 'mood', 'reveal_date', 'is_public', 'ip_address'];
    protected $dates = ['reveal_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ipLocation()
    {
        return $this->hasOne(IpLocation::class, 'ip_address', 'ip_address');
    }

    
    public static function create(array $data)
    {
        try {
            $capsule = new self();
            $capsule->fill([
                'user_id' => $data['user_id'],
                'message' => $data['message'],
                'mood' => $data['mood'],
                'reveal_date' => $data['reveal_date'],
                'is_public' => $data['is_public'] ?? false,
                'ip_address' => $data['ip_address'] ?? request()->ip(),
            ]);
            $capsule->save();

            $ipLocationService = App::make(IpLocationService::class);
            $ipLocationService->assignLocation($capsule);

            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error creating capsule: " . $e->getMessage());
        }
    }

    public static function findAll($publicOnly = false)
    {
        try {
            $query = self::with('ipLocation');
            if ($publicOnly) {
                $query->where('is_public', true)->where('reveal_date', '<=', now());
            }
            return $query->get();
        } catch (\Exception $e) {
            throw new \Exception("Error fetching capsules: " . $e->getMessage());
        }
    }

    public static function find($id)
    {
        try {
            return self::with('ipLocation')->findOrFail($id);
        } catch (\Exception $e) {
            throw new \Exception("Error fetching capsule: " . $e->getMessage());
        }
    }
}