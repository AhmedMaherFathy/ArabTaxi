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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Photo');
            $table->integer('phoneNumber');
            $table->string('idPicture');
            $table->string('address');
            $table->tinyInteger('idNumber');
            $table->enum('gender',['male','female']);
            $table->tinyInteger('Rating')->nullable();
            $table->string('carPicture');
            $table->string('model');
            $table->string('drivingLicense');
            $table->string('criminalRecord');
            $table->timestamps();
            // $table->unsignedBigInteger('user_id');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
