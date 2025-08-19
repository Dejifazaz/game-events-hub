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

        // Football-specific event data
        $eventTypes = [
            'league_match' => [
                'titles' => [
                    'League Match: Manchester United vs Liverpool',
                    'League Match: Real Madrid vs Barcelona',
                    'League Match: Bayern Munich vs Borussia Dortmund',
                    'League Match: Juventus vs AC Milan',
                    'League Match: PSG vs Marseille',
                    'League Match: Arsenal vs Chelsea',
                    'League Match: Atletico Madrid vs Sevilla',
                    'League Match: RB Leipzig vs Bayer Leverkusen',
                    'League Match: Inter Milan vs Napoli',
                    'League Match: Lyon vs Monaco'
                ],
                'descriptions' => [
                    'A crucial league match that could decide the title race. Both teams are in top form and this promises to be an exciting encounter.',
                    'The biggest rivalry in Spanish football. This league clash is always a spectacle with high stakes and intense competition.',
                    'The German classic between two of the country\'s most successful clubs. Expect goals and drama in this league fixture.',
                    'A Serie A showdown between Italian giants. Both teams are fighting for Champions League qualification.',
                    'The French derby between bitter rivals. This league match is always heated and unpredictable.'
                ]
            ],
            'cup_match' => [
                'titles' => [
                    'Cup Final: Real Madrid vs Manchester City',
                    'Cup Semi-Final: Arsenal vs Manchester United',
                    'Cup Final: Barcelona vs Athletic Bilbao',
                    'Cup Final: Bayern Munich vs Borussia Dortmund',
                    'Cup Final: Juventus vs Inter Milan',
                    'Cup Quarter-Final: PSG vs Bayern Munich',
                    'Cup Final: Sevilla vs Roma',
                    'Cup Quarter-Final: Liverpool vs Chelsea',
                    'Cup Semi-Final: Real Madrid vs Atletico Madrid',
                    'Cup Semi-Final: RB Leipzig vs Bayer Leverkusen'
                ],
                'descriptions' => [
                    'The biggest club competition in world football. This final promises to be a clash of titans with everything on the line.',
                    'The oldest football competition in the world. This semi-final is a classic English football encounter.',
                    'The Spanish cup final between two historic clubs. Pride and silverware are at stake in this prestigious match.',
                    'The German cup final between bitter rivals. This is always a special occasion in German football.',
                    'The Italian cup final between two of Serie A\'s biggest clubs. A chance for domestic glory.'
                ]
            ],
            'friendly' => [
                'titles' => [
                    'Friendly Match: Manchester United vs Real Madrid',
                    'Friendly Match: England vs Germany',
                    'Friendly Match: Legends vs Current Stars',
                    'Friendly Match: Barcelona vs Bayern Munich',
                    'Friendly Match: France vs Spain',
                    'Friendly Match: Liverpool vs AC Milan',
                    'Friendly Match: All-Stars vs World XI',
                    'Friendly Match: PSG vs Juventus',
                    'Friendly Match: Italy vs Netherlands',
                    'Friendly Match: Arsenal vs Inter Milan'
                ],
                'descriptions' => [
                    'A pre-season friendly between two European giants. Perfect for testing new tactics and building fitness.',
                    'An international friendly between traditional rivals. A chance to see national teams in action.',
                    'A charity match featuring football legends and current stars. All proceeds go to a good cause.',
                    'A prestigious pre-season friendly between two of Europe\'s most successful clubs.',
                    'An exciting international friendly between two footballing nations with rich histories.'
                ]
            ],
            'training' => [
                'titles' => [
                    'Training Session: Manchester United',
                    'Training Session: Real Madrid',
                    'Training Session: Bayern Munich',
                    'Training Session: Barcelona',
                    'Training Session: Liverpool',
                    'Training Session: Arsenal',
                    'Training Session: PSG',
                    'Training Session: Juventus',
                    'Training Session: AC Milan',
                    'Training Session: Inter Milan'
                ],
                'descriptions' => [
                    'An open training session where fans can watch their favorite players prepare for upcoming matches.',
                    'A special training session focused on developing young talent at one of the world\'s biggest clubs.',
                    'Specialized goalkeeper training with world-class coaches and equipment.',
                    'A fitness-focused training session to improve player conditioning and performance.',
                    'Tactical training session where the team works on formations and game strategies.',
                    'Youth development training for the next generation of football stars.',
                    'Pre-match training session to prepare the team for an important upcoming fixture.',
                    'Recovery training session focused on player rehabilitation and injury prevention.',
                    'Technical skills training to improve ball control, passing, and shooting.',
                    'Team building training session to strengthen team chemistry and communication.'
                ]
            ],
            'tournament' => [
                'titles' => [
                    'Tournament: Champions Cup',
                    'Tournament: Future Stars Cup',
                    'Tournament: Nations Cup',
                    'Tournament: European Super Cup',
                    'Tournament: Community Cup',
                    'Tournament: Elite Cup',
                    'Tournament: World Cup Qualifiers',
                    'Tournament: Pre-Season Cup',
                    'Tournament: Development Cup',
                    'Tournament: Continental Cup'
                ],
                'descriptions' => [
                    'A prestigious summer tournament featuring top clubs from around the world competing for the Champions Cup.',
                    'A youth tournament showcasing the best young talent in football. Scouts from major clubs will be in attendance.',
                    'An international tournament featuring national teams competing for the Nations Cup trophy.',
                    'A club tournament between European champions and cup winners for the prestigious Super Cup.',
                    'A community tournament open to amateur teams and local clubs. Great for grassroots football development.',
                    'An elite tournament featuring only the best professional teams competing for the highest honors.',
                    'International tournament featuring World Cup qualifying matches between national teams.',
                    'A pre-season tournament to help clubs prepare for the upcoming season with competitive matches.',
                    'A development tournament focused on young players and emerging talent in the sport.',
                    'A continental tournament featuring teams from specific regions competing for regional supremacy.'
                ]
            ]
        ];

        $category = $this->faker->randomElement(array_keys($eventTypes));
        $eventType = $eventTypes[$category];
        
        $title = $this->faker->randomElement($eventType['titles']);
        $description = $this->faker->randomElement($eventType['descriptions']);

        return [
            'title' => $title,
            'description' => $description,
            'category' => $category,
            'date' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
            'location' => $stadiumName,
            'capacity' => $this->faker->numberBetween(20000, 80000),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'approved' => true,
            'image' => $imageFile,
        ];
    }
}
