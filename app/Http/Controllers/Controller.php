<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Kris\LaravelFormBuilder\FormBuilder;
use Log;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use FormBuilderTrait;

    public function index(FormBuilder $formBuilder) {
    	
        $formComment = $formBuilder->create(CreateComment::class, [
            'method' => 'POST',
            'url' => route('storeComment')
        ]);
		$posts = Post::orderBy('created_at', 'desc')->paginate(100);
        $comments = Comment::orderBy('created_at', 'created_at')->paginate(100);
        $users = User::orderBy('id');

    	return view('welcome', compact('users', 'formComment', 'posts', 'comments'));
    }

    public function postForm(FormBuilder $formBuilder) {
        $form = $formBuilder->create(CreatePost::class, [
            'method' => 'POST',
            'url' => route('storePost')
        ]);

        return view('postForm', compact('form'));
    }

    public function storePost(Request $request, FormBuilder $formBuilder) {
        $form = $formBuilder->create(CreatePost::class);

		if (!$form->isValid()) {
		    return redirect()->back()->withErrors($form->getErrors())->withInput();
		}
		$form->redirectIfNotValid();

		$values = $form->getFieldValues(); 
		$filepath = $request->file('upload_Image')->store('public/memes');
		$filepath = preg_replace('/^public\/memes\//', '', $filepath);
        Post::create(['description' => $values['description'], 'filepath' => $filepath]);

        return redirect()->route('infiniteScroll');
    }

    public function modifyPost(Request $request){
        $post = Post::find($request->id);
        $post->description = $request->description;
        if ($request->file('upload_Image') != ''){
            $filepath = $request->file('upload_Image')->store('public/memes');
            $post->filepath = preg_replace('/^public\/memes\//', '', $filepath);
        }
        $post->save();

        return redirect(url()->previous().'#'.$request->id);
    }

    public function storeComment(Request $request, FormBuilder $formBuilder) {
        
        $form = $formBuilder->create(CreateComment::class);

        if (!$form->isValid()) {
            return redirect(url()->previous().'#'.$values['post_id']);
        }
        $form->redirectIfNotValid();
        $values = $form->getFieldValues(); 
        Comment::create(['comment' => $values['comment'], 'post_id' => $values['post_id']]);
        return redirect(url()->previous().'#'.$values['post_id']);
    }

    public function home() {
    	return view('home');
    }

}

class CreatePost extends Form
{
    public function buildForm()
    {
        $this
            ->add('description', 'textarea', [
                'rules' => 'max:255',
                'attr' => ['style' => "height: 6em;"]
            ])
            ->add('upload_Image', 'file', [
                'rules' => 'required|max:2048|mimes:jpg,jpeg,png,gif',
                'attr' => ["class" => 'form-control-file']
            ])
            ->add('submit', 'submit', [
            	'label' => 'Post',
            	'attr' => ['class' => 'btn btn-secondary', 'style' => 'width: 5em;']
            ]);
    }
}

class CreateComment extends Form
{
    public function buildForm(){
        $this
            ->add('comment', 'textarea', [
                'rules' => 'required|max:255',
                'attr' => ['style' => 'height: 6em;',  "placeholder" => "Leave a comment!"],
                'label' => false
            ])
            ->add('post_id', 'hidden')
            ->add('submit', 'submit', [
                'label' => 'Post',
                'attr' => ['class' => 'btn btn-danger']
            ]);
    }
}