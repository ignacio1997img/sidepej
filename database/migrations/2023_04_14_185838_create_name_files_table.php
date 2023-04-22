<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nameReservation_id')->nullable()->constrained('name_reservations');
            $table->text('solicitud')->nullable();
            $table->text('carnet')->nullable();
            $table->text('deposito')->nullable();
            $table->text('poder')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('name_files');
    }
}
