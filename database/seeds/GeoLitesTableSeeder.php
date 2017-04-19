<?php

use App\Country;
use App\GeoLite;
use Illuminate\Database\Seeder;

class GeoLitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availableCountries = Country::get()->map(function ($country) {
            return $country->code;
        })->toArray();

        $countries = [];

        $header = [];
        $rows = [];
        $count = -1;

        if (($handle = fopen(base_path('database/seeds/data/GeoLite2-Country-CSV_20170404/GeoLite2-Country-Locations-en.csv'), 'r')) !== false) {
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
            $countries[$row['geoname_id']] = $row;
        }

        $header = [];
        $rows = [];
        $count = -1;

        if (($handle = fopen(base_path('database/seeds/data/GeoLite2-Country-CSV_20170404/GeoLite2-Country-Blocks-IPv4.csv'), 'r')) !== false) {
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

        $geo_lites = [];

        foreach ($rows as $row) {
            if (
                isset($countries[$row['geoname_id']]['country_iso_code']) and
                in_array(strtolower($countries[$row['geoname_id']]['country_iso_code']), $availableCountries)
            ) {

                // Get range from network

                $network = explode('/', $row['network']);
                $start = long2ip((ip2long($network[0])) & ((-1 << (32 - (int) $network[1]))));
                $end = long2ip((ip2long($network[0])) + pow(2, (32 - (int) $network[1])) - 1);

                $geo_lites[] = [
                    'start'        => $start,
                    'end'          => $end,
                    'country_code' => strtolower($countries[$row['geoname_id']]['country_iso_code']),
                ];
            }
        }

        // Bulk insert is so mush faster
        foreach (array_chunk($geo_lites, 2500) as $geo_lites_chunk) {
            GeoLite::insert(
                $geo_lites_chunk
            );
        }
    }
}
