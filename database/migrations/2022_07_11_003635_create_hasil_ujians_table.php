<?php

use App\Models\Ujian;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_ujians', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Ujian::class)            
            // ->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreignIdFor(User::class)
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->decimal('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_ujians');
    }
};
