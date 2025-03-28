<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table("priorities")->insert([
            ["name" => "HIGH"], ["name" => "MEDIUM"], ["name" => "LOW"]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table("tasks")->where("name","HIGH")->delete();
        DB::table("tasks")->where("name","MEDIUM")->delete();
        DB::table("tasks")->where("name","LOW")->delete();
    }
};
