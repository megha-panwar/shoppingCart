<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Clear old products (optional)
        Product::truncate();

        Product::insert([
            [
                'name' => 'Men\'s Cotton T-Shirt',
                'description' => 'Soft cotton round neck t-shirt, perfect for daily wear.',
                'price' => 499.00,
                'quantity' => 5,
                'image_url' => 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women\'s Summer Dress',
                'description' => 'Lightweight floral dress for summer outings.',
                'price' => 899.00,
                'quantity' => 5,
                'image_url' => 'https://www.bullionknot.com/cdn/shop/files/26_3a758bc2-1134-47f6-b6d3-a2fe627ab149.jpg?v=1754644303&width=1200',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kids Teddy Bear',
                'description' => 'Cute soft teddy bear for kids and gifts.',
                'price' => 650.00,
                'quantity' => 5,
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGeD75yLvEl6zIRIgXMlwaEdKKX1t0EBvTmQ&s',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Running Shoes',
                'description' => 'Lightweight running shoes for men and women.',
                'quantity' => 5,
                'price' => 1999.00,
                'image_url' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Leather Wallet',
                'description' => 'Durable leather wallet with multiple card slots.',
                'price' => 749.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/7742559/pexels-photo-7742559.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bluetooth Headphones',
                'description' => 'Wireless over-ear headphones with noise cancellation.',
                'price' => 2999.00,
                'quantity' => 5,
                'image_url' => 'https://images.pexels.com/photos/3479178/pexels-photo-3479178.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smart Watch',
                'description' => 'Fitness tracking smartwatch with heart-rate monitor.',
                'price' => 3499.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/267394/pexels-photo-267394.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women\'s Handbag',
                'description' => 'Elegant leather handbag for casual and office use.',
                'price' => 2299.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/33708891/pexels-photo-33708891.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sports Cap',
                'description' => 'Breathable cotton sports cap for men and women.',
                'price' => 399.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/4816771/pexels-photo-4816771.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coffee Mug',
                'description' => 'Ceramic coffee mug with stylish design.',
                'price' => 299.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/1207918/pexels-photo-1207918.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop Backpack',
                'description' => 'Waterproof laptop backpack with extra compartments.',
                'price' => 1799.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/3178818/pexels-photo-3178818.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Men\'s Formal Shirt',
                'description' => 'Classic slim-fit formal shirt for office wear.',
                'price' => 1199.00,
                'quantity' => 5,

                'image_url' => 'https://images.unsplash.com/photo-1520975661595-6453be3f7070',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women\'s Sneakers',
                'description' => 'Comfortable sneakers with trendy design.',
                'price' => 1599.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/29699298/pexels-photo-29699298.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kids School Bag',
                'description' => 'Durable school bag with cartoon prints.',
                'price' => 899.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/8926553/pexels-photo-8926553.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Table Clock',
                'description' => 'Stylish table clock with modern design.',
                'price' => 549.00,
                'quantity' => 5,

                'image_url' => 'https://images.unsplash.com/photo-1519681393784-d120267933ba',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Water Bottle',
                'description' => 'Stainless steel insulated water bottle.',
                'price' => 599.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/1342529/pexels-photo-1342529.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kitchen Mixer',
                'description' => 'Multi-purpose electric kitchen mixer.',
                'price' => 3499.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/7525096/pexels-photo-7525096.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Desk Chair',
                'description' => 'Ergonomic office chair with adjustable height.',
                'price' => 4599.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/6931974/pexels-photo-6931974.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Table Lamp',
                'description' => 'Modern table lamp with LED bulb.',
                'price' => 899.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/1252814/pexels-photo-1252814.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Soft Blanket',
                'description' => 'Warm and cozy blanket for winter.',
                'price' => 1299.00,
                'quantity' => 5,

                'image_url' => 'https://images.pexels.com/photos/33719889/pexels-photo-33719889.jpeg',
                
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
