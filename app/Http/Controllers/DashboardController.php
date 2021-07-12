<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $contacts = Contact::with('contact')
                ->orderBy('id', 'DESC')
                ->paginate(5);
        $user = auth()->user();
        $favorites = $user->following;
        
        return view('dashboard', compact('contacts', 'favorites'));
    }
}
