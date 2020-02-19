<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('set null');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->decimal('balance', 10, 2)->default(0.00);
            $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id')->references('id')->on('plans')
                    ->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('wallets');
    }
}
