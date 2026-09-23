<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRole;

#[Fillable(['email', 'password', 'name'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role' => UserRole::class,
            'is_blocked' => 'boolean',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function checkPassword(string $password): void
    {
        if (!Hash::check($password, $this->password)) {
            throw new \Exception('Wrong password');
        }
    }

    public function changePassword(string $newPassword): void
    {
        $this->password = $newPassword;
        $this->save();
    }

    public function isAdmin(): bool
    {
        return $this->role === UserRole::Admin;
    }

    public function isOrganiser(): bool
    {
        return $this->role === UserRole::Organiser;
    }

    public function isParticipant(): bool
    {
        return $this->role === UserRole::Participant;
    }
}
