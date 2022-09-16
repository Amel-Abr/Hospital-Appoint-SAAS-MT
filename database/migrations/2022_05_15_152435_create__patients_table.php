<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Tenant_ID')
            ->constrained('hospitals')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('fullname');   
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->boolean('isPatient')->default(true);
            $table->string('email');
     
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
        Schema::dropIfExists('Patients');
    }
}
