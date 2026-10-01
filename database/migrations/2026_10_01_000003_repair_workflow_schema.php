<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('itineraries', function (Blueprint $t) {
            // Widen the legacy boolean queryId without discarding existing IDs or the 0 template sentinel.
            $t->unsignedBigInteger('queryId')->default(0)->change();
        });
        if (Schema::hasColumn('itineraries', 'destinations')) {
            Schema::table('itineraries', fn (Blueprint $t) => $t->text('destinations')->nullable()->change());
        }
        if (!Schema::hasColumn('package_day_item_hotels', 'source_type')) {
            Schema::table('package_day_item_hotels', fn (Blueprint $t) => $t->unsignedTinyInteger('source_type')->default(0));
        }
    }
    public function down(): void
    {
        // Intentionally retained: narrowing query IDs to boolean would destroy data, and the
        // source_type column may have predated this repair on an existing installation.
    }
};
