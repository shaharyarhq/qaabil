<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Andreia\FilamentUiSwitcher\Models\Traits\HasUiPreferences;
use App\Enums\Panel as EnumsPanel;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Notifications\BadgeEarnedNotification;
use DutchCodingCompany\FilamentSocialite\Models\SocialiteUser;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use QCod\Gamify\Badge;
use QCod\Gamify\Gamify;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar, MustVerifyEmail
// ,
//  MustVerifyEmail
{
    use Gamify;

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    use HasRoles;
    use HasUiPreferences;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'avatar_url',
        'email',
        'password',
    ];

    protected $attributes = [
        'status' => UserStatus::PENDING,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class,
            'ui_preferences' => 'array',
        ];
    }

    public function socialiteUser(): HasOne
    {
        return $this->hasOne(SocialiteUser::class);
    }

    public function getActiveProviderAttribute()
    {
        return $this->socialiteUsers->first()?->provider ?? 'email';
    }

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class, 'created_by');
    }

    public function approvedVideos(): HasMany
    {
        return $this->hasMany(Video::class, 'approved_by');
    }

    public function userProgress()
    {
        return $this->hasMany(UserObjectiveProgress::class);
    }
    public function isSuperAdmin(): bool
    {
        return $this->hasRole(UserRole::SUPER_ADMIN);
    }

    public function isStudent(): bool
    {
        return $this->hasRole(UserRole::STUDENT);
    }

    public function isModerator(): bool
    {
        return $this->hasRole(UserRole::MODERATOR);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            EnumsPanel::ADMIN->value => $this->isSuperAdmin(),
            EnumsPanel::MEMBER->value => $this->isStudent(),
            EnumsPanel::MODERATOR->value => $this->isModerator(),
            default => false,
        };
    }

    public function getFilamentAvatarUrl(): ?string
    {
        $avatarColumn = config('filament-edit-profile.avatar_column', 'avatar_url');
        $avatar = $this->{$avatarColumn};

        if (! $avatar) {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->name ?? 'U')
                . '&color=FFFFFF&background=oklch(0.145 0.008 326)';
        }

        // If it's already a full URL, return as-is
        if (str_starts_with($avatar, 'http://') || str_starts_with($avatar, 'https://')) {
            return $avatar;
        }

        return Storage::url($avatar);
    }

    public function syncBadges($user = null): void
    {
        $user = is_null($user) ? $this : $user;

        // Already loaded from the sync call — no extra query
        $before = $user->badges()->pluck('badge_id')->toArray();

        $badgeIds = app('badges')
            ->filter->qualifier($user)
            ->map->getBadgeId();

        $user->badges()->sync($badgeIds); // single sync query

        // Diff in memory — no extra DB hit
        $newBadgeIds = array_diff($badgeIds->toArray(), $before);

        if (! empty($newBadgeIds)) {
            Badge::whereIn('id', $newBadgeIds)
                ->get()
                ->each(fn($badge) => $user->notify(
                    new BadgeEarnedNotification($badge)
                ));
        }
    }

    public function videoViews(): HasMany
    {
        return $this->hasMany(VideoView::class);
    }
}
