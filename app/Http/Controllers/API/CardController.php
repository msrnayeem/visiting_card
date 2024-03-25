<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Card;
use Illuminate\Http\Request;
use Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public function generate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 401);
        }

        $card = Card::create([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'identifier' => now()->format('YmdHis'),
        ]);

        $pdf = PDF::loadView('card', compact('card'));
        $pdf->setPaper([0, 0, 243.701, 153.01]);

        $pdfContent = $pdf->output();

        $filePath = 'pdf/' . $card->identifier . '.pdf';
        Storage::put($filePath, $pdfContent);

        return response()->file(storage_path('app/' . $filePath), [
            'Content-Disposition' => 'attachment; filename="' . $card->identifier . '.pdf"',
        ]);
    }

    public function searchByIdentifier(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identifier' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 401);
        }
        $card = Card::where('identifier', $request->identifier)->first();

        if (!$card) {
            return response()->json(['message' => 'Card not found'], 404);
        }

        $filePath = 'pdf/' . $card->identifier . '.pdf';

        if (!Storage::exists($filePath)) {
            return response()->json(['message' => 'Found card information, but pdf not found'], 404);
        }

        return response()->file(storage_path('app/' . $filePath), [
            'Content-Disposition' => 'attachment; filename="' . $card->identifier . '.pdf"',
        ]);

    }

    public function allCards()
    {
        $cards = Card::all();

        if ($cards->isEmpty()) {
            return response()->json(['message' => 'No cards found'], 404);
        }

        return response()->json(
            [
                'cards' => $cards
            ]
        );
    }

    public function delete(Request $request, $identifier)
    {
        $card = Card::where('identifier', $identifier)->first();

        if (!$card) {
            return response(['message' => 'Card not found'], 404);
        }

        $filePath = 'pdf/' . $card->identifier . '.pdf';
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        $card->delete();

        return response(['message' => 'Card deleted successfully'], 200);
    }
}
