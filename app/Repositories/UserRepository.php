<?php
/**
 * UserRepository class implments the Repository pattern 
 */
namespace App\Repositories;
use App\Repositories\UserRepositoryInterface;
use App\User;
use App\Role;

class UserRepository implements UserRepositoryInterface {
    
    /**
     * Lists all the users
     * @return User
     */
    public function index() {
        return User::with('roles')->get();
    }
    
    /**
     * Function will return the user object
     * @param integrer $id
     * @return User
     */
    public function show($id) {
        return User::where('id', '=', $id)
            ->with('roles')
            ->first();
    }
    
    /**
     * Function will save the newly created user in database
     * @param mix $param
     * @return User
     */
    public function create($param) {
        $user = new User();
        $user->name = $param->name;
        $user->email = $param->email;
        $user->Address = $param->address;
        $user->save();
        
        if (!empty($param->roles)) {
            $roles = Role::whereIn('name',$param->roles)->get();
            $user->roles()->attach($roles);
        }
        return $user;
    }
    
    /**
     * Function will update the user record and roles in database
     * @param mix $param
     * @param integer $id
     * @return User
     */
    public function update($param, $id) {
        $user = User::findOrFail($id);
        $user->update($param->all());
        
        if (!empty($param->roles)) {
            $roles = Role::whereIn('name',$param->roles)->get();
            $user->roles()->sync($roles);
        }
        return $user;
    }
    
    /**
     * Function will delete user and related roles from database
     * @param integer $id
     * @return boolean
     */
    public function destroy($id) {
        $user = User::findOrFail($id);
        if ($user::destroy($id)) {
            $user->roles()->detach();
            return true;
        } else {
            return false;
        }
    }
}
