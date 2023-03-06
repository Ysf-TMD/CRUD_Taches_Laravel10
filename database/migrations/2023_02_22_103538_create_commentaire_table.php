<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create(
            "commentaire",
            function(Blueprint $tab)
            {
                $tab->bigIncrements("id");
                $tab->bigInteger("user_id")->unsigned();
                $tab->bigInteger("biere_id");
                $tab->datetime("add_at");
                $tab->string("titre");
                $tab->longText("commentaire");
                $tab->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaire');
    }
};
