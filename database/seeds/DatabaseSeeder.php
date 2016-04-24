<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(BulletinsTableSeeder::class);
        $this->call(OffersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        App\User::create([
            'name' => 'Igor',
            'email' => 'igor@i.ru',
            'password' => bcrypt('qwerty'),
        ]);
        App\User::create([
            'name' => 'Vasia',
            'email' => 'vasia@v.ru',
            'password' => bcrypt('qwerty'),
        ]);
    }
}

class StatusesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->delete();
        App\Status::create([
            'title' => 'In progress',
        ]);
        App\Status::create([
            'title' => 'Done',
        ]);
    }
}

class BulletinsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bulletins')->delete();
        App\Bulletin::create([
            'user_id' => 1,
            'title' => 'Bulletin 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 100.00,
            'status_id' => 2,
        ]);
        App\Bulletin::create([
            'user_id' => 1,
            'title' => 'Bulletin 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 200.00,
            'status_id' => 1,
        ]);
        App\Bulletin::create([
            'user_id' => 2,
            'title' => 'Bulletin 3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 300.00,
            'status_id' => 1,
        ]);
    }
}

class OffersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('offers')->delete();
        App\Offer::create([
            'bulletin_id' => 1,
            'user_id' => 2,
            'title' => 'My offer 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 50.00,
            'status_id' => 1,
        ]);
        App\Offer::create([
            'bulletin_id' => 1,
            'user_id' => 2,
            'title' => 'My offer 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 75.00,
            'status_id' => 2,
        ]);
        App\Offer::create([
            'bulletin_id' => 2,
            'user_id' => 2,
            'title' => 'My offer 3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 299.00,
            'status_id' => 1,
        ]);
        App\Offer::create([
            'bulletin_id' => 2,
            'user_id' => 2,
            'title' => 'My offer 4',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 299.99,
            'status_id' => 1,
        ]);
    }
}