<?php

namespace Database\Seeders;

use App\Models\Cluster;
use Illuminate\Database\Seeder;

class ClusterSeeder extends Seeder
{
    public function run()
    {
        Cluster::insert([
            [
                'name'          => 'Cluster Brawijaya',
                "tree_type_id"  => 2,
                "location_id"   => 2,
                "avg_tall"      => 5,
                "donatures"     => "john doe|jane doe|fulan",
                "polygon_data"  => json_encode([
                    [
                        -7.974245885649665,
                        112.6311723691703,
                    ],
                    [
                        -7.974635615657827,
                        112.63094608627047,
                    ],
                    [
                        -7.97543456101356,
                        112.63053287401863,
                    ],
                    [
                        -7.975970438121503,
                        112.63149211674613,
                    ],
                    [
                        -7.975536864879299,
                        112.63179218754807,
                    ],
                    [
                        -7.974591771050458,
                        112.63127075303979,
                    ],
                    [
                        -7.974314088427903,
                        112.63145276319834,
                    ],
                    [
                        -7.9742361423947,
                        112.63116744997683,
                    ],
                ]),
                "tree_count" => 100,
            ],
            [
                'name'          => 'Cluster Bimasakti',
                "tree_type_id"  => 1,
                "location_id"   => 1,
                "avg_tall"      => 5,
                "donatures"     => "john doe|jane doe|fulan",
                "polygon_data"  => json_encode([
                    [
                        -7.944276162487735,
                        112.60280694216664,
                    ],
                    [
                        -7.945509226200774,
                        112.60239193748998,
                    ],
                    [
                        -7.9459381170588985,
                        112.60380385557474,
                    ],
                    [
                        -7.94465144314028,
                        112.60378581189315,
                    ],
                ]),
                "tree_count" => 100,
            ],
        ]);
    }
}
