<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('license')->nullable();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->string('motor_nr')->nullable();
            $table->string('vehicle_identification_number_vin')->nullable();
            $table->date('license_date')->nullable();
            $table->string('color')->nullable();
            $table->integer('kilometers')->nullable();
            $table->boolean('purchase_and_sale_agreement')->default(0)->nullable();
            $table->boolean('copy_of_the_citizen_card')->default(0)->nullable();
            $table->boolean('tax_identification_card')->default(0)->nullable();
            $table->boolean('copy_of_the_stamp_duty_receipt')->default(0)->nullable();
            $table->boolean('vehicle_registration_document')->default(0)->nullable();
            $table->boolean('vehicle_ownership_title')->default(0)->nullable();
            $table->boolean('vehicle_keys')->default(0)->nullable();
            $table->boolean('vehicle_manuals')->default(0)->nullable();
            $table->boolean('release_of_reservation_or_mortgage')->default(0)->nullable();
            $table->boolean('leasing_agreement')->default(0)->nullable();
            $table->date('date')->nullable();
            $table->longText('pending')->nullable();
            $table->longText('additional_items')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
