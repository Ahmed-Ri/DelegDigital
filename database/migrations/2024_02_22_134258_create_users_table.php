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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telephone')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephoneE')->nullable();
            $table->string('UrlFacebook')->nullable();
            $table->string('UrlInstagram')->nullable();
            $table->string('UrlGoogle')->nullable();
            $table->string('UrlSite')->nullable();
            $table->string('abonnement')->nullable();
            $table->string('imageFacebook')->nullable();
            $table->string('imageInstagram')->nullable();
            $table->string('imageGoogle')->nullable();
            $table->string('imageSite')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('status')->default('pending');
            $table->rememberToken()->nullable();
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
