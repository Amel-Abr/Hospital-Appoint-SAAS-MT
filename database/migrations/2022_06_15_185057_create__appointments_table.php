<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Appointments', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('Tenant_ID')
            ->constrained('hospitals')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('patientName');
            $table->integer('patientphone');
            $table->string('patientAddress');
            $table->string('patientEmail');
            $table->string('doctornName');
            $table->date('date');
            $table->time('time');
            $table->foreignId('patientID')
            ->constrained('Patients')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('doctorID')
            ->constrained('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('Appointments');
    }
}
