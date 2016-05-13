<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    protected $table = 'users';
    private $errors;

    private $rules = array(
//        'name' => 'min:3|unique_with:users',
//        'email' => 'min:3|unique_with:users',
        'name' => 'min:3',
        'email' => 'min:3',
        'password' => 'min:3',
        'url' => 'min:3',
        'team' => 'min:3',
        'location' => 'min:3'
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function get_profile($id)
    {
        return DB::table('users')
            ->select('name', 'email', 'url', 'team', 'location')
            ->where('id', $id)
            ->first();
    }

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
