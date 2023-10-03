<?php
namespace App\Helpers;

use App\Models\Qualification;

class QualificationHelper
{
    public static function getQualicationByTitle($qualificationTitle)
    {
        $qualification = Qualification::where('title',$qualificationTitle)->first();
        return $qualification ? $qualification->id : null;
    }

    public static function getQualificationById($qualification_id)
    {
        $qualificationFetchTitle = Qualification::where('id', $qualification_id)->first();
        return $qualificationFetchTitle ? $qualificationFetchTitle->title : null;
    }
}