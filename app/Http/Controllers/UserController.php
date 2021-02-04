<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;
use MongoDB\Client;

class UserController extends Controller
{
    protected $db;
    protected $collection;
    public function __construct()
    {
        $db = env('MONGO_DB_DATABASE');
        $this->collection = (new Client())->$db->users;
    }

    public function index()
    {
        $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $limit = 10;
        $next  = ($page + 1);
        $prev  = ($page - 1);
        $users = $this->collection->find(
            [],
            [
            'skip'=> ($page - 1) * $limit,
            'limit'=> $limit,
            'sort' => ['created_at' => -1],
        ]);
        return view('user.index', compact('users','page','limit','next','prev'));
    }

    public function destroy($id)
    {
        $this->collection->deleteOne(['_id' => new ObjectId($id)]);
        return redirect('/user')->with('success','User has been  deleted');
    }

    public function show($id)
    {
        $user = $this->collection->findOne(['_id' => new ObjectId($id)]);
        return view('user.show',compact('user'));
    }
}
