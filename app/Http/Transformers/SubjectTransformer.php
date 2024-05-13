<?php

namespace App\Http\Transformers;


use App\Models\Subject;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use Phattarachai\ThaiDate\ThaiDate;

class SubjectTransformer extends TransformerAbstract
{
    protected array $availableIncludes = ['documents'];

    public function transform(Subject $subject): array
    {
        $data = [
            'id' => $subject->id,
            'name_th' => $subject->name_th,
            'name_en' => $subject->name_en,
            'code' => $subject->code,
            'view' => $subject->view,
            'unit' => $subject->unit,
            'description' => $subject->description,
            'professors' => fractal($subject->professors, new ProfessorTransformer())->toArray()['data'],
            'published_at' => $subject->published_at ? Carbon::parse($subject->published_at)->thaidate('j M Y'):null
            // 'display_start_date' => Carbon::parse($announcement->start_date)->thaidate('j M Y'),
            // 'display_end_date' => Carbon::parse($announcement->end_date)->thaidate('j M Y'),

        ];
        return $data;
    }

    public function includeDocuments(Announcement $announcement)
    {
        $documents = $announcement->getMedia(Announcement::MEDIA_COLLECTION_DOCUMENTS);
        return $this->collection($documents, new AnnouncementDocumentTransformer());
    }
}
