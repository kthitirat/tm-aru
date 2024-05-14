<?php

namespace Database\Seeders;

use App\Models\Professor;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::factory()->create([
            'name_th' => 'การออมและการลงทุน',
            'name_en' => 'Saving and Investment',
            'code' => 'GE64303',
            'description' => 'ความรู้เบื้องต้นและการนำแนวคิดด้านการออมไปประยุกต์ใช้ในชีวิต บทบาท หน้าที่และความรับผิดชอบในการเสียภาษี รวมถึงสิทธิ์ประโยชน์ทางภาษีตามแนวนโยบายของภาครัฐบาล ความรู้ ความเข้าใจเกี่ยวกับการลงทุนในสินทรัพย์ทางการเงิน และการสร้างผลตอบแทนของเงินออมในการลงทุนในตลาดเงินและตลาดทุน การวางแผนทางการเงินให้สอดคล้องในสภาวะเศรษฐกิจ สู่การเกษียณอายุอย่างยั่งยืน',
            'published_at' => Carbon::today()

        ]);

        $subject = Subject::first();
        $subject->professors()->attach(Professor::first()->id ?? Professor::factory());

        Subject::factory()->count(20)->create();

        $subjects = Subject::all();
        foreach($subjects as $subject){
            $subject->professors()->attach(Professor::inRandomOrder()->first()->id);   //attach การจับมาคู่กัน อาจารย์หลายคนสอนได้หลายวิชา และวิชาก็มีอาจารย์สอนได้หลายคน ดูใน professor_subject_table
            $subject->addMedia(storage_path('seed/mock_subject_image.jpeg'))->preservingOriginal()
            ->toMediaCollection(Subject::MEDIA_COLLECTION_IMAGE);

            $subject->addMedia(storage_path('seed/mock_subject_pdf.pdf'))->preservingOriginal()
            ->toMediaCollection(Subject::MEDIA_COLLECTION_DOCUMENTS);
            $subject->addMedia(storage_path('seed/mock_subject_pdf.pdf'))->preservingOriginal()
            ->toMediaCollection(Subject::MEDIA_COLLECTION_DOCUMENTS);
        }


        //$professor->subjects()->attach(1); อาจารย์สอนวิชาที่
    }
}
