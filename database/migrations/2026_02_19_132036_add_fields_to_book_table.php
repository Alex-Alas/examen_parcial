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
        Schema::table('books', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('description')->after('title');
            $table->string('isbn')->unique()->after('description');
            $table->integer('total', false)->after('isbn');
            $table->integer('available',false)->after('total');
            $table->string('status')->after('available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('isbn');
            $table->dropColumn('total');
            $table->dropColumn('available');
            $table->dropColumn('status');
        });
    }
};
