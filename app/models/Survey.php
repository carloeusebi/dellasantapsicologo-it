<?php

namespace app\models;

use app\db\DbModel;

class Survey extends DbModel
{

    public $id;
    public $patient_id;
    public $title;
    public $survey;
    public $answers;
    public $created_at;
    public $last_update;
    public $completed;

    protected $checkboxes;
    protected $questions;

    public static function tableName(): string
    {
        return 'surveys';
    }

    public function attributes(): array
    {
        return [
            'patient_id', 'title', 'survey', 'answers', 'created_at', 'last_update', 'completed', 'id'
        ];
    }

    public function labels(): array
    {
        return [];
    }


    public function save()
    {
        $checkedQuestions = array_filter($this->questions, fn ($question) => in_array($question['id'], $this->checkboxes));

        $this->survey = json_encode($checkedQuestions);

        if ($this->id) {
            $this->last_update = date("y-m-d", time());
            parent::update();
        } else {
            $this->created_at = date("y-m-d", time());
            parent::create();
        }
    }
}
