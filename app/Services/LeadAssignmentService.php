<?php

namespace App\Services;

use App\Models\AgentRoster;
use App\Models\AssignmentSetting;
use App\Models\Lead;
use App\Models\LeadAssignment;
use App\Models\User;
use Carbon\Carbon;

class LeadAssignmentService
{
    public function autoAssign(Lead $lead): ?User
    {
        $settings = AssignmentSetting::first();

        if (!$settings || !$settings->auto_assignment_enabled) {
            return null;
        }

        $destination = strtolower(trim((string)($lead->to_city ?: $lead->from_city ?: '')));
        if ($destination === '') {
            return null;
        }

        $now = Carbon::now();
        $today = $now->toDateString();

        for ($priority = 1; $priority <= 3; $priority++) {
            $rosters = AgentRoster::with('user')
                ->where('roster_date', $today)
                ->where('priority', $priority)
                ->where('is_available', true)
                ->get();

            $candidates = collect();

            foreach ($rosters as $roster) {
                if (!$roster->user) {
                    continue;
                }

                $user = $roster->user;

                if (!$this->inShift($roster, $now)) {
                    continue;
                }

                if (!$user->destinations()->whereRaw('LOWER(destination_name)=?', [$destination])->exists()) {
                    continue;
                }

                $todayCount = LeadAssignment::where('user_id', $user->id)
                    ->whereDate('assigned_at', $today)
                    ->count();

                $lastAssigned = LeadAssignment::where('user_id', $user->id)
                    ->latest('assigned_at')
                    ->first();

                $gapOk = true;
                if ($lastAssigned) {
                    $gapOk = Carbon::parse($lastAssigned->assigned_at)
                        ->addMinutes($settings->min_gap_minutes)
                        ->lte($now);
                }

                if (!$settings->override_daily_limit && $todayCount >= $roster->max_assigned_leads) {
                    continue;
                }

                $candidates->push([
                    'user' => $user,
                    'today_count' => $todayCount,
                    'gap_ok' => $gapOk,
                    'last_assigned_at' => $lastAssigned?->assigned_at,
                ]);
            }

            if ($candidates->isEmpty()) {
                continue;
            }

            $selected = $candidates
                ->sortBy([
                    ['gap_ok', 'desc'],
                    ['today_count', 'asc'],
                    ['last_assigned_at', 'asc'],
                ])
                ->first();

            if ($selected) {
                $this->saveAssignment($lead, $selected['user']->id, $priority, 'auto');
                return $selected['user'];
            }
        }

        return null;
    }

    protected function inShift($roster, Carbon $now): bool
    {
        $current = $now->format('H:i:s');
        return $current >= $roster->shift_start && $current <= $roster->shift_end;
    }

    protected function saveAssignment(Lead $lead, int $userId, int $priority, string $type): void
    {
        $lead->assigned_to = $userId;
        $lead->save();

        LeadAssignment::create([
            'lead_id' => $lead->id,
            'user_id' => $userId,
            'priority_used' => $priority,
            'assignment_type' => $type,
            'assigned_at' => now(),
        ]);
    }
}
