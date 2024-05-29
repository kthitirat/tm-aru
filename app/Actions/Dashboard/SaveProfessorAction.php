<?php

namespace App\Actions\Dashboard;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\Professor;
use DOMDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class SaveProfessorAction
{
    protected Professor $professor;

    public function execute(Professor $professor, array $data)
    {

        $this->professor = $professor;
        $this->professor->prefix = $data['prefix'];
        $this->professor->first_name = $data['first_name'];
        $this->professor->last_name = $data['last_name'];
        $this->professor->major = $data['major'];
        $this->professor->department_id = $data['department_id'];
        $this->professor->save();

        $this->uploadImage($data['image']);

        // $this->professor = $this->professor->fresh();
        // $this->deleteDocuments(isset($data['to_delete_documents']) ? $data['to_delete_documents'] : []);
        // $this->handleAssignProfessors($data['professors']);
        // $this->uploadprofessorImage($data['image']);
        // $this->uploadprofessorDocuments($data['documents']);

        return $this->professor;

    }


    private function uploadImage($image): void
    {
        if ($image == null) {
            return;
        }
        $this->professor->addMedia($image)->toMediaCollection(Professor::MEDIA_COLLECTION_IMAGE);
    }


}
