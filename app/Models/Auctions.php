<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auctions extends Model
{
    use HasFactory;

    protected $table = 'auctions';
    protected $fillable = [
        'Region',
        'Title',
        'type',
        'image',
        'ShowInfath',
        'PlatformName',
        'PlatformImage',
        'description',
        'dateOfStarting',
        'timeOfStarting',
        'link',
        'onsiteLink',
        'timeOfEnding',
        'dateOfEnding',
        'nowdate',
        'slug',
        'companyName',
        'infoDetails',
        'numberOfVisits'
    ];

    public function getRemainingDaysAttribute()
    {
        // Get the current date and time
        $now = Carbon::now();

        // Get the end date of the event
        $endDate = Carbon::parse($this->attributes['dateOfEnding']);

        if ($now > $endDate) {
            return 'منتهى';
        }
        // Calculate the difference in days
        $remainingDays = $endDate->diffInDays($now);

        // Return the remaining days
        return $remainingDays;
    }

    // Relations
    public function userLogs(): HasMany
    {
        return $this->hasMany(UserLog::class, 'auction_id');
    }

    public function acution_item()
    {
        return $this->hasMany(AcutionItems::class, 'Acution_id', 'id');
    }

    public function reminders()
    {
        return $this->hasMany(reminder::class, 'Acution_id', 'id');


    }


    // Query Scope
    public function scopeFilter(Builder $query, array $filters)
    {
        // filter by region
        $query->when($filters['region'] ?? false, function ($query, $reqion) {
            $query->where('Region', $reqion);
        });
        // filter by type
        $query->when($filters['type'] ?? false, function ($query, $type) {
            $query->where('type', $type);
        });
        // filter by date
        $query->when($filters['date'] ?? false, function ($query, $date) {
            if ($date === 'soon') {
                $query
                    ->where('dateOfStarting', '>', Carbon::today()->toDateString());
            }

            if ($date === 'now') {
                $query->where(function ($query) {
                    $query->where(function ($query) {
                        $query->where('dateOfStarting', '=', Carbon::today()->toDateString())
                            ->where('dateOfEnding', '!=', Carbon::today()->toDateString());
                    })
                        ->orWhere(function ($query) {
                            $query->where('dateOfStarting', '<=', Carbon::today()->toDateString())
                                ->where('dateOfEnding', '>', Carbon::today()->toDateString());
                        });
                });

            }

            if ($date == 'done') {
                $query
                    ->where('dateOfEnding', '<=', Carbon::today()->toDateString());
            }
        });


    }
}
