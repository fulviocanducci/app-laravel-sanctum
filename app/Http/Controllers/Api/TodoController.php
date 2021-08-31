<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct(public Todo $model)
    {        
    }

    public function index()
    {
        return TodoResource::collection($this->model->get());
    }

    public function show($id)
    {
        return new TodoResource($this->model->find($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required|min:3',
            'active' => 'required'
        ]);

        $model = $this->model->create($data);

        return new TodoResource($model);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'id' => 'required',
            'description' => 'required|min:3',
            'active' => 'required'
        ]);

        $model = $this->model->find($id);

        if ($model) {
            $model->fill($data);
            $model->save();
            return new TodoResource($model);
        }

        return ['error' => 'true'];
    }

    public function delete($id) 
    {
        $model = $this->model->find($id);

        if ($model) {
            $model->delete();
            return ['status' => 'Removed'];
        }

        return ['error' => 'not found'];
    }
}
