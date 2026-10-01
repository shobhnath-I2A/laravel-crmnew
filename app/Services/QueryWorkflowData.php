<?php
namespace App\Services;
use App\Models\Query;

class QueryWorkflowData
{
    public static function load(Query $query, string $tab): void
    {
        if ($tab === 'history') {
            $query->setRelation('history', $query->history()->with('author')->paginate(50, ['*'], 'history_page')->withQueryString());
            return;
        }
        $relations = match ($tab) {
            'details' => ['notes.author'],
            'history' => ['history.author'],
            'guest-documents' => ['guests.documents'],
            'followups' => ['tasks'],
            'mails' => ['emailLogs'],
            'billing' => ['invoice.payments'],
            'post-sales-supplier', 'voucher' => ['supplierBookings.supplier', 'supplierBookings.item', 'vouchers'],
            default => [],
        };
        if ($relations) { $query->load($relations); }
    }
}
