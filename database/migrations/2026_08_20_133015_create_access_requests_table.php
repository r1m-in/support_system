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
        Schema::create('access_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->text('owner_uid');
            $table->text('owner_name');
            $table->text('owner_phone');
            $table->text('owner_email')->nullable();
            $table->mediumText('note');
            $table->mediumText('admin_note')->nullable();
            $table->text('access_key')->nullable();
            $table->date('expiry')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_requests');
    }
};
