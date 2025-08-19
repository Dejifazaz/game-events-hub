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
                    'Premier League: Manchester United vs Liverpool',
                    'La Liga: Real Madrid vs Barcelona',
                    'Bundesliga: Bayern Munich vs Borussia Dortmund',
                    'Serie A: Juventus vs AC Milan',
                    'Ligue 1: PSG vs Marseille',
                    'Premier League: Arsenal vs Chelsea',
                    'La Liga: Atletico Madrid vs Sevilla',
                    'Bundesliga: RB Leipzig vs Bayer Leverkusen',
                    'Serie A: Inter Milan vs Napoli',
                    'Ligue 1: Lyon vs Monaco'
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
                    'Champions League Final: Real Madrid vs Manchester City',
                    'FA Cup Semi-Final: Arsenal vs Manchester United',
                    'Copa del Rey Final: Barcelona vs Athletic Bilbao',
                    'DFB Pokal Final: Bayern Munich vs Borussia Dortmund',
                    'Coppa Italia Final: Juventus vs Inter Milan',
                    'Champions League Quarter-Final: PSG vs Bayern Munich',
                    'Europa League Final: Sevilla vs Roma',
                    'FA Cup Quarter-Final: Liverpool vs Chelsea',
                    'Copa del Rey Semi-Final: Real Madrid vs Atletico Madrid',
                    'DFB Pokal Semi-Final: RB Leipzig vs Bayer Leverkusen'
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
                    'Pre-Season Friendly: Manchester United vs Real Madrid',
                    'International Friendly: England vs Germany',
                    'Charity Match: Legends vs Current Stars',
                    'Pre-Season Friendly: Barcelona vs Bayern Munich',
                    'International Friendly: France vs Spain',
                    'Pre-Season Friendly: Liverpool vs AC Milan',
                    'Charity Match: All-Stars vs World XI',
                    'Pre-Season Friendly: PSG vs Juventus',
                    'International Friendly: Italy vs Netherlands',
                    'Pre-Season Friendly: Arsenal vs Inter Milan'
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
                    'Open Training Session: Manchester United',
                    'Youth Academy Training: Real Madrid',
                    'Goalkeeper Training Camp: Bayern Munich',
                    'Fitness Training Session: Barcelona',
                    'Tactical Training: Liverpool',
                    'Youth Development Training: Arsenal',
                    'Pre-Match Training: PSG',
                    'Recovery Training Session: Juventus',
                    'Technical Skills Training: AC Milan',
                    'Team Building Training: Inter Milan'
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
                    'Summer Football Tournament: Champions Cup',
                    'Youth Tournament: Future Stars Cup',
                    'International Tournament: Nations Cup',
                    'Club Tournament: European Super Cup',
                    'Amateur Tournament: Community Cup',
                    'Professional Tournament: Elite Cup',
                    'International Tournament: World Cup Qualifiers',
                    'Club Tournament: Pre-Season Cup',
                    'Youth Tournament: Development Cup',
                    'International Tournament: Continental Cup'
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
