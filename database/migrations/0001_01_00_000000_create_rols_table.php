<?php

use App\Models\rols;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->id();
            $table->string('rol');
            $table->timestamps();
        });

     DB::table('rols')->insert([
        ['rol' => 'Pastor', 'created_at' => now(), 'updated_at' => now()],
        ['rol' => 'Lider', 'created_at' => now(), 'updated_at' => now()],
        ['rol' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rols');
    }
};
