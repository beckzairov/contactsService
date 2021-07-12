<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class FavoritesController extends Controller
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
        $contacts = Contact::with('contact')
                ->orderBy('id', 'DESC')
                ->paginate(5);
        $user = auth()->user();
        $favorites = $user->following;
        return view('favorites', compact('contacts','favorites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Contact $contact)
    {
        return auth()->user()->following()->toggle($contact);       
    }
}
