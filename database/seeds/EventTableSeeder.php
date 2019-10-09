<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event')->insert([
            [
                'id' => Uuid::uuid4()->getHex(),
                'categories_id' => 1,
                'event_name' => 'Djakarta Warehouse Project 2019',
                'event_desc' => 'Lorem ipsum dolor sit amet',
                'event_date_start' => '2019-10-15',
                'event_date_end' => '2019-10-18',
                'event_time_start' => '18:00:00',
                'event_time_end' => '22:00:00',
                'event_venue' => 'Gelora Bung Karno Senayan Stadium',
                'event_address' => 'Jl. Pintu Satu Senayan, Jakarta 10270',
                'event_latitude' => -6.218316,
                'event_longitude' => 106.801791,
                'event_organizer' => 'Ismaya Group',
                'event_registrant_quota' => 5000,
                'event_active' => 'active',
            ],
            [
                'id' => Uuid::uuid4()->getHex(),
                'categories_id' => 2,
                'event_name' => 'Gerakan 1001 Startup',
                'event_desc' => 'Lorem ipsum dolor sit amet',
                'event_date_start' => '2019-11-25',
                'event_date_end' => '2019-11-29',
                'event_time_start' => '09:00:00',
                'event_time_end' => '20:00:00',
                'event_venue' => 'Istora Senayan Stadium',
                'event_address' => 'Jl. Pintu Satu Senayan, RT.1/RW.3, Gelora, Tanahabang, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 10270',
                'event_latitude' => -6.220015,
                'event_longitude' => 106.805632,
                'event_organizer' => 'Telkomsel Group',
                'event_registrant_quota' => 12000,
                'event_active' => 'active',
            ],
            [
                'id' => Uuid::uuid4()->getHex(),
                'categories_id' => 4,
                'event_name' => 'Kualifikasi Pra Piala Dunia 2022 Qatar Indonesia vs Thailand',
                'event_desc' => 'Lorem ipsum dolor sit amet',
                'event_date_start' => '2019-11-10',
                'event_date_end' => '2019-11-10',
                'event_time_start' => '19:00:00',
                'event_time_end' => '21:30:00',
                'event_venue' => 'Gelora Bung Karno Senayan Stadium',
                'event_address' => 'Jl. Pintu Satu Senayan, Jakarta 10270',
                'event_latitude' => -6.21831600,
                'event_longitude' => 106.80179100,
                'event_organizer' => 'PSSI Official',
                'event_registrant_quota' => 18000,
                'event_active' => 'active',
            ],
            [
                'id' => Uuid::uuid4()->getHex(),
                'categories_id' => 4,
                'event_name' => 'Djarum Badminton Cup Indonesia 2019',
                'event_desc' => 'Lorem ipsum dolor sit amet',
                'event_date_start' => '2019-11-20',
                'event_date_end' => '2019-11-25',
                'event_time_start' => '14:00:00',
                'event_time_end' => '20:00:00',
                'event_venue' => 'Istora Senayan Stadium',
                'event_address' => 'Jl. Pintu Satu Senayan, RT.1/RW.3, Gelora, Tanahabang, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 10270',
                'event_latitude' => -6.220015,
                'event_longitude' => 106.805632,
                'event_organizer' => 'Djarum Foundation',
                'event_registrant_quota' => 12000,
                'event_active' => 'active',
            ],
            [
                'id' => Uuid::uuid4()->getHex(),
                'categories_id' => 5,
                'event_name' => 'Ralali X Jenius',
                'event_desc' => 'How to build PWA in React Native',
                'event_date_start' => '2019-10-30',
                'event_date_end' => '2019-10-30',
                'event_time_start' => '18:00:00',
                'event_time_end' => '20:00:00',
                'event_venue' => 'Menara BTPN',
                'event_address' => 'Menara BTPN, 18th Floor Jalan DR. Ide Anak Agung Gde Agung Kav. 5.5-5.6 CBD, Mega Kuningan Timur 3, RT.5/RW.2, Kuningan, Kuningan Tim., Setia Budi, DKI Jakarta, Daerah Khusus Ibukota Jakarta',
                'event_latitude' => -6.229870,
                'event_longitude' => 106.827626,
                'event_organizer' => 'Ralali.com',
                'event_registrant_quota' => 300,
                'event_active' => 'active',
            ],
            [
                'id' => Uuid::uuid4()->getHex(),
                'categories_id' => 8,
                'event_name' => 'Gathering Ralali.com Q4',
                'event_desc' => 'Liburna dan jalan-jalan semua karyawan Ralali.com',
                'event_date_start' => '2019-12-20',
                'event_date_end' => '2019-12-22',
                'event_time_start' => '10:00:00',
                'event_time_end' => '20:00:00',
                'event_venue' => 'Puncak Bogor',
                'event_address' => 'Ciloto, Cipanas, Cianjur Regency, West Java',
                'event_latitude' => -6.701753,
                'event_longitude' => 106.9990216,
                'event_organizer' => 'Ralali.com',
                'event_registrant_quota' => 300,
                'event_active' => 'active',
            ],
        ]);
    }
}
