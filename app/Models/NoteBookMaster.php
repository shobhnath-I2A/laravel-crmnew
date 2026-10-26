<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class NoteBookMaster extends Model
{
   use HasFactory;

    // Explicitly define the custom table name
    protected $table = 'note_book_master';

    // Mass-assignable attributes
    protected $fillable = [
        'details',
        'added_by',
    ];

    /*** Get the user who added this notebook entry. */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
