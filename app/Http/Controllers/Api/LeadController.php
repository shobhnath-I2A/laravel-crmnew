<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadAssignment;
use App\Models\User;
use App\Services\LeadAssignmentService;
use App\Services\LeadNotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(
        Request $request,
        LeadAssignmentService $assignmentService,
        LeadNotificationService $notificationService
    ) {
        try {
            $validator = Validator::make($request->all(), [
                'full_name'      => 'required|string|max:255',
                'portal_id'      => 'nullable|string|max:50',
                'email'          => 'nullable|email|max:255',
                'phone'          => 'required|string|max:20',
                'phone_code'     => 'nullable|string|max:10',
                'from_city'      => 'nullable|string|max:255',
                'to_city'        => 'nullable|string|max:255',
                'travel_date'    => 'nullable|date',
                'travel_month'   => 'nullable|string|max:50',
                'total_pax'      => 'nullable|integer|min:1',
                'days'           => 'nullable|integer|min:1',
                'budget'         => 'nullable|integer|min:0',
                'description'    => 'nullable|string',
                'source'         => 'nullable|string|max:255',
                'campaign'       => 'nullable|string|max:255',
                'utm_source'     => 'nullable|string|max:255',
                'utm_medium'     => 'nullable|string|max:255',
                'utm_campaign'   => 'nullable|string|max:255',
                'reference_url'  => 'nullable|string|max:500',
                'assigned_to'    => 'nullable|integer|exists:users,id',
                'created_by'     => 'nullable|integer',
                'status'         => 'nullable|in:new,contacted,qualified,proposal_sent,converted,lost',
                'priority'       => 'nullable|in:low,medium,high',
                'company_name'   => 'nullable|string|max:255',
                'is_authorized'  => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = $validator->validated();

            $data['client_ip'] = $request->ip();
            $data['reference_url'] = $request->reference_url ?? $request->headers->get('referer');
            $data['status'] = $data['status'] ?? 'new';
            $data['priority'] = $data['priority'] ?? 'medium';
            $data['total_pax'] = $data['total_pax'] ?? 1;

            $lead = Lead::create($data);

            $admins = User::whereIn('role', ['admin', 'manager'])->get();

            foreach ($admins as $admin) {
                $notificationService->send(
                    $admin->id,
                    $lead->id,
                    'new_lead',
                    'New Lead',
                    $lead->full_name . ' (' . $lead->phone . ')',
                    [
                        'lead_name' => $lead->full_name,
                        'phone' => $lead->phone,
                        'from_city' => $lead->from_city,
                        'to_city' => $lead->to_city,
                    ]
                );
            }

            return response()->json([
                'status' => true,
                'message' => 'Lead created successfully',
                'data' => $lead->fresh(),
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create lead',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function assignLead(
        Request $request,
        Lead $lead,
        LeadNotificationService $notificationService
    ) {
        $validator = Validator::make($request->all(), [
            'assigned_to' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $lead->assigned_to = $request->assigned_to;
        $lead->save();

        LeadAssignment::create([
            'lead_id' => $lead->id,
            'user_id' => $request->assigned_to,
            'priority_used' => null,
            'assignment_type' => 'manual',
            'assigned_at' => now(),
        ]);

        $notificationService->send(
            $request->assigned_to,
            $lead->id,
            'lead_assigned',
            'Lead Assigned',
            $lead->full_name . ' assigned to you',
            [
                'lead_name' => $lead->full_name,
                'phone' => $lead->phone,
            ]
        );

        return response()->json([
            'status' => true,
            'message' => 'Lead assigned successfully',
        ]);
    }
}
