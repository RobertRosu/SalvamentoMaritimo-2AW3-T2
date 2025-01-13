<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;
use App\Models\CrewMember;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'origen' => fake()->city(),
            'destino' => fake()->city(),
            'doctor_id' => Doctor::inRandomOrder()->first()->id,
            'start_date' => fake()->date(),
            'kapitaina_id' => CrewMember::where('rol', 'Kapitaina')->where('status', 'Aktibo')->inRandomOrder()->first()->id,
            'makinen_arduraduna_id' => CrewMember::where('rol', 'Makinen arduraduna')->where('status', 'Aktibo')->inRandomOrder()->first()->id,
            'mekanikoa_id' => CrewMember::where('rol', 'Mekanikoa')->where('status', 'Aktibo')->inRandomOrder()->first()->id,
            'zubiko_ofiziala_id' => CrewMember::where('rol', 'Zubiko ofiziala')->where('status', 'Aktibo')->inRandomOrder()->first()->id,
            'marinela_1_id' => function () {
                return CrewMember::where('rol', 'Marinela')->where('status', 'Aktibo')->inRandomOrder()->first()->id;
            },
            'marinela_2_id' => function () {
                return CrewMember::where('rol', 'Marinela')->where('status', 'Aktibo')->whereNotIn('id', [
                    CrewMember::where('rol', 'Marinela')->where('status', 'Aktibo')->inRandomOrder()->first()->id,
                ])->inRandomOrder()->first()->id;
            },
            'marinela_3_id' => function () {
                return CrewMember::where('rol', 'Marinela')->where('status', 'Aktibo')->whereNotIn('id', [
                    CrewMember::where('rol', 'Marinela')->where('status', 'Aktibo')->inRandomOrder()->first()->id,
                    CrewMember::where('rol', 'Marinela')->where('status', 'Aktibo')->inRandomOrder()->first()->id,
                ])->inRandomOrder()->first()->id;
            },
            'erizaina_id' => CrewMember::where('rol', 'Erizaina')->where('status', 'Aktibo')->inRandomOrder()->first()->id,

        ];
    }
}
