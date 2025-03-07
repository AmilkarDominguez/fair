<?php

namespace Database\Seeders;

use App\Models\Stand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class StandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Stand::create([
            'name' => 'Pil Tarija',
            'logo' => 'storage/stand-logos/1673700585-stand-logo.jpg',
            'url_video' => 'https://piltarija.com/',
            'banner_a' => 'storage/stand-banners/1673700585-stand-a.jpg',
            'banner_b' => 'storage/stand-banners/1673700585-stand-b.jpg',
            'banner_c' => 'storage/stand-banners/1673700585-stand-c.jpg',
            'banner_d' => 'storage/stand-banners/1673700585-stand-d.jpg',
            'banner_e' => 'storage/stand-banners/1673700585-stand-e.jpg',
            'web_site' => 'https://piltarija.com/',
            'facebook' => 'https://piltarija.com/',
            'whatsapp' => 'https://piltarija.com/',
            'youtube' => 'https://piltarija.com/',
            'instagram' => 'https://piltarija.com/',
            'pavilion_id' => '1',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        Stand::create([
            'name' => 'Instituto Técnico Domingo Savio',
            'logo' => 'storage/stand-logos/1673701679-stand-logo.png',
            'url_video' => 'https://www.imcruzcenter.com.bo/',
            'banner_a' => 'storage/stand-banners/1673701679-stand-a.jpg',
            'banner_b' => 'storage/stand-banners/1673701679-stand-b.jpg',
            'banner_c' => 'storage/stand-banners/1673701679-stand-c.jpg',
            'banner_d' => 'storage/stand-banners/1673701679-stand-d.jpg',
            'banner_e' => 'storage/stand-banners/1673701679-stand-e.jpg',
            'web_site' => 'https://www.imcruzcenter.com.bo/',
            'facebook' => 'https://www.imcruzcenter.com.bo/',
            'whatsapp' => 'https://www.imcruzcenter.com.bo/',
            'youtube' => 'https://www.imcruzcenter.com.bo/',
            'instagram' => 'https://www.imcruzcenter.com.bo/',
            'pavilion_id' => '2',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        Stand::create([
            'name' => 'Universidad Privada Domingo Savio',
            'logo' => 'storage/stand-logos/1673701679-stand-logo.png',
            'url_video' => 'https://www.imcruzcenter.com.bo/',
            'banner_a' => 'storage/stand-banners/1673701679-stand-a.jpg',
            'banner_b' => 'storage/stand-banners/1673701679-stand-b.jpg',
            'banner_c' => 'storage/stand-banners/1673701679-stand-c.jpg',
            'banner_d' => 'storage/stand-banners/1673701679-stand-d.jpg',
            'banner_e' => 'storage/stand-banners/1673701679-stand-e.jpg',
            'web_site' => 'https://www.imcruzcenter.com.bo/',
            'facebook' => 'https://www.imcruzcenter.com.bo/',
            'whatsapp' => 'https://www.imcruzcenter.com.bo/',
            'youtube' => 'https://www.imcruzcenter.com.bo/',
            'instagram' => 'https://www.imcruzcenter.com.bo/',
            'pavilion_id' => '2',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        //Consesionario de Autos
        Stand::create([
            'name' => 'Imcruz',
            'logo' => 'storage/stand-logos/1673701679-stand-logo.png',
            'url_video' => 'https://www.imcruzcenter.com.bo/',
            'banner_a' => 'storage/stand-banners/1673701679-stand-a.jpg',
            'banner_b' => 'storage/stand-banners/1673701679-stand-b.jpg',
            'banner_c' => 'storage/stand-banners/1673701679-stand-c.jpg',
            'banner_d' => 'storage/stand-banners/1673701679-stand-d.jpg',
            'banner_e' => 'storage/stand-banners/1673701679-stand-e.jpg',
            'web_site' => 'https://www.imcruzcenter.com.bo/',
            'facebook' => 'https://www.imcruzcenter.com.bo/',
            'whatsapp' => 'https://www.imcruzcenter.com.bo/',
            'youtube' => 'https://www.imcruzcenter.com.bo/',
            'instagram' => 'https://www.imcruzcenter.com.bo/',
            'pavilion_id' => '5',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
    }
}
