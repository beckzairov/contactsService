<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Contact;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $contacts = Contact::where('id', $id)->first();

        $this->validate($request, [
            'phone' => 'required|numeric|digits_between:9,12'
        ]);
        Phone::create([
            'phone' => $request->phone,
            'contact_id' => $contacts->id
        ]);

        return redirect()->back();
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
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|numeric|digits_between:9,12'
        ]);
        Phone::where('id', $id)
              ->update([
                  'phone' => $request->name
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
        Phone::find($id)->delete();
        return redirect()->back();
    }
}
