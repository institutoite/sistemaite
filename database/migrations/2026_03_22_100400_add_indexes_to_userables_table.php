<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToUserablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userables', function (Blueprint $table) {
            $table->index(['userable_type', 'userable_id'], 'userables_userable_type_userable_id_index');
            $table->index('user_id', 'userables_user_id_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userables', function (Blueprint $table) {
            $table->dropIndex('userables_userable_type_userable_id_index');
            $table->dropIndex('userables_user_id_index');
        });
    }
}

