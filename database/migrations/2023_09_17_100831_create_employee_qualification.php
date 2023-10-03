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
        Schema::create('employee_qualification', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id');
            $table->unSignedBigInteger('qualification_id');
            $table->timestamps();

            $table->foreign('employee_id')
            ->references('id')
            ->on('employees')
            ->onDelete('cascade');
            
            $table->foreign('qualification_id')
            ->references('id')
            ->on('qualifications')
            ->onDelete('cascade');
            
            $table->primary(['employee_id','qualification_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_qualification');
    }
};
