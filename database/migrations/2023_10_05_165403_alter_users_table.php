<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('ts_user_id', false, true)->unique()->nullable()->after('password');

            $table->foreign('ts_user_id')->references('id')->on('ts_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_ts_user_id_foreign');
            $table->dropUnique(['ts_user_id']);
            $table->dropColumn('ts_user_id');
        });
    }
};
