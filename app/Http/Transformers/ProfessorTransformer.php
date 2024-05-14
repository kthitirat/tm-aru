<?php

namespace App\Http\Transformers;


use App\Models\Professor;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use Phattarachai\ThaiDate\ThaiDate;

class ProfessorTransformer extends TransformerAbstract
{
    protected array $availableIncludes = ['image'];

    public function transform(Professor $professor): array
    {
        $data = [
            'id' => $professor->id,
            'department' => fractal($professor->department, new DepartmentTransformer())->toArray(),
            'prefix' => $professor->prefix,
            'first_name' => $professor->first_name,
            'last_name' => $professor->last_name,
            'major' => $professor->major,



            //'published_at' => $subject->published_at ? Carbon::parse($subject->published_at)->thaidate('j M Y'):null
            // 'display_start_date' => Carbon::parse($announcement->start_date)->thaidate('j M Y'),
            // 'display_end_date' => Carbon::parse($announcement->end_date)->thaidate('j M Y'),

        ];
        return $data;
    }

    public function includeImage(professor $professor)
    {
        $images = $professor->getMedia(Professor::MEDIA_COLLECTION_IMAGE);
        return $this->collection($images, new ImageTransformer());
    }

}
