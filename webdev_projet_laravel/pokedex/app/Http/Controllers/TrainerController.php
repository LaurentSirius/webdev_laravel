<?php

namespace App\Http\Controllers;

use App\Repositories\TrainerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index(): JsonResponse {
        try {
            $result = app(TrainerRepository::class)->index();
            return response()->json($result);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($id): JsonResponse {
        try {
            $result = app(TrainerRepository::class)->show($id);
            return response()->json($result);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function create(Request $request): JsonResponse {
        try {
            $result = app(TrainerRepository::class)->create($request->all());
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id): JsonResponse {
        try {
            $result = app(TrainerRepository::class)->update($id, $request->all());
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function delete($id): JsonResponse {
        try {
            app(TrainerRepository::class)->delete($id);
            return response()->json(['message' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
