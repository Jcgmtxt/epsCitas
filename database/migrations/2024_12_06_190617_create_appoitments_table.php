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
        Schema::create('appoitments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users'); // Patient id
            $table->foreignId('doctor_id')->constrained('users'); // Doctor id
            $table->string('reason');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status',['CONFIRMADO', 'CANCELADO', 'PENDIENTE'])->default('PENDIENTE');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoitments');
    }
};
