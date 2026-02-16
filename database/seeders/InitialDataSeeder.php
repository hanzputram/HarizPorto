<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pricing;
use App\Models\Setting;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@hariz.com'],
            ['name' => 'Admin Hariz', 'password' => \Illuminate\Support\Facades\Hash::make('admin123')]
        );

        Pricing::create([
            'plan_name' => 'Entry',
            'price' => '$500+',
            'features' => "Single Prop\n4K Textures\nFBX/OBJ",
        ]);

        Pricing::create([
            'plan_name' => 'Elite',
            'price' => '$1,500+',
            'features' => "Character Model\nRigging Ready\nCinematic Render",
            'is_featured' => true,
        ]);

        Pricing::create([
            'plan_name' => 'Universe',
            'price' => '$4,000+',
            'features' => "Environment\nLighting Design\nSource Files",
        ]);

        Setting::create(['key' => 'about_text', 'value' => "I'm a 3D enthusiast with a deep obsession for geometry and lighting. My work blends Neo-brutalist aesthetics with futuristic 3D concepts to create something truly unique."]);
        Setting::create(['key' => 'tools', 'value' => 'Blender, ZBrush']);

        \App\Models\Portfolio::create([
            'title' => 'Neon Cyberbot',
            'category' => 'Hard Surface',
            'description' => 'A high-poly mecha concept with procedural glowing textures.',
            'image_url' => 'https://images.unsplash.com/photo-1614728263952-84ea206f99b6?q=80&w=1000&auto=format&fit=crop',
        ]);

        \App\Models\Portfolio::create([
            'title' => 'Floating Prism',
            'category' => 'Abstract',
            'description' => 'A study of glass refraction and light dispersion in spectral dimensions.',
            'image_url' => 'https://images.unsplash.com/photo-1633167606207-d840b5070fc2?q=80&w=1000&auto=format&fit=crop',
        ]);

        \App\Models\Portfolio::create([
            'title' => 'Desert Monolith',
            'category' => 'Environment',
            'description' => 'A minimalist monolithic structure in an endless pastel desert.',
            'image_url' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=1000&auto=format&fit=crop',
        ]);

        \App\Models\Portfolio::create([
            'title' => 'Liquid Chrome',
            'category' => 'Visualizer',
            'description' => 'Dynamic liquid metal simulation with real-time raytraced reflections.',
            'image_url' => 'https://images.unsplash.com/photo-1550684848-fac1c5b4e853?q=80&w=1000&auto=format&fit=crop',
        ]);
    }
}
