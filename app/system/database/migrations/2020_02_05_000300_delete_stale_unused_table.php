<?php

namespace System\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class DeleteStaleUnusedTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('layout_modules');
        Schema::dropIfExists('layout_routes');
        Schema::dropIfExists('layouts');
        Schema::dropIfExists('permalinks');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('pp_payments');
        Schema::dropIfExists('security_questions');
        Schema::dropIfExists('uri_routes');
    }
}
