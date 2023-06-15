<?php

namespace app\models;

use app\db\DbModel;

class Survey extends DbModel
{

    public $id;
    public $patient_id;
    public $survey;
    public $answers;
    public $created_at;
    public $last_update;
    public $completed;

    public static function tableName(): string
    {
        return 'surveys';
    }

    public function attributes(): array
    {
        return [
            'patient_id', 'survey', 'answers', 'created_at', 'last_update', 'completed', 'id'
        ];
    }

    public function labels(): array
    {
        return [];
    }


    public function save()
    {
        if ($this->id) {
            $this->last_update = date("y-m-d", time());
            parent::update();
        } else {
            $this->created_at = date("y-m-d", time());
            parent::create();
        }
    }
}
