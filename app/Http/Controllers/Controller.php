<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Kris\LaravelFormBuilder\FormBuilder;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

use App\Post;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(FormBuilder $formBuilder) {
    	$form = $formBuilder->create(CreatePost::class, [
		    'method' => 'POST',
		    'url' => route('storePost')
		]);
		$posts = Post::orderBy('created_at', 'desc')->paginate(8);

    	return view('welcome', compact('form', 'posts'));
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
                'attr' => ["class" => '.form-control-file']
            ])
            ->add('submit', 'submit', [
            	'label' => 'Post',
            	'attr' => ['class' => 'btn btn-secondary', 'style' => 'width: 5em;']
            ]);
    }
}
