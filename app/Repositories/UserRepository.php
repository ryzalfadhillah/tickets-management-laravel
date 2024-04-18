<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function GetUser($id = null)
    {
        if ($id == null) {
            return $response = UserResource::collection($this->user->all());
        }

        $user = $this->user->find($id);
        if ($user == null) {
            throw new \Exception("Data user tidak ditemukan.", 400);
        }

        $response = new UserResource($user);
        return $response;
    }

    public function storeOrUpdate($request, $method = null)
    {
        if ($method == 'PUT' && !$this->user->find($request->id)) {
            throw new \Exception("Data user tidak ditemukan.", 400);
        }

        $data = $this->user->updateOrCreate(
            ['id' => $request->id ?? null],
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );
        return $data;
    }

    public function destroy($id)
    {
        $car = $this->user->find($id);
        if (!$car) {
            throw new \Exception("Data user tidak ditemukan.", 400);
        }
        $car->delete();
    }
}
