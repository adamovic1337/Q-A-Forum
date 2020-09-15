<?php

use App\Models\Category;
use App\Models\Like;
use App\Models\Question;
use App\Models\Reply;
use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class, 2)->create();
        factory(User::class, 10)->create();
        factory(Category::class, 10)->create();
        factory(Question::class, 50)->create();
        factory(Reply::class, 500)->create();
    }
}
