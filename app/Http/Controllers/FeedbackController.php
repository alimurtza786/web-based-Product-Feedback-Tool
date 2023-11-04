<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Comment;
class FeedbackController extends Controller
{
    public function index(){
        return view('user.feedback');
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'description' => 'required|string',
        'category' => 'required|string',
        'status' => 'string',
    ]);

    if ($validator->fails()) {
        return redirect()
            ->route('feedback.create')
            ->withErrors($validator)
            ->withInput();
    }

    Feedback::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'category' => $request->input('category'),
        'status' => $request->input('status'),
    ]);

    return redirect()
        ->route('feedback')
        ->with('success', 'Feedback submitted successfully!');
}

public function list()
{
    $feedbacks = Feedback::paginate(10);
    return view('user.feedback-list', ['feedbacks' => $feedbacks]);
}
public function commentshow(Request $request, Feedback $feedback)
{
    $request->validate([
        'content' => 'required|string',
    ]);

    $comment = new Comment();
    $comment->user_id = auth()->id(); // Assuming you have authentication set up.
    $comment->content = $request->input('content');
    $feedback->comments()->save($comment);

    return redirect()->route('feedback.show', ['feedback' => $feedback->id])->with('success', 'Comment added.');
}


public function show(Feedback $feedback)
{
    $comments = $feedback->comments ?? [];

    return view('user.feedback-show', compact('feedback', 'comments'));
}





}
