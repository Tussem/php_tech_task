<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //Function for displaying the page and retrieving the data
    public function linking(){
        $feedbacks = new Feedback();
        return view('form', ['feedbacks' => $feedbacks->all()]);
    }

    //Functions for validation, sending data to database and return data from database
    public function form_check(Request $request) {
        $valid = $request->validate([
            'email' => 'required | min:4 | max:255',
            'name' => 'required | min:4 | max:255',
            'message' => 'required | min:15 | max:450', 
        ],[
            'name.required' => 'Please provide your name.',
            'email.required' => 'An email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'message.required' => 'A message is required.',
            'message.min' => 'Your message must be at least 15 characters long.',
            'message.max' => 'Your message cannot exceed 450 characters.'
        ]);

        $feedback = new Feedback();
        $feedback->name = $request->input(key:'name');
        $feedback->email = $request->input(key:'email');
        $feedback->message = $request->input(key:'message');

        $feedback->save();

        return redirect()->route(route:'feedback');
    }
}
