<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('content');
            $table->timestamps();
            //$table->addColumn('timestamp', 'created_at', ['default' => 'CURRENT_TIMESTAMP']);
            //$table->addColumn('timestamp', 'updated_at', ['default' => 'CURRENT_TIMESTAMP']);
            $table->foreign('product_id')->references('id')->on('products');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
