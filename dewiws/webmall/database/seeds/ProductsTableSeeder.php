<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dolorem ut voluptatem.',
                'description' => 'Corrupti explicabo veritatis cumque est qui accusamus iste ab voluptate neque quia accusantium harum sint sint provident assumenda dolor.',
                'stock' => 19,
                'price' => 4403.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Rem illo doloremque.',
                'description' => 'Occaecati possimus eum praesentium repellendus sit non nam aliquam magni voluptatibus cupiditate dolor architecto repellendus soluta et amet.',
                'stock' => 56,
                'price' => 4552.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Blanditiis accusantium nihil.',
                'description' => 'Ipsum et fugiat neque adipisci cumque quae voluptas et amet dicta soluta assumenda qui voluptas nesciunt doloribus sunt nisi fugit incidunt ut et eaque non voluptatem.',
                'stock' => 19,
                'price' => 2891.0,
                'cover_img' => 'storage/products/faker/product-1.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dolore corrupti magni.',
                'description' => 'Quia cum nulla ullam facere sint voluptates sequi iure voluptatum quia odio quia qui mollitia tempore aspernatur quo doloremque alias dolores et harum consequatur fugit.',
                'stock' => 98,
                'price' => 2901.0,
                'cover_img' => 'storage/products/faker/product-1.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Quo est commodi.',
                'description' => 'Aut in dolorem dicta quia non qui deserunt quod quasi ducimus labore consequuntur aut vero earum sit et repellendus molestiae voluptatem saepe quibusdam.',
                'stock' => 64,
                'price' => 3438.0,
                'cover_img' => 'storage/products/faker/product-1.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Aperiam quas et.',
                'description' => 'Animi odio commodi quaerat possimus dolorum vitae aut veniam provident nemo autem voluptatibus hic voluptas sed sunt minima ab nesciunt velit illum doloremque reiciendis corrupti et voluptas.',
                'stock' => 14,
                'price' => 3397.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sunt ducimus hic.',
                'description' => 'Rerum sed accusantium ea dolores ut voluptatum praesentium voluptatem sed ipsam quisquam aut expedita perferendis non voluptatem cupiditate necessitatibus hic vitae animi voluptatum distinctio maiores ut.',
                'stock' => 49,
                'price' => 796.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Nostrum a ut.',
                'description' => 'Corporis repellat eum vel molestiae repudiandae nihil deleniti sint accusamus deserunt quis officiis fugit minus qui architecto.',
                'stock' => 23,
                'price' => 4586.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Quo qui.',
                'description' => 'Aliquam velit soluta ut eligendi possimus blanditiis laborum repudiandae enim dolor delectus voluptatem consequatur eum quae voluptates illum eveniet quaerat consequatur est incidunt et fugit.',
                'stock' => 92,
                'price' => 994.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Dolor quae illum.',
                'description' => 'Velit inventore corporis odit iste voluptates deleniti doloribus voluptatem qui libero totam exercitationem nesciunt quisquam vel enim veniam.',
                'stock' => 79,
                'price' => 3940.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Vitae velit.',
                'description' => 'Voluptas quia iusto doloribus provident tempore voluptate doloribus ut voluptates et quae nobis ea atque.',
                'stock' => 82,
                'price' => 4657.0,
                'cover_img' => 'storage/products/faker/product-1.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Iure et.',
                'description' => 'Provident dicta deserunt earum rerum voluptates eligendi autem architecto quo ex libero a quis aut dolor fuga eius maiores vitae.',
                'stock' => 37,
                'price' => 1004.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Voluptas rerum ut.',
                'description' => 'Perferendis et quibusdam labore velit perferendis optio et delectus numquam debitis qui sint accusamus et nam sed aut est atque.',
                'stock' => 35,
                'price' => 992.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Debitis dolores nesciunt.',
                'description' => 'Quae rerum dolor veniam provident animi laborum totam sed inventore maiores aperiam iusto occaecati nihil neque.',
                'stock' => 2,
                'price' => 3010.0,
                'cover_img' => 'storage/products/faker/product-1.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Dicta porro voluptatem.',
                'description' => 'Rem quia sed veniam dolorum a eaque qui id et accusamus natus in dolor enim in eveniet vero.',
                'stock' => 4,
                'price' => 3981.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Laboriosam et.',
                'description' => 'Tempora et omnis asperiores ut repellat aut culpa labore aut saepe veniam optio in pariatur consectetur animi dolorem doloribus aliquam.',
                'stock' => 79,
                'price' => 2261.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Earum vero.',
                'description' => 'Quasi sit necessitatibus est quaerat unde omnis itaque fugit amet quibusdam et rerum maxime molestias qui reprehenderit vel eveniet dolorem similique labore vel praesentium molestiae magnam qui recusandae.',
                'stock' => 5,
                'price' => 2076.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Blanditiis facere.',
                'description' => 'Repellendus fugit totam soluta est alias beatae quidem sint recusandae et nostrum explicabo unde non eum quia ipsam non qui in dolor.',
                'stock' => 55,
                'price' => 4672.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Et id.',
                'description' => 'Quae facere et quasi est suscipit odio minus impedit placeat facere illum rem.',
                'stock' => 53,
                'price' => 1680.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Neque qui.',
                'description' => 'Eius qui et nihil omnis earum voluptatem qui alias ex repudiandae est dolorem pariatur qui et itaque ut quae omnis aut rerum.',
                'stock' => 29,
                'price' => 1980.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Totam nam non.',
                'description' => 'Aut tempora quis consequuntur officiis ad et sit ipsam accusantium consequatur autem perferendis veritatis sequi iusto.',
                'stock' => 20,
                'price' => 2712.0,
                'cover_img' => 'storage/products/faker/product-1.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Quaerat commodi.',
                'description' => 'Placeat id molestiae veritatis impedit inventore voluptatem dolores quia quisquam et ullam minus dolor quis ab qui vitae dolor aliquam.',
                'stock' => 4,
                'price' => 3328.0,
                'cover_img' => 'storage/products/faker/product-1.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Voluptates nostrum quas.',
                'description' => 'Enim vel sit esse nobis et explicabo magni animi et non nesciunt id numquam laborum.',
                'stock' => 56,
                'price' => 727.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Sit magnam corrupti.',
                'description' => 'Sit cupiditate accusamus sunt fugit expedita distinctio ipsum et et consectetur et est qui.',
                'stock' => 46,
                'price' => 2362.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Debitis voluptas sed.',
                'description' => 'Id cumque consequatur et magni eveniet voluptas cumque deleniti a cumque quia debitis nobis neque reiciendis alias reiciendis maxime occaecati qui odio nemo temporibus.',
                'stock' => 11,
                'price' => 435.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Qui et earum.',
                'description' => 'Doloremque voluptatibus non est architecto sapiente qui voluptatem deserunt nam placeat nihil reprehenderit voluptatum sint voluptas voluptatem ratione impedit reiciendis ut a voluptas dolorem.',
                'stock' => 21,
                'price' => 1584.0,
                'cover_img' => 'storage/products/faker/product-1.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Ex cumque.',
                'description' => 'Est eos voluptas ipsam excepturi ad ducimus velit eos doloremque blanditiis enim eos et reiciendis et asperiores qui.',
                'stock' => 52,
                'price' => 4106.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Voluptatem aut totam.',
                'description' => 'Voluptatem consequatur magnam hic deserunt facilis eligendi non aut quaerat veritatis ipsum quas nemo aut voluptate eligendi quasi vel quo nihil modi vitae sit veritatis amet.',
                'stock' => 27,
                'price' => 2073.0,
                'cover_img' => 'storage/products/faker/product-1.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Expedita et quod.',
                'description' => 'Ipsum nam unde eligendi fugit vero iure perferendis ratione quia quas alias nostrum.',
                'stock' => 79,
                'price' => 2995.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Quae deserunt est.',
                'description' => 'Dolor aliquid vitae molestiae rerum quia nesciunt quis nostrum repudiandae cupiditate qui exercitationem ipsum ipsam voluptates molestias.',
                'stock' => 61,
                'price' => 3404.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Fugiat nihil in.',
                'description' => 'Sed est quia voluptatum doloremque ut eaque consectetur et ut qui ea molestiae aliquam rerum.',
                'stock' => 44,
                'price' => 1978.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Dignissimos debitis dolor.',
                'description' => 'In nihil quod et possimus voluptatem eum eos ex et exercitationem illum quam similique eligendi eos molestiae aspernatur ut est distinctio et aut qui enim accusantium quae eos.',
                'stock' => 63,
                'price' => 2617.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Est quisquam dolores.',
                'description' => 'Ut nisi officiis maiores modi blanditiis blanditiis commodi maxime sed aut fugit aspernatur et molestiae odio.',
                'stock' => 10,
                'price' => 2216.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Eos voluptate dolore.',
                'description' => 'Sequi exercitationem aliquid tenetur doloremque quo iusto nulla aut nisi in est eaque officia nihil rerum porro quam fugit.',
                'stock' => 88,
                'price' => 4488.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Porro occaecati.',
                'description' => 'Quasi cum quibusdam quis voluptatem ut natus enim mollitia error sit nihil accusamus.',
                'stock' => 67,
                'price' => 3543.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Corporis pariatur aliquam.',
                'description' => 'Odit fugiat temporibus dolor dolor unde id praesentium eos tenetur nostrum eveniet cumque nesciunt corrupti iure qui accusamus voluptatem ut illum.',
                'stock' => 9,
                'price' => 1523.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Id et.',
                'description' => 'Molestiae non modi et omnis soluta eligendi et qui illum occaecati sint quis autem dolores omnis blanditiis nihil numquam nam amet.',
                'stock' => 64,
                'price' => 2229.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Eaque dolorum.',
                'description' => 'Pariatur aliquid nesciunt eaque est molestias asperiores vel non iusto itaque quia et nemo aliquid eligendi rem aliquam neque.',
                'stock' => 2,
                'price' => 2815.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Eius sequi.',
                'description' => 'Debitis est aut vel harum quidem deserunt maxime laudantium ut illum asperiores rerum enim excepturi deserunt.',
                'stock' => 3,
                'price' => 2388.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Id voluptatem sunt.',
                'description' => 'Repellendus minima vel omnis quod dolore magni repudiandae eum quas est magni praesentium et tenetur laboriosam hic dicta sapiente possimus omnis deleniti.',
                'stock' => 96,
                'price' => 3312.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Quia nobis alias.',
                'description' => 'Et veniam qui excepturi accusamus porro libero perspiciatis et ab sint perspiciatis ipsum et qui asperiores sit est beatae repellendus doloribus nisi eaque dolores quia quia dignissimos.',
                'stock' => 54,
                'price' => 3518.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Qui accusamus distinctio.',
                'description' => 'Voluptatem eum qui nihil repellendus laboriosam dolor architecto saepe at omnis esse ut molestiae consequatur optio sed quibusdam veritatis animi ut voluptatem officia sint et.',
                'stock' => 23,
                'price' => 3923.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Et ut in.',
                'description' => 'Est aliquid aspernatur omnis rerum eveniet et possimus error quaerat aperiam modi optio fugiat illo repellat in nobis veniam ad cum harum nobis reprehenderit esse tenetur sed.',
                'stock' => 27,
                'price' => 1346.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Quis cum.',
                'description' => 'Sunt labore ut odit sequi officiis facere tempore error natus provident qui rerum delectus excepturi non repellat error tenetur velit quisquam at rerum.',
                'stock' => 95,
                'price' => 1973.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Occaecati ut quia.',
                'description' => 'Excepturi voluptatem vitae porro non tenetur ipsum rerum earum at minima et praesentium odio voluptate voluptas beatae quis explicabo error voluptatibus accusamus ipsa in animi et consectetur dolore et.',
                'stock' => 3,
                'price' => 4922.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Autem ut.',
                'description' => 'Reiciendis eaque quia sit ullam molestiae qui assumenda sint est ipsam debitis quod nihil fuga.',
                'stock' => 40,
                'price' => 358.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Reiciendis asperiores.',
                'description' => 'Et dolores magni deserunt ea provident ipsam sunt maxime occaecati et ut sed sunt.',
                'stock' => 63,
                'price' => 3799.0,
                'cover_img' => 'storage/products/faker/product-2.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Neque excepturi.',
                'description' => 'Accusantium quasi deleniti et quia et doloribus sint maiores tempora delectus tenetur quia ut modi sed magnam id fugit illum itaque.',
                'stock' => 76,
                'price' => 2417.0,
                'cover_img' => 'storage/products/faker/product-3.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Enim et suscipit.',
                'description' => 'Suscipit voluptas a maiores cum ut aut est consequatur porro velit aliquid consequatur similique reiciendis excepturi facilis placeat dolorum dolorem sed natus reiciendis ipsa voluptatem aut.',
                'stock' => 60,
                'price' => 4746.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Laborum quam.',
                'description' => 'Ducimus iure non in repellendus laboriosam id illo modi incidunt voluptatem voluptatibus neque aut rerum at natus doloribus sed illum.',
                'stock' => 91,
                'price' => 1035.0,
                'cover_img' => 'storage/products/faker/product-4.jpg',
                'shop_id' => NULL,
                'created_at' => '2020-06-07 10:31:33',
                'updated_at' => '2020-06-07 10:31:33',
            ),
        ));
        
        
    }
}