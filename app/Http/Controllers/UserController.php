<?php
/*
 * UserController class will handle all the HTTP requests
 * @desc User Api end point CRUD operation
 */
namespace App\Http\Controllers;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    /**
     * Create a new instance of UserRepositoryInterface.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->user = $userRepositoryInterface;
    }
    
    /**
     * Function will return the list all the users
     * @return json
     */
    public function index() {
        return response()->json($this->user->index());        
    }
    
    /**
     * Function will show the record for a given user id
     * @param integer $id
     * @return json
     */
    public function show($id) {
         return response()->json($this->user->show($id));
    }
    
    /**
     * Funcion will save the user record in database
     * @param Request $request
     * @return json
     */
    public function create(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|unique:users',
            'address'=>'required|max:255'
        ]);
        return response()->json($this->user->create($request));
    }
    
    /**
     * Function will update the user record
     * @param Request $request
     * @param integer $id
     * @return json
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'email'=>'unique:users,email,'.$id,
        ]);
        return response()->json($this->user->update($request, $id));
    }
    
    /**
     * Function will destroy the user record
     * @param integer $id
     * @return json
     */
    public function destroy($id) {
        $response = $this->user->destroy($id);
        if ($response) {
            return response()->json('Deleted Successfully', 200);
        } else {
            return response()->json('Failed deletion', 401);
        }    
    }
}