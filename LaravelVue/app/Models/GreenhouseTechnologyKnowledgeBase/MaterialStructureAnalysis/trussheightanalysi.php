<?php

namespace App\Models\GreenhouseTechnologyKnowledgeBase\MaterialStructureAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trussheightanalysi extends Model
{
    use HasFactory;
    protected $fillable = ['TrussType','Icon','TrussDiagram','TrussHeight','DeformationAnalysis','MaxStressAnalysis','MaxLoadAnalysis','DeformationAnalysisDiagram','MaxStressAnalysisDiagram','MaxLoadAnalysisDiagram'];

}
