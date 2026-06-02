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
       Schema::table('users', function (Blueprint $table) {
           // Menambahkan kolom profile_photo setelah kolom name (boleh kosong)
           $table->string('profile_photo')->nullable()->after('name');
       });
   }

   public function down(): void
   {
       Schema::table('users', function (Blueprint $table) {
           $table->dropColumn('profile_photo');
       });
   }
};
