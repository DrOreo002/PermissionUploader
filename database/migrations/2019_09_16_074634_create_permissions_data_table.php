<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('permissions_data')) {
            Schema::create('permissions_data', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('file_name');
                $table->string('submitted_by');
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });   
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_data');
    }
}
