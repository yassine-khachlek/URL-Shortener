<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $header = [];
        $rows = [];
        $count = -1;

        if (($handle = fopen(base_path('database/seeds/data/countries.csv'), 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $num = count($data);
                $count++;
                if ($count < 1) {
                    for ($c = 0; $c < $num; $c++) {
                        $header[$c] = $data[$c];
                    }
                } else {
                    $rows[$count] = [];
                    for ($c = 0; $c < $num; $c++) {
                        if ($data[$c] === 'null') {
                            $data[$c] = null;
                        }
                        $rows[$count][$header[$c]] = $data[$c];
                    }
                }
            }
            fclose($handle);
        }

        foreach ($rows as $row) {
            Country::firstOrCreate(['code' => strtolower($row['code'])], [
                'code' => strtolower($row['code']),
                'name' => $row['name'],
            ]);
        }
    }
}
