<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('entrada_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('phone')->nullable();
            $table->string('applicant')->nullable();

            $table->foreignId('province_id')->nullable()->constrained('provinces');
            $table->foreignId('municipality')->nullable()->constrained('municipalities');

            $table->date('start')->nullable();
            $table->date('finish')->nullable();
            $table->string('receiptNumber')->nullable();
            $table->decimal('amount', 9,2)->nullable();

            $table->string('status')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreignId('registerUser_id')->nullable()->constrained('users');
            $table->softDeletes();
            $table->foreignId('deletedUser_id')->nullable()->constrained('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('name_reservations');
    }
}
