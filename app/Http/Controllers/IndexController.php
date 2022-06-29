<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        $recipes = Recipe::orderBy("created_at", "DESC")->limit(3)->get();
        
        return view('welcome', [
            "recipes" => $recipes
        ]);
    }

    public function showContactForm()
    {
        return view("contacts");
    }

    public function contactForm(ContactFormRequest $request)
    {
        Mail::to("julyyer@yandex.ru")->send(new ContactForm($request->validated()));

        return redirect(route("contacts"));
    }
}
