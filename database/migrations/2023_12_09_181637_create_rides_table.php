<?php

use App\Models\Driver;
use App\Models\User;
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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Done','Canceled','Underway']);
            $table->date('Date');
            $table->time('StartTime');
            $table->time('EndTime');
            // $table->string('StartLocation');
            // $table->string('EndLocation');
            $table->tinyInteger('Rate')->nullable();
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('driver_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
    
};
