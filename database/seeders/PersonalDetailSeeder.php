<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal_details')->insert([
            ['user_id'=>4,'first_name'=>'Ronaldo','last_name'=>'Nazario','phone_no'=>'','ic_number'=>780222120131,'date_born'=>'22/02/1978','full_address'=>'1 4463 Lrg Penghulu Gombak Setia 53100 Gombak 53100 Malaysia 53100 Malaysia','photo'=>'ronaldo.jpg'],
            ['user_id'=>5,'first_name'=>'Zinedine','last_name'=>'Zidane','phone_no'=>'','ic_number'=>800912120991,'date_born'=>'12/09/1980','full_address'=>' 4 Kompleks Pertama Jln Tuanku Abdul Rahman,55300,Kuala Lumpur,Wilayah Persekutuan','photo'=>'zidane.jpeg'],
            ['user_id'=>6,'first_name'=>'Roman','last_name'=>'Riquelme','phone_no'=>'','ic_number'=>781212012129,'date_born'=>'12/12/1978','full_address'=>' 808 Jln Bangi Batu 1 1/2 Semenyih Semenyih Malaysia Semenyih 43500 Malaysia, Selangor, 43500','photo'=>'riquelme.jpg'],
            ['user_id'=>7,'first_name'=>'Iker','last_name'=>'Casillas','phone_no'=>'','ic_number'=>790314120921,'date_born'=>'14/03/1979','full_address'=>' Plb4 Jln Atas 34250 Tanjong Piandang Tanjong Piandang Perak 34250 Malaysia Tanjong Piandang Perak 34','photo'=>'casillas.jfif'],
            ['user_id'=>8,'first_name'=>'David','last_name'=>'Beckham','phone_no'=>'','ic_number'=>770401049123,'date_born'=>'01/04/1977','full_address'=>' 36-1 Lorong Batu Nilam 3A Bandar Bukit Tinggi 41200 Malaysia','photo'=>'beckham.jpg'],
            ['user_id'=>9,'first_name'=>'Ronaldinho','last_name'=>'Gaucho','phone_no'=>'','ic_number'=>741021061231,'date_born'=>'21/10/1974','full_address'=>' No. 30 1St Floor Jln 9/116B Sri Desa Entrepreneurs Park 58200 Wilayah Persekutuan 58200 Malaysia','photo'=>'ronaldinho.jpeg'],
            ['user_id'=>10,'first_name'=>'Thiery','last_name'=>'Henry','phone_no'=>'','ic_number'=>810819034141,'date_born'=>'19/08/1981','full_address'=>' Ba 31 Jln Indera Kayangan 01000 Kangar Kangar Perlis 01000 Malaysia Kangar Perlis 01000 Malaysia','photo'=>'henry.jpg'],
            ['user_id'=>11,'first_name'=>'Pablo','last_name'=>'Aimar','phone_no'=>'','ic_number'=>811018412121,'date_born'=>'18/10/1981','full_address'=>' Jalan Usj 2/2D, Subang Uep, 47600','photo'=>'aimar.jfif'],
            ['user_id'=>12,'first_name'=>'Raul','last_name'=>'Gonzalez','phone_no'=>'','ic_number'=>790919123033,'date_born'=>'19/09/1979','full_address'=>' No. 959 Gr Kompleks Perniagaan Peruda Jln Sultan Badlishah 05000 Alor Setar Kedah','photo'=>'raul.jpeg'],
            ['user_id'=>13,'first_name'=>'Michael','last_name'=>'Owen','phone_no'=>'','ic_number'=>760921113203,'date_born'=>'21/09/1976','full_address'=>' No. 2 Ladang Tanah Merah 71960 Chuah Negeri Sembilan','photo'=>'owen.jpg'],
            ['user_id'=>14,'first_name'=>'Roy','last_name'=>'Keane','phone_no'=>'','ic_number'=>770901289095,'date_born'=>'12/09/1977','full_address'=>' Stesyen Petronas Jln Bangor 26600 Chini Chini Pahang 26600 Malaysia Pekan Pahang 26600 Malaysia','photo'=>'keane.webp'],
            ['user_id'=>15,'first_name'=>'Paulo','last_name'=>'Maldini','phone_no'=>'','ic_number'=>790721027521,'date_born'=>'21/07/1979','full_address'=>' 1St Floor Mahkota Parade Jln Merdeka 75000 Melaka Melaka Meleka Melaka 75000 Malaysia','photo'=>'maldini.jfif'],
            
            
            
            ['user_id'=>16,'first_name'=>'Lionel','last_name'=>'Messi','phone_no'=>'','ic_number'=>970422120991,'date_born'=>'22/04/1997','full_address'=>'Street:  2A 21 Jln Perdana 4/3 Taman Pandan Perdana, 55300,Kuala Lumpur,Wilayah Persekutuan','photo'=>'messi.jpg'],
            ['user_id'=>18,'first_name'=>'Kylian','last_name'=>'Mbappe','phone_no'=>'','ic_number'=>991212121995,'date_born'=>'12/12/1999','full_address'=>'16 Jln Kaskas 2 Taman Cheras 56100 Wilayah Persekutuan 56100 Malaysia 56100 Malaysia','photo'=>'mbappe.jpg'],
            ['user_id'=>19,'first_name'=>'Erling','last_name'=>'Haaland','phone_no'=>'','ic_number'=>000117120103,'date_born'=>'17/01/2000','full_address'=>'Amoda Building, 22 Jalan Imbi, Wilayah Persekutuan 55100','photo'=>'haaland.jpg'],
            ['user_id'=>24,'first_name'=>'Son','last_name'=>'HeungMin','phone_no'=>'','ic_number'=>001104120103,'date_born'=>'04/11/2000','full_address'=>'No. 175 1St Floor Pusat Perniagaan Putra Jln Putra 8 Kilang Lama 09000 Kulim Kedah Kulim Kedah 09000','photo'=>'heungmin.jpg'],
            ['user_id'=>25,'first_name'=>'Julian','last_name'=>'Brandt','phone_no'=>'','ic_number'=>991203120019,'date_born'=>'03/12/1999','full_address'=>'54 Jalan Gambut Kuantan Pahang Malaysia Kuantan Pahang 25000 Malaysia','photo'=>'heungmin.jpg'],
            
            ['user_id'=>1,'first_name'=>'Maizatul','last_name'=>'Amirah','phone_no'=>'','ic_number'=>850108129224,'date_born'=>'1985-01-08','full_address'=>'9 Wisma Cycle & Carriage Jalan Raja Laut 50300 Wilayah Persekutuan Malaysia','photo'=>'amirah.jfif'],
            ['user_id'=>2,'first_name'=>'Maria','last_name'=>'Elena','phone_no'=>'','ic_number'=>801111120218,'date_born'=>'1980-11-11','full_address'=>'Kompleks Penghulu, Tasik Biru Kundang, 48050 Rawang, Selangor, 48050','photo'=>'maria.jpg'],
            ['user_id'=>3,'first_name'=>'Nur','last_name'=>'Aisyah','phone_no'=>'','ic_number'=>821218129916,'date_born'=>'1982-12-18','full_address'=>'G Bangunan Bukit Mata 23 Jln Padungan 93100Kuching Sarawak 93100 MalaysiaSarawak 93100 Malaysia','photo'=>'aisyah.jpg'],
        ]);
    }
}
