<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            $table->string('action')->default('general');
            $table->longText('message');
            $table->string('level')->index();
            $table->string('level_name');
            $table->string('channel')->index();
            $table->string('record_datetime');

            $table->string('remote_addr')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('request_method')->nullable();

            $table->longText('extra');
            $table->longText('formatted');
            $table->longText('context');
            $table->dateTime('created_at')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
