<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('new_contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|max:255|unique:contacts',
            'phone' => 'required|numeric|digits_between:9,12',
        ]);
        
        $contact = Contact::create([
            'name' => $request->name,
            'user_id' => Auth::id()
        ]);

        Phone::create([
            'phone' => $request->phone,
            'contact_id' => $contact->id
        ]);
        
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacts = Contact::where('id', $id)->first();
        $phone = Phone::where('contact_id', $id)->get();
        return view('contact', compact(['contacts', 'phone']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        $this->validate($request, [
           'name' => 'required|max:255|unique:contacts'
        ]);
        Contact::where('id', $id)
              ->update([
                  'name' => $request->name
              ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('dashboard.index');
    }
}
