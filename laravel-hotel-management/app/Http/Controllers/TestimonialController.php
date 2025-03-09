<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function Alltestimonial(){
$testimonial =  Testimonial::latest()->get();
return view('backend.testimonial.all_testimonial', compact('testimonial'));
    }

 public function TestimonialAdd(){
    

    return view('backend.testimonial.add_testimonial');
 }
}