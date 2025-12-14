<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('finance_calenders', function (Blueprint $table) {
            $table->id();
            $table->integer('FINANCE_YR');
            $table->integer('com_code');
            $table->integer('added_by');
            $table->integer('updated_by');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('FINANCE_YR_DESC',225);
            $table->tinyInteger('is_open')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_calenders');
    }
};
