<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;
class PagesController extends Controller {
  public function getIndex() {
      $post = Post::orderBy('created_at','desc')->get();
      return view('welcome')->withPost($post);
  }
  public function getAbout() {
      $first = "ABHISHEK";
      $Last = "GUPTA";
      $full = $first . " ". $Last;
      $email = 'guptaabhi9650@gmail.com';
      $data = [];
      $data['email'] = $email;
      $data['fullname'] = $full;
      //return view('/about')->withFullname($full)->withEmail($email);
      return view('/about')->withData($data);
  }
  public function getContact() {
      return view('/contact');
  }
  public function postContact(Request $request) {
     $this->validate($request,[
     'email' => 'required|email',
     'subject'=> 'min:3',
     'message'=> 'min:10']);
     $data = array(
       'email' => $request->email,
       'subject' => $request->subject,
       'bodyMessage' => $request->message // we can't use message here because message is a reserved keyword in laravel
     );
    Mail::send('emails.contact',$data, function($message) use ($data) {
     $message->from($data['email']);
     $message->to('guptaabhi9650@gmail.com');
     $message->subject($data['subject']);
    });
    Session::flash('success','Your Email was sent');
    return redirect('/');
  }
}
