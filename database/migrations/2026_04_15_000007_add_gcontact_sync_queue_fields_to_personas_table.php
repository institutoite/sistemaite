<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGcontactSyncQueueFieldsToPersonasTable extends Migration
{
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->boolean('gcontact_sync_pending')->default(0)->after('etag');
            $table->text('gcontact_sync_error')->nullable()->after('gcontact_sync_pending');
            $table->unsignedInteger('gcontact_sync_attempts')->default(0)->after('gcontact_sync_error');
            $table->timestamp('gcontact_sync_last_attempt_at')->nullable()->after('gcontact_sync_attempts');
        });
    }

    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->dropColumn([
                'gcontact_sync_pending',
                'gcontact_sync_error',
                'gcontact_sync_attempts',
                'gcontact_sync_last_attempt_at',
            ]);
        });
    }
}

