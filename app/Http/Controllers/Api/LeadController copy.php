<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {
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
                'assigned_to'    => 'nullable|integer',
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
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $validator->validated();

            $data['client_ip'] = $request->ip();
            $data['reference_url'] = $request->reference_url ?? $request->headers->get('referer');
            $data['status'] = $data['status'] ?? 'new';
            $data['priority'] = $data['priority'] ?? 'medium';
            $data['total_pax'] = $data['total_pax'] ?? 1;

            $lead = Lead::create($data);

            return response()->json([
                'status' => true,
                'message' => 'Lead created successfully',
                'data' => $lead
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create lead',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
