<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
use App\Models;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            'name' => 'Admin',
            'email'  => 'admin@mail.com',
            'username' => 'admin',
            'password' => bcrypt('rahasia123')
        ];
        $contentData = [
            [
                'title' => 'Perbukitan',
                'creator' => 'John G.',
                'photo' => Facades\Storage::disk('contents')->url('MC4xMDEwNTYwMCAxNTQxMDQ3N7Ry.jpg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod beatae maxime voluptates ipsum, sed fuga harum velit rerum perferendis repellat soluta impedit aspernatur vel dignissimos quae, culpa voluptate nesciunt at?',
                'date_created' => '2010-09-20'
            ],
            [
                'title' => 'Pegunungan',
                'creator' => 'Budi Harianto',
                'photo' => Facades\Storage::disk('contents')->url('MC4xMDEwNTYwMCAxNTQxMDQ3NzAz.jpeg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod beatae maxime voluptates ipsum, sed fuga harum velit rerum perferendis repellat soluta impedit aspernatur vel dignissimos quae, culpa voluptate nesciunt at?',
                'date_created' => '2010-09-20'
            ],
            [
                'title' => 'Kebun Teh',
                'creator' => 'Rosalina S.',
                'photo' => Facades\Storage::disk('contents')->url('MC4xMDEwNTYwMCAxNTQxMDQ3P9Kb.jpg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod beatae maxime voluptates ipsum, sed fuga harum velit rerum perferendis repellat soluta impedit aspernatur vel dignissimos quae, culpa voluptate nesciunt at?',
                'date_created' => '2010-09-20'
            ],
            [
                'title' => 'Sungai',
                'creator' => 'Ferguso G.',
                'photo' => Facades\Storage::disk('contents')->url('MC4xMDEwNTYwMCAxU7QxMDQ3NzAz.jpg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod beatae maxime voluptates ipsum, sed fuga harum velit rerum perferendis repellat soluta impedit aspernatur vel dignissimos quae, culpa voluptate nesciunt at?',
                'date_created' => '2010-09-20'
            ],
            [
                'title' => 'Musim Gugur',
                'creator' => 'Robert Y.',
                'photo' => Facades\Storage::disk('contents')->url('MC4yOTA4NTkwMCAxNTQxMDQyMDc2.jpeg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod beatae maxime voluptates ipsum, sed fuga harum velit rerum perferendis repellat soluta impedit aspernatur vel dignissimos quae, culpa voluptate nesciunt at?',
                'date_created' => '2010-09-20'
            ],
            [
                'title' => 'Sunset',
                'creator' => 'Yuri A.',
                'photo' => Facades\Storage::disk('contents')->url('MC4zMjA2OTUwMCAxNTQxMDQxOTQx.jpeg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod beatae maxime voluptates ipsum, sed fuga harum velit rerum perferendis repellat soluta impedit aspernatur vel dignissimos quae, culpa voluptate nesciunt at?',
                'date_created' => '2010-09-20'
            ],
            [
                'title' => 'Kebun Lavender',
                'creator' => 'Alenjandro R.',
                'photo' => Facades\Storage::disk('contents')->url('MC4zMjcxNjYwMCAxNTQxMDQyMDI4.jpeg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod beatae maxime voluptates ipsum, sed fuga harum velit rerum perferendis repellat soluta impedit aspernatur vel dignissimos quae, culpa voluptate nesciunt at?',
                'date_created' => '2010-09-20'
            ]
        ];
        $eventData = [
            [
                'title' => 'Pertunjukkan Biola Musik Klasik',
                'photo' => Facades\Storage::disk('events')->url('MC4wMTA2NTEwMCAxNTQwOTk3O8Hu.jpg'),
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo reprehenderit culpa iste nam libero deserunt quod temporibus commodi voluptatibus aut, laboriosam amet nulla sit sed nesciunt ex nihil ad. Quod.',
                'date' => '2018-11-20 16:00',
                'capacity' => 30,
            ],
            [
                'title' => 'Pertunjukkan di Hutan',
                'photo' => Facades\Storage::disk('events')->url('MC4wMTA2NTEwMCAxNTQwOTk3OTMx.jpg'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, eos! Sapiente reprehenderit, blanditiis magnam quibusdam perspiciatis totam eum laudantium dicta soluta maiores aperiam, ipsa harum minima delectus maxime unde nobis.',
                'date' => '2018-11-21 17:00',
                'capacity' => 100,
            ],
            [
                'title' => 'Pertunjukkan Makanan',
                'photo' => Facades\Storage::disk('events')->url('MC4wNTk4MzkwMCAxNTQwOTk4MDgx.jpg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum deserunt nam delectus enim pariatur atque molestiae perferendis modi vero quos, cumque eum mollitia dicta soluta. Pariatur, libero eaque! Rerum, ratione?',
                'date' => '2018-12-01 09:00',
                'capacity' => 40,
            ],
            [
                'title' => 'Pertunjukkan ES',
                'photo' => Facades\Storage::disk('events')->url('MC4xMzgwOTcwMCAxNTQxMDQ2NDEx.jpeg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias deserunt minus placeat ratione distinctio quis illo doloribus! Repudiandae tempore fugiat necessitatibus voluptatibus? Est aut mollitia corrupti ipsa vel cupiditate quis!',
                'date' => '2018-11-30 12:00',
                'capacity' => 25,
            ],
            [
                'title' => 'Pertunjukkan Kapal',
                'photo' => Facades\Storage::disk('events')->url('MC4yNjc3MzgwMCAxNTQwOTk3OTkx.jpg'),
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse cumque quos, illo odio, cupiditate commodi eveniet assumenda nesciunt ab maiores asperiores laboriosam exercitationem maxime provident impedit alias doloremque ad aut.',
                'date' => '2018-11-12 14:00',
                'capacity' => 75,
            ],
            [
                'title' => 'Pertunjukkan Piano Jazz',
                'photo' => Facades\Storage::disk('events')->url('MC4yNzMyNjIwMCAxNTQwOTk3OTYz.jpg'),
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur modi eos, doloremque adipisci autem, sapiente impedit culpa expedita debitis ut aliquid. Perspiciatis quidem debitis ullam ex possimus deserunt reiciendis exercitationem?',
                'date' => '2018-11-20 19:00',
                'capacity' => 50,
            ],
            [
                'title' => 'Pertunjukkan tebing',
                'photo' => Facades\Storage::disk('events')->url('MC4zMzg5MDQwMCAxNTQwOTk3ODcw.jpg'),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, sapiente ipsum. Nobis asperiores laudantium alias tenetur nostrum quasi nulla ipsa voluptatibus quisquam nam ab labore, dolorem, culpa eaque iste quo.',
                'date' => '2018-11-24 07:00',
                'capacity' => 10,
            ],
            [
                'title' => 'Pertunjukkan Manusia Es',
                'photo' => Facades\Storage::disk('events')->url('MC43MzQ3NTkwMCAxNTQxNDgxMTcz.jpeg'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium perferendis corporis minima sapiente dolor aperiam quaerat eos. Doloremque debitis soluta et corrupti vitae quibusdam consequuntur tenetur voluptates praesentium. Sint, ea.',
                'date' => '2018-11-27 08:00',
                'capacity' => 90,
            ],
        ];
        Models\User::create($userData);
        foreach($contentData as $data){
            Models\Content::create($data);
        }
        foreach($eventData as $data){
            Models\Event::create($data);
        }
    }
}
