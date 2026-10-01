<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class QueryLogController extends Controller
{
    // Existing form used this missing endpoint for notes. Audit events remain server-generated.
    public function store(Request $request)
    {
        $request->merge(['queryid' => $request->input('query_id')]);
        return app(QueryController::class)->addNote($request);
    }
}
