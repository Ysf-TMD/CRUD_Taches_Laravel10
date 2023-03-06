<?php

use App\Commentaire;
use Faker\Generator as Faker ;
$factory->define(
    Commentaire::class , function (Faker $faker)
{
    return [
        "titre"=>$faker->words(3,true),
        "commentaire"=>$faker->paragraph(2,true),
        'add_at'=>$faker->dateTimeInInterval(
            $startDate="-6 months",
            $interval="+180 days",
            $timezone=date_default_timezone_get(),
        )
    ];
}
)
;
