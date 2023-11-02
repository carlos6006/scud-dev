<?php

namespace Database\Seeders;

 //use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        //$this->call(TransactionsSeeder::class);
        $this->call(BillsSeeder::class);
        $this->call(TypesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ChangelogsSeeder::class);
        $this->call(TaxsRegimeSeeder::class);
        $this->call(SysValuesSeeder::class);




        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
