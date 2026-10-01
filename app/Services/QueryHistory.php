<?php
namespace App\Services;
use App\Models\QueryLog;

class QueryHistory
{
    public static function record(int $queryId, string $type, string $details, ?string $comment = null): void
    {
        QueryLog::create(['query_id' => $queryId, 'added_by' => auth()->id(),
            'date_added' => now(), 'log_type' => $type, 'details' => $details, 'status_comment' => $comment]);
    }
}
