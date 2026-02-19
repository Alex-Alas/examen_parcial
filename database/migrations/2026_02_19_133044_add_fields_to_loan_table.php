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
        Schema::table('loans', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->dateTime('loan_date')->after('name');
            $table->dateTime('return_date')->after('loan_date');
            $table->foreignId('books_id')->constrained('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('loan_date');
            $table->dropColumn('books_id');
        });
    }
};
