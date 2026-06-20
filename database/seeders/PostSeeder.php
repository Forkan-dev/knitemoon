<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Section;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // section identifier => list of posts
        $data = [
            'testimonials' => [
                [
                    'title'   => 'John Mitchell, USA',
                    'slug'    => 'john-mitchell-usa',
                    'excerpt' => '"Outstanding quality and on-time delivery. Our preferred garment partner."',
                    'badge'   => '★★★★★',
                    'order'   => 1,
                    'status'  => 'published',
                ],
                [
                    'title'   => 'Amelia Clarke, UK',
                    'slug'    => 'amelia-clarke-uk',
                    'excerpt' => '"Professional team, excellent communication throughout the order process."',
                    'badge'   => '★★★★★',
                    'order'   => 2,
                    'status'  => 'published',
                ],
            ],
            'faq' => [
                [
                    'title'   => 'What is your minimum order quantity?',
                    'slug'    => 'what-is-your-minimum-order-quantity',
                    'excerpt' => 'Our MOQ is typically 500 pieces per style, though we negotiate for new clients.',
                    'order'   => 1,
                    'status'  => 'published',
                ],
                [
                    'title'   => 'Do you offer sample production?',
                    'slug'    => 'do-you-offer-sample-production',
                    'excerpt' => 'Yes, samples are available within 7-10 business days.',
                    'order'   => 2,
                    'status'  => 'published',
                ],
                [
                    'title'   => 'Which countries do you export to?',
                    'slug'    => 'which-countries-do-you-export-to',
                    'excerpt' => 'We export to Europe, USA, Canada, Australia and the Middle East.',
                    'order'   => 3,
                    'status'  => 'published',
                ],
            ],
            'about-company' => [
                [
                    'title'  => 'About Our Company',
                    'slug'   => 'about-our-company',
                    'body'   => '<p>With over 20 years of experience in textile manufacturing, we&#039;ve established ourselves as a trusted partner for global brands.</p><p>Our state-of-the-art facilities and skilled workforce ensure that every product meets the highest international standards.</p>',
                    'image'  => '01KVJDE7NKWJ0VZDQ36CF30MTE.webp',
                    'order'  => 0,
                    'status' => 'published',
                ],
            ],
            'our-journey' => [
                [
                    'title'  => 'Our Journey',
                    'slug'   => 'our-journey',
                    'body'   => '<p>TextileExport Pro, founded in 2004, has grown from a small textile operation into a globally recognized manufacturer serving over 500 clients across 50+ countries. Known for its strong focus on quality, innovation, and customer satisfaction, the company has earned multiple international certifications and the trust of leading global brands. With continuous investment in modern technology and a skilled workforce, TextileExport Pro maintains its position as a competitive leader in the global textile industry.</p>',
                    'image'  => '01KV8KP8B08MWY4HBZZPGTWS28.jpg',
                    'order'  => 0,
                    'status' => 'published',
                ],
            ],
            'mission' => [
                [
                    'title'  => 'Mission 1 ',
                    'slug'   => 'mission-1',
                    'body'   => '<p>Mission 1 To manufacture premium quality garments that meet international standards while maintaining sustainable practices and supporting our workforce with fair wages and safe working conditions.</p>',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'Our Vision',
                    'slug'   => 'our-vision',
                    'body'   => '<p>Our VisionTo be the most trusted and innovative textile manufacturer in Asia, recognized for delivering exceptional quality, reliability, and environmental responsibility to our global partners.</p>',
                    'order'  => 0,
                    'status' => 'published',
                ],
            ],
            'our-core-values' => [
                [
                    'title'  => 'Quality Excellence',
                    'slug'   => 'quality-excellence',
                    'body'   => '<p>We never compromise on quality. Every product undergoes rigorous testing to ensure it meets international standards.</p>',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'Sustainability',
                    'slug'   => 'sustainability',
                    'body'   => '<p>Environmental responsibility is at the heart of our operations, from sustainable materials to waste management.</p>',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'Fair Practices',
                    'slug'   => 'fair-practices',
                    'body'   => '<p>We believe in fair wages, safe working conditions, and respect for our employees and partners.</p>',
                    'order'  => 0,
                    'status' => 'published',
                ],
            ],
            'contact-form' => [
                [
                    'title'  => 'Address',
                    'slug'   => 'address',
                    'body'   => '<p><strong>Address: </strong>PLOT# S-10, BSCIC I/A, KALURGHAT,CHATTOGRAM</p><p><strong>Thana: </strong>Chandgaon</p><p><strong>District: </strong>Chittagong</p>',
                    'icon'   => 'fas fa-map-marker-alt text-green-700 mt-1',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'Phone',
                    'slug'   => 'phone',
                    'body'   => '<p>01819400500</p>',
                    'icon'   => 'fas fa-phone text-green-700 mt-1',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'Email',
                    'slug'   => 'email',
                    'body'   => '<p>knitmoon@gmail.com</p>',
                    'icon'   => 'fas fa-envelope text-green-700 mt-1',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'WhatsApp',
                    'slug'   => 'whatsapp',
                    'body'   => '<p>01819400500</p>',
                    'icon'   => 'fab fa-whatsapp text-green-700 mt-1',
                    'order'  => 0,
                    'status' => 'published',
                ],
            ],
            'gallery' => [
                [
                    'title'  => 'Our factory',
                    'slug'   => 'our-factory',
                    'body'   => '<p></p>',
                    'image'  => '01KVGAD82N7BV1K2SKM9ZS0TP4.jpg',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'Factory',
                    'slug'   => 'factory',
                    'body'   => '<p></p>',
                    'image'  => '01KVGC6GYGJ3R37GJZWKZVV5D5.jpg',
                    'order'  => 0,
                    'status' => 'published',
                ],
            ],
            'product' => [
                [
                    'title'   => 'Premium Cotton T-Shirt',
                    'slug'    => 'premium-cotton-t-shirt',
                    'excerpt' => 'High-quality cotton jersey with comfortable fit',
                    'body'    => '<p><strong>Fabric:</strong> 100% Cotton</p><p><strong>GSM:</strong> 180 - 200</p><p><strong>MOQ:</strong> 500 units</p><p><strong>Colors:</strong> 15+ options</p>',
                    'image'   => '01KVJJCJX24TF31V6SREB1HSHC.webp',
                    'order'   => 0,
                    'status'  => 'published',
                ],
                [
                    'title'  => 'Mens Premium Solid T-Shirt',
                    'slug'   => 'mens-premium-solid-t-shirt',
                    'body'   => '<p><strong>Fabric:</strong> 100% Cotton</p><p><strong>GSM:</strong> 130 - 150</p><p><strong>MOQ:</strong> 1000 units</p><p><strong>Colors:</strong> 15+ options</p>',
                    'image'  => '01KVJJFQ9N6JKV34XA4S01Z9FQ.webp',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'Basic T-shirt for Men',
                    'slug'   => 'basic-t-shirt-for-men',
                    'body'   => '<p><strong>Fabric:</strong> 100% Cotton</p><p><strong>GSM:</strong> 180 - 200</p><p><strong>MOQ:</strong> 500 units</p><p><strong>Colors:</strong> 15+ options<br><br><br></p>',
                    'image'  => '01KVJJP4P1NXAP6K4T1WWAQSMV.jpg',
                    'order'  => 0,
                    'status' => 'published',
                ],
            ],
            'tea' => [
                [
                    'title'         => 'Chairman',
                    'slug'          => 'chairman',
                    'body'          => '<blockquote><p><br>It is my privilege to lead a company built on a foundation of quality, integrity, and relentless dedication to our craft. For over two decades, we have woven trust into every thread, delivering garments that meet the highest international standards while empowering the people and communities behind them.</p><p>As we look to the future, our commitment remains unchanged — to innovate responsibly, to grow sustainably, and to be a partner you can rely on. Thank you for being part of our journey. Together, we will continue to shape the future of textile excellence.</p></blockquote><p></p><p></p><p></p><p></p><p></p><p></p><h2><strong>Khaled Hoq</strong></h2><p><strong>Chairman &amp; Founder</strong></p>',
                    'image'         => '01KVGQZQRPQG4EF6E4YZH2MB29.jpg',
                    'icon'          => 'fab fa-linkedin-in',
                    'button_url'    => 'https://www.linkedin.com/in/khaled-hoq-73b93b22/',
                    'button_target' => '_blank',
                    'order'         => 0,
                    'status'        => 'published',
                ],
            ],
            'home' => [
                [
                    'title'  => 'Logo',
                    'slug'   => 'logo',
                    'body'   => '<p>kintmoon</p>',
                    'image'  => '01KVHXECP8FH6HWZJAK4QX0GNV.png',
                    'order'  => 0,
                    'status' => 'published',
                ],
            ],
            'factory-highlights' => [
                [
                    'title'  => 'Quality Control',
                    'slug'   => 'quality-control',
                    'body'   => '<p>Strict testing at every production stage</p><p><strong>✓ International standards compliance</strong></p>',
                    'image'  => '01KVJGQV8BQKYNHGRVQWSW01JW.jpg',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'Production Capacity',
                    'slug'   => 'production-capacity',
                    'body'   => '<p>500,000+ units per month with full quality control</p><p><strong>✓ State-of-the-art machinery</strong></p>',
                    'image'  => '01KVJGS30GSY97KS88S0EFHTF9.webp',
                    'order'  => 0,
                    'status' => 'published',
                ],
                [
                    'title'  => 'Quality Control',
                    'slug'   => 'quality-control-1',
                    'body'   => '<p>Strict testing at every production stage</p><p><strong>✓ International standards compliance</strong></p>',
                    'image'  => '01KVJGYWQJ81G1F55H64QE319S.webp',
                    'order'  => 0,
                    'status' => 'published',
                ],
            ],
        ];

        foreach ($data as $identifier => $posts) {
            $section = Section::where('identifier', $identifier)->first();
            if (! $section) {
                continue;
            }

            foreach ($posts as $postData) {
                Post::firstOrCreate(
                    ['slug' => $postData['slug']],
                    array_merge($postData, ['section_id' => $section->id])
                );
            }
        }
    }
}
