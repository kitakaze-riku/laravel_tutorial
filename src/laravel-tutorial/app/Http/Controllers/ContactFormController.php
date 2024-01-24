<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * show the from for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }
}
