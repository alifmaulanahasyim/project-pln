<?php
namespace App\Http\Controllers;

use App\Models\VisionMission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    public function index()
    {
        $visionMission = VisionMission::first();
        return view('about', compact('visionMission'));
    }

    public function edit()
    {
        $visionMission = VisionMission::first();
        return view('admin.edit_vision_mission', compact('visionMission'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'vision' => 'required|string',
            'mission' => 'required|string',
        ]);

        // Try to get the first record
        $visionMission = VisionMission::first();

        if ($visionMission) {
            // Update if exists
            $visionMission->update($request->only('vision', 'mission'));
        } else {
            // Create new if not exists
            VisionMission::create($request->only('vision', 'mission'));
        }

        return redirect()->route('admin.vision_mission.edit')->with('success', 'Data saved successfully.');
    }
}
