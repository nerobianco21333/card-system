<?php
use Illuminate\Support\Facades\Schema; use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateCategoriesTable extends Migration { public function up() { Schema::create('categories', function (Blueprint $spd19505) { $spd19505->increments('id'); $spd19505->integer('user_id'); $spd19505->text('name'); $spd19505->integer('sort')->default(1000); $spd19505->string('password')->nullable(); $spd19505->boolean('password_open')->default(false); $spd19505->boolean('enabled'); $spd19505->timestamps(); $spd19505->index('user_id'); }); } public function down() { Schema::dropIfExists('groups'); } }