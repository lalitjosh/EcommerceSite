<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('userName');
            
            $table->string('phoneNumber');

            $table->string('itemName');

            $table->string('image');

            $table->string('quantity');
            
            $table->integer('amount');
            
            $table->string('decreasedAmount');
            
            $table->string('discountPercent');

            $table->string('deliveryAddress');

            


           

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
        Schema::dropIfExists('carts');
    }
}
