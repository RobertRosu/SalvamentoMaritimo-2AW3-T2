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
            'description' => fake()->randomElement([
                'Tripulazioko kideek azaldu dutenez, herenegun arratsaldean nabigatzen ari zirela egurrezko txalupa bat ikusi zuten, eta laguntzera joan ziren. Bertan zeuden 55 lagunak erreskatatu zituzten. Erreskate hura egiten ari zirela, abisu bat jaso zuten esateko inguruan beste txalupa bat zegoela noraezean. Bertara joatea erabaki zuten. Itxaso txarra zegoen, eta erreskatea «konplikatu xamarra» izan bazen ere, lortu zuten 57 pertsona salbatzea.',
                'Aita Mari ontziak 112 pertsona erreskatatu zituen herenegun iluntzean Mediterraneo itsasoan, erdialdeko ibilbidean. Itsas Salbamendu Humanitarioa gobernuz kanpoko erakundeak jakinarazi duenez, bi erreskate egin zituzten. Gaur eguerdian lehorreratzekoak dira Reggio di Calabrian (Italia). Erreskatatu guztiak «ondo» daude, baina ahul eta zorabiatuta daude, eta hipotermia sintomak ere badituzte. Erreskatatuen artean hemeretzi adingabeak dira, horietako sei 0 eta 3 urte bitarteko haurtxoak eta hiru 3 eta 12 urte bitarteko umeak.', 
                'Erreskatea goizaldean egin dute, Libia inguruan. Metro bat baino altuagoko olatuen artean erreskatatu dute txalupa. Ohar bidez adierazi dutenez, berehala eman diete gertatzen ari zenaren berri Italiako, Maltako, Libiako eta Espainiako agintariei, erreskatea hasi baino lehen, erreskateak iraun bitartean eta ondoren. Hasieran ez dute erantzunik jaso, ordea: «Hainbat saiakeraren ondoren erantzunik jaso ez denez, itsas araudiaren arabera jokatu da, eta, behin laguntza emanda, Italiako Gobernuak berehala eman digu portua».', 
                'Lau eguneko bidaiaren ondoren, Aita Mari ontzia Ortonako portuan (Italia) lehorreratu da gaur goizaldean. Joan den astean erreskatatutako 43 pertsonak hango autoritateen esku gelditu dira; guztiak gizonezkoak dira, egiptoarrak, sudandarrak eta bangladeshtarrak.', 
                'SMH Itsas Salbamendu Humanitarioaren Aita Mari ontzia Pasaiatik atera da  09:15etan, itsasoratzea ikusteko bildu direnen animo eta txalo artean. Gobernuz kanpoko erakundeak hamahirugarren bidaia du jada: Mediterraneoan noraezean geratutako migratzaileak erreskatatzea du zeregin nagusia, eta Italiako Sirakusa portua izango du helmuga. Ontzian doazen hamalau tripulatzaileei hiru sorosle, bi erizain eta kazetari bat batu zaizkie; misioak bost aste irautea aurreikusten dute.', 
                'Aita Mari erreskate ontziak Mediterraneoko uretan egindako operazioan 34 pertsona erreskatatu ditu. Zehaztu dute gehien-gehienak Siriatik etorritakoak direla, eta badaude Egiptotik, Nigeriatik eta Bangladeshtik etorritakoak ere. Hiru adingabe daude taldean, eta emakume bat haurdun, zazpi hilabeteko. Hori bai, «denak ondo daude», salbamendu taldeak jakinarazi duenez. ', 
                'Laguntza deia 03:30 aldera jaso zuen SMH Itsas Salbamendu Humanitarioko itsasontziak, eta 05:00etan heldu ziren ontzia zegoen tokira. Ontzian zihoazen migratzaileak akituta zeuden, baina osasunez ongi. SMHk jakinarazi duenez, erreskatea arazorik gabe egin zuten, baina jendea ontzitik ateratzen ari zirenean Libiako kostazainen ontzi bat igaro zen salbamendu lanak egiten ari ziren tokitik oso gertu, eta tentsio uneak eragin zituen.'
            ]),


        ];
    }
}
