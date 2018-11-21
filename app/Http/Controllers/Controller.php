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

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(FormBuilder $formBuilder) {
    	$form = $formBuilder->create(CreatePost::class, [
		    'method' => 'POST',
		    'url' => route('storePost')
		]);
		$posts = Post::all();

    	return view('welcome', compact('form', 'posts'));
    }

    public function storePost(FormBuilder $formBuilder) {
        $form = $formBuilder->create(CreatePost::class);

		if (!$form->isValid()) {
		    return redirect()->back()->withErrors($form->getErrors())->withInput();
		}
		$form->redirectIfNotValid();

        Post::create($form->getFieldValues());

        index();
    }

}

class CreatePost extends Form
{
    public function buildForm()
    {
        $this
            ->add('description', 'textarea', [
                'rules' => 'max:255'
            ])
            ->add('filepath', 'text', [
                'rules' => 'max:255|required'
            ])
            ->add('submit', 'submit', ['label' => 'Save form']);
    }
}
