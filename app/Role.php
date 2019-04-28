<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $fillable = ["name"];

    protected $dates = [];

    public static $rules = [
        "name" => "required",
    ];

    /**
     * Function will define the relationship of roles with users
     * @return mix
     */
    public function users() {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
