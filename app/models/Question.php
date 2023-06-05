<?php

namespace app\models;

use app\db\DbModel;

class Question extends DbModel
{

    public $id;
    public $question;
    public $description;
    public $type;
    public $answer;
    public $legend;

    public static function tableName(): string
    {
        return 'questions';
    }


    public function attributes(): array
    {
        return ['question', 'description', 'type', 'answers', 'legend', 'id'];
    }


    public function labels(): array
    {
        return
            [
                'question' => 'Domanda',
                'description' => 'Descrizione',
                'type' => 'Tipo',
                'answers' => 'Domande',
                'legend' => 'Legenda'
            ];
    }


    public function get($search = '', $order = 'id', $type = 'asc')
    {

        return parent::get($search, $order, $type);
    }


    public function save()
    {

        $errors = [];

        if ($this->checkIfExists()) $errors['exists'] = '<em>Una Domanda con questno nome esiste già!!</em>';


        if (!$this->question) $errors['question'] = "Il nome del questionario obbligatorio";
        if (!$this->description) $errors['description'] = "La descrizione è obbligatoria";
        if (!$this->type) $errors['type'] = "Il tipo della domanda è obbligatorio";

        if (empty($errors)) {

            if ($this->id) parent::update();
            else parent::create();
        }

        return $errors;
    }


    public function delete($id)
    {
        parent::delete($id);
    }

    private function checkIfExists()
    {
        $questions = self::get();

        foreach ($questions as $question) {

            if ($this->question === $question['question'] && $this->id != $question['id']) return true;
        }

        return false;
    }
}
