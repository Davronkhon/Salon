<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('user')->get();
        return view('service.index', compact('services'));
    }
    public function create()
    {
        $users = User::all();
        return view('service.create', compact('users'));
    }
    public function store(Request $request)
    {
        $services = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'duration' => 'required',
        ]);

        Service::create($services);
        return redirect()->route('service.index')->with('success', 'Service pasts');
    }
    public function show($id)
    {
        $services = Service::with('user')->findOrFail($id);
        return view('service.show', compact('services'));
    }
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $users = User::all();
        return view('service.edit', compact('service', 'users'));
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $validated = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'duration' => 'required',
        ]);
        $service = Service::findOrFail($id);
        $service->update($validated);
        return redirect()->route('service.index')->with('message', 'Service updated');
    }
    public function destroy($id)
    {
        DB::transaction(function () use ($id){
            $services = Service::findOrFail($id);
            $services->delete();
        });
        return redirect()->route('service.index')->with('message', 'Service deleted');
    }
}
