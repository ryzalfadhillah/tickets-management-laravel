<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $data = $request->id === null ? $this->userRepository->GetUser() : $this->userRepository->GetUser($request->id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            $data = $this->userRepository->storeOrUpdate($request);
            return response()->json([
                'status' => true,
                'message' => 'User berhasil ditambahkan.',
                'data' => $data
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => true,
                'message' => $ex->getMessage(),
            ], 200);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $this->userRepository->storeOrUpdate($request, 'PUT');
            return response()->json([
                'status' => true,
                'message' => 'Updated successfully.',
                'data' => $data
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => true,
                'message' => $ex->getMessage(),
            ], 200);
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->userRepository->destroy($id);
            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully.'
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => true,
                'message' => $ex->getMessage(),
            ], 200);
        }
    }
}
