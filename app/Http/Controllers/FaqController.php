<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqModel;
use Exception;

class FaqController extends Controller
{
    public function getAllFaqs()
    {
        try {
            $faqs = FaqModel::all();
            return response()->json(["success" => true, "data" => $faqs]);
        } catch (Exception $e) {
            error_log('SSS verileri çekme hatası: ' . $e->getMessage());
            return response()->json(["success" => false, "error" => "SSS verileri çekilemedi"], 500);
        }
    }
}
