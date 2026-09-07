<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    public $timestamps = false;

    protected $fillable = ['email', 'code', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public static function generate(string $email): self
    {
        self::where('email', $email)->delete();

        return self::create([
            'email' => $email,
            'code' => str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT),
            'expires_at' => now()->addMinutes(10),
        ]);
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }
}
