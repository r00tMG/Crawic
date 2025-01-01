<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       /*  \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
        ]); */
        
        
              $categories = [
            ['name' => 'Technology', 'description' => 'Technology-related domains'],
            ['name' => 'Health', 'description' => 'Health and medical domains'],
            ['name' => 'Finance', 'description' => 'Financial domains'],
            ['name' => 'Education', 'description' => 'Educational websites'],
            ['name' => 'Travel', 'description' => 'Travel and tourism sites'],
            ['name' => 'News', 'description' => 'News and media outlets'],
            ['name' => 'Sports', 'description' => 'Sports-related domains'],
            ['name' => 'Fashion', 'description' => 'Fashion and clothing sites'],
            ['name' => 'Food', 'description' => 'Food and cooking websites'],
            ['name' => 'Art', 'description' => 'Art and creative domains'],
            ['name' => 'Music', 'description' => 'Music and entertainment sites'],
            ['name' => 'Automotive', 'description' => 'Automotive and vehicle-related websites'],
            ['name' => 'Real Estate', 'description' => 'Real estate and property sites'],
            ['name' => 'Pets', 'description' => 'Pet-related domains'],
            ['name' => 'Home & Garden', 'description' => 'Home improvement and gardening sites'],
            ['name' => 'Science', 'description' => 'Science and research websites'],
            ['name' => 'Business', 'description' => 'Business and corporate domains'],
            ['name' => 'Fitness', 'description' => 'Fitness and health-related sites'],
            ['name' => 'Travel', 'description' => 'Travel and tourism sites'],
            ['name' => 'Fashion', 'description' => 'Fashion and clothing sites'],
            ['name' => 'Food', 'description' => 'Food and cooking websites'],
            ['name' => 'Art', 'description' => 'Art and creative domains'],
            ['name' => 'Music', 'description' => 'Music and entertainment sites'],
            ['name' => 'Automotive', 'description' => 'Automotive and vehicle-related websites'],
            ['name' => 'Real Estate', 'description' => 'Real estate and property sites'],
            ['name' => 'Pets', 'description' => 'Pet-related domains'],
            ['name' => 'Home & Garden', 'description' => 'Home improvement and gardening sites'],
            ['name' => 'Science', 'description' => 'Science and research websites'],
            ['name' => 'Business', 'description' => 'Business and corporate domains'],
            ['name' => 'Fitness', 'description' => 'Fitness and health-related sites'],
            ['name' => 'Travel', 'description' => 'Travel and tourism sites'],
            ['name' => 'Fashion', 'description' => 'Fashion and clothing sites'],
            ['name' => 'Food', 'description' => 'Food and cooking websites'],
            ['name' => 'Art', 'description' => 'Art and creative domains'],
            ['name' => 'Music', 'description' => 'Music and entertainment sites'],
            ['name' => 'Automotive', 'description' => 'Automotive and vehicle-related websites'],
            ['name' => 'Real Estate', 'description' => 'Real estate and property sites'],
            ['name' => 'Pets', 'description' => 'Pet-related domains'],
            ['name' => 'Home & Garden', 'description' => 'Home improvement and gardening sites'],
            ['name' => 'Science', 'description' => 'Science and research websites'],
            ['name' => 'Business', 'description' => 'Business and corporate domains'],
            ['name' => 'Fitness', 'description' => 'Fitness and health-related sites'],
        ];

        // Insert categories into the 'categories' table
        DB::table('domain_categories')->insert($categories); 
    }
}
