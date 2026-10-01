<?php
namespace App\Services;

use App\Models\Query;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class QueryAccess
{
    public static function scope(Builder $builder, User $user): Builder
    {
        if ($user->isAdmin() || (string) $user->show_query_status === '2') {
            return $builder;
        }
        if ((string) $user->show_query_status === '1') {
            return $builder->where('statusId', 5);
        }
        return $builder->where('assignTo', $user->id);
    }

    public static function find($id): Query
    {
        abort_unless(auth()->check() && auth()->user()->canView('Query'), 403);
        return self::scope(Query::query(), auth()->user())->findOrFail($id);
    }
}
