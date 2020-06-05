<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

//GENERATE FAKE DATAS IN THE PRODUCT TABLE
$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 5),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),
        'url_image' => $faker->randomElement($array = array (
            'https://www.promod.fr/chemisier-au-crochet-femme--pp402509-s4-produit-493x530.jpg',
            'https://image01.bonprix.fr/assets/460x644/2x/1573656607/19293752-IXwlxwb3.jpg',
            'https://www.lamodeuse.com/214832-large_default/robe-pull-blanche-a-manches-ballon.jpg',
            'https://imgs.veryvoga.com/o600/35/03/31433d2c90645200a704c2288adc3503.jpg',
            'https://www.burton.fr/phototheque/burton.fr/500/medium/01W000454A.jpg')
        ),
        'size' => $faker->randomElement(['46', '48', '50', '52']),
        'status' => $faker->randomElement(['published', 'unpublished']),
        'code' => $faker->randomElement(['solde', 'new']),
        'category_id' => $faker->randomElement(['1','2']),
        'reference' => $faker->md5()
    ];
});
