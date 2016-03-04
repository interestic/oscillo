<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Page extends Model
{
    protected $table = 'pages';

    private $rules = array(
        'name' => 'required|min:3',
        'twitter' => 'min:3',
        'facebook' => 'min:3',
        'instagram' => 'min:3',
        'blog' => 'min:3',
    );

    private $errors;

    public function validate($data)
    {
        $v = Validator::make($data, $this->rules);

        if ($v->fails()) {
            // この部分注意
            $this->errors = $v->errors();
            return false;
        }

        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}
