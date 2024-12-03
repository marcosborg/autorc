<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVehiclesTable extends Migration
{
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_10301148')->references('id')->on('brands');
            $table->unsignedBigInteger('seller_client_id')->nullable();
            $table->foreign('seller_client_id', 'seller_client_fk_10301156')->references('id')->on('clients');
            $table->unsignedBigInteger('seller_company_id')->nullable();
            $table->foreign('seller_company_id', 'seller_company_fk_10301157')->references('id')->on('companies');
            $table->unsignedBigInteger('buyer_client_id')->nullable();
            $table->foreign('buyer_client_id', 'buyer_client_fk_10301158')->references('id')->on('clients');
            $table->unsignedBigInteger('buyer_company_id')->nullable();
            $table->foreign('buyer_company_id', 'buyer_company_fk_10301159')->references('id')->on('companies');
        });
    }
}
