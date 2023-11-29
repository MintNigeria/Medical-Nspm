<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        return view(
            'grouping.index',
            with([
                'archives' => Group::onlyTrashed(),
                'groups' => Group::latest()
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }

    public function create()
    {
        return view(
            'grouping.create',
        );
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
        ]);

        Group::create($formFields);

        return redirect('/grouping')->with(
            'message',
            'New Grouping Type Created !'
        );
    }

    public function update(Request $request, Group $grouping)
    {
        $formFields = $request->validate([
            'name' => 'required',
        ]);



        $grouping->update($formFields);

        return redirect('/grouping')->with(
            'message',
            'Group Name Updated successfully!'
        );
    }
}
