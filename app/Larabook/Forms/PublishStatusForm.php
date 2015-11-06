<?php namespace Larabook\Forms;


use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator {

    /*
     * Validation rules for the publish status
     *
     * @var array
     */
    protected $rules = [
        'body' => 'required',
    ];

}