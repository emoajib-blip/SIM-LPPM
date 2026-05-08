<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $partnerTypes = ['Pemerintah', 'Swasta', 'UMKM', 'Yayasan', 'Organisasi Masyarakat'];
        $partners = [
            'Dinas Kesehatan Kota Pekalongan',
            'Dinas Pendidikan Provinsi Jawa Tengah',
            'PT Telkom Indonesia',
            'CV Berkah Jaya',
            'Koperasi Mitra Sejahtera',
            'Yayasan Pendidikan Indonesia',
            'Kelompok Tani Maju Bersama',
            'Karang Taruna Desa Makmur',
        ];

        return [
            'name' => fake()->randomElement($partners),
            'type' => fake()->randomElement($partnerTypes),
            'address' => fake()->address(),
        ];
    }
}
