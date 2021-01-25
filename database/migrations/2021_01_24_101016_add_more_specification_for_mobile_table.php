<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreSpecificationForMobileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobiles', function (Blueprint $table) {            
            $table->string('screen_resolution')->after('screen_size');
            $table->string('screen_type')->after('screen_resolution');            
            $table->integer('main_camera')->after('screen_type');
            $table->integer('selfie_camera')->after('main_camera');
            $table->string('OS')->after('selfie_camera');
            $table->integer('memory')->after('OS');
            $table->string('gpu')->after('memory');
            $table->string('cpu')->after('gpu');
            $table->integer('battery')->after('cpu');
            $table->integer('price')->after('battery');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobiles', function (Blueprint $table) {
            $table->dropColumn('screen_resolution');
            $table->dropColumn('screen_type');            
            $table->dropColumn('main_camera');
            $table->dropColumn('selfie_camera');
            $table->dropColumn('OS');
            $table->dropColumn('memory');
            $table->dropColumn('gpu');
            $table->dropColumn('cpu');
            $table->dropColumn('battery');
            $table->dropColumn('price');
        });
    }
}
