<?php

namespace App\Http\Controllers;

use App\Models\Medical_Record;
use Illuminate\Http\Request;

class Medical_RecordController extends Controller
{
    public function index()
    {
        $medical_records = Medical_Record::all();
        return response()->json($medical_records);
    }

    public function show($id)
    {
        $medical_record = Medical_Record::findOrFail($id);
        return response()->json($medical_record);
    }

    public function store(Request $request)
    {
        Medical_Record::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'visit_date' => $request->visit_date,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'notes' => $request->notes,
            
        ]);

        return response()->json(['message' => 'Medical_Record added successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $medical_record = Medical_Record::findOrFail($id);
        $medical_record->first_name = $request->input('first_name');
        $medical_record->last_name = $request->input('last_name');
        $medical_record->specialization = $request->input('specialization');
        $medical_record->license_number = $request->input('specialization');
        $medical_record->phone = $request->input('phone');
        $medical_record->email = $request->input('email');
        $medical_record->save();

        return response()->json(['message' => 'Medical_Record updated successfully', 'Medical_Record' => $medical_record]);
    }

    public function destroy($id)
    {
        $medical_record = Medical_Record::findOrFail($id);
        $medical_record->delete();
        return response()->json(['message' => 'Medical_Record removed successfully']);
    }

}
