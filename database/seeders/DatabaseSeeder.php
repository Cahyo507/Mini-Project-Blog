<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        DB::table('blog')->insert([
            'title' => 'Ini Projek ',
            'konten' => 'A science fiction masterpiece about Martians invading London',
            'author' => 'Cahyo dkk.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // $this->call('UsersTableSeeder');
    }
}
