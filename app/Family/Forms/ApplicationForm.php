<?php


namespace Family\Forms;

use Laracasts\Validation\FormValidator;
class ApplicationForm  extends FormValidator{

    protected $rules = [
        'name'              =>      'required',
        'lastName'          =>      'required',
        'email'             =>      'required|email',
        'username'              =>  'required',
        'server'            =>      'required',
        'talents'           =>      'required',
        'armory'            =>      'required',
        'played'            =>      'required',
        'playClass'         =>      'required',
        'bio'               =>      'required',
        'raidExperience'    =>      'required',
        'reasonToApplyFl'   =>      'required',
        'oldGuild'          =>      'required',
        'progressRaid'      =>      'required',
        'attendance'        =>      'required',
        'klass'             =>      'required'

    ];
}