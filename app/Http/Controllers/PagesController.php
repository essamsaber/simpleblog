<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;
class PagesController extends Controller
{
   public function index()
   {
   	$posts = Post::orderBy('created_at', 'desc')->paginate(10);
   	return view('pages.welcome', compact('posts'));
   }

   public function single($slug)
   {
   	$post = Post::where('slug', $slug)->firstOrFail();
      return view ('pages.single', compact('post'));
   }

   public function getAbout()
   {
   		return view('pages.about');
   }

   public function getContact()
   {
         return view('pages.contact');
   }

   public function postContact(Request $request)
   {
   		$this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|min:5|max:200',
            'message' => 'required|min:5'
         ]);

         $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
         ];

         Mail::send('emails.message', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('esso.free@gmail.com');
            $message->subject($data['subject']);
         });

         Session::flash('msg', 'Your message has been sent successfully');
         return redirect('/');
   }

}
