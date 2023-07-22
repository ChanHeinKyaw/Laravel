<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Mail\SubscriberMail;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog){
        request()->validate([
            'body' => 'required | min:10',
        ]);

        $blog->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);

        $subscribers = $blog->subscribers->filter(fn ($subscriber) => $subscriber->id != auth()->user()->id);

        $subscribers->each(function($subscriber) use ($blog){
            Mail::to($subscriber->email)->send(new SubscriberMail($blog));
        });

        return redirect('/blogs/' . $blog->slug);
    }
}
