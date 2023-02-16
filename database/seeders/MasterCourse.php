<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterCourse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_courses')->insert([
            ['trainer_id'=>1,'name'=>'Advanced Calculus','photo'=>'advanced_calculus.jpg','description'=>'Features an introduction to advanced calculus and highlights its inherent concepts from linear algebra'],
            ['trainer_id'=>2,'name'=>'Science','photo'=>'science.jpg','description'=>"Brighter Thinking drives our approach to science: a solid foundation of research from leading educational thinkers."],
            ['trainer_id'=>3,'name'=>'Islamic Study','photo'=>'islamic_study.jpg','description'=>"Islamic studies gives them the knowledge and skills they're seeking. “Students develop the ability to express the knowledge they have gained."],
            ['trainer_id'=>4,'name'=>'History','photo'=>'history.jpg','description'=>"To study history is to study change: historians are experts in examining and interpreting human identities and transformations of societies and civilizations over time. "],
            ['trainer_id'=>5,'name'=>'Geography','photo'=>'geography.jpg','description'=>"With the growing importance of issues such as climate change, migration, environmental degradation, spatial epidemiology and inequalities."],
            ['trainer_id'=>6,'name'=>'Arabic Language','photo'=>'arabic_language.jpg','description'=>"learning Arabic will open up chances to travel, work, and investigate in these Arabic talking nations."],
            ['trainer_id'=>7,'name'=>'Chinese Language','photo'=>'chinese_language.jpg','description'=>"International businesses prefer to hire people who speak more than one language. China has become a huge market."],
            ['trainer_id'=>8,'name'=>'Software Development','photo'=>'software_development.jpg','description'=>"As a Software Developer you constantly provide solutions for users' problems. You can be working on the occasional quick fix as well as more complex strategic solutions."],
            ['trainer_id'=>9,'name'=>'Business','photo'=>'business.jpg','description'=>"Choosing a business degree will give you a good understanding of basic economic principles, how markets are affected by world events, and how to assess a firms' financial health."],
            ['trainer_id'=>10,'name'=>'Database Management','photo'=>'database_management.jpg','description'=>"Database management systems are essential for businesses because they offer an efficient way of handling large amounts and multiple types of data."],
            ['trainer_id'=>11,'name'=>'Statistics','photo'=>'statistics.jpg','description'=>"Statistical knowledge helps you use the proper methods to collect the data, employ the correct analyses, and effectively present the results."],
            ['trainer_id'=>12,'name'=>'Mathematic ','photo'=>'mathematics.jpg','description'=>"Math helps strengthen reasoning skills and critical thinking. It helps us think analytically about the world and reason logically."],
        ]);
    }
}
