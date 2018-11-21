<?php
// in src/Form/LookUpFundForm.php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class LookUpFundForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('index', 'string');
    }

    protected function _buildValidator(Validator $validator)
    {
        $validator->add('index', 'length', [
                'rule' => ['minLength', 3],
                'message' => 'minimum length for a fund is 3 characters.'
            ]);

        return $validator;
    }

    protected function _execute(array $data)
    {
        // Send an email.
        return true;
    }
}

?>