<?php

namespace App\Http\Controllers;

use App\Repositories\TypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(): JsonResponse {
        try {
            $result = app(TypeRepository::class)->index();
            return response()->json($result);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($id): JsonResponse {
        try {
            $result = app(TypeRepository::class)->show($id);
            return response()->json($result);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function create(Request $request): JsonResponse {
        try {
            $result = app(TypeRepository::class)->create($request->all());
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id): JsonResponse {
        try {
            $result = app(TypeRepository::class)->update($id, $request->all());
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function delete($id): JsonResponse {
        try {
            app(TypeRepository::class)->delete($id);
            return response()->json(['message' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
