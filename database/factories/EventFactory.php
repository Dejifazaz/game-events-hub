<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition(): array
    {
        $stadiums = [
            'Allianz Arena' => 'allianz-arena.jpg',
            'Signal Iduna Park' => 'signal-iduna.jpg',
            'Camp Nou' => 'camp-nou.jpg',
            'Santiago Bernabéu' => 'santiago-bernabeu.jpg',
            'San Siro' => 'san-siro.jpg',
            'Parc des Princes' => 'parc-des-princes.jpg',
            'Old Trafford' => 'old-trafford.jpg',
            'Anfield' => 'anfield.jpg',
            'Etihad Stadium' => 'etihad-stadium.jpg',
            'Emirates Stadium' => 'emirates-stadium.jpg',
            'Stade Vélodrome' => 'stade-velodrome.jpg',
            'Wanda Metropolitano' => 'wanda-metropolitano.jpg',
            'Parc Olympique Lyonnais' => 'parc-olympique-lyonnais.jpg',
            'Allianz Stadium' => 'allianz-arena.jpg',
            'Stadio Diego Armando Maradona' => 'stadio-maradona.jpg',
        ];

        $stadiumName = $this->faker->randomElement(array_keys($stadiums));
        $imageFile = $stadiums[$stadiumName];
        $locations = ['Dublin', 'London', 'Berlin', 'Paris', 'Rome', 'Madrid', 'Manchester', 'Turin', 'Naples'];

        return [
            'title' => $stadiumName . ' Match',
            'description' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
            'location' => $this->faker->randomElement($locations),
            'capacity' => $this->faker->numberBetween(20000, 80000),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'approved' => true,
            'image' => $imageFile,
        ];
    }
}
