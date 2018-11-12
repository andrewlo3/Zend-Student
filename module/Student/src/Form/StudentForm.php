<?php
namespace Student\Form;

use Zend\Form\Form;

class StudentForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('student');

        $this->add([
            'name' => 'id',
            'type' => 'text',
            'options' => [
                'label' => 'Id',
            ],
        ]);
        $this->add([
            'name' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'Name',
            ],
        ]);
        $this->add([
            'name' => 'gpa',
            'type' => 'text',
            'options' => [
                'label' => 'Gpa',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}