<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('2022_07_15_120035_create_artikels_table.php');
        Schema::dropIfExists('2022_07_02_094840_create_beritas_table.php');
        Schema::dropIfExists('2022_07_02_094805_create_kategoris_table.php');
    }
};
