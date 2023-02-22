<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->string('phone')->nullable()->unique()->index();
            $table->string('avatar')->nullable();
            $table->integer('password_failed')->default(0);
            $table->dateTime('logout_at')->nullable();
            $table->dateTime('login_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('phone');
            $table->dropColumn('avatar');
            $table->dropColumn('password_failed');
            $table->dropColumn('logout_at');
            $table->dropColumn('login_at');
        });
    }
};