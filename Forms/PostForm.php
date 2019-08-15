<?php

namespace Modules\Blog\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class PostForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', Field::TEXT, [
                'label' => trans('blog::post.fields.title.label')
            ])
            ->add('body', Field::TEXTAREA, [
                'label' => trans('blog::post.fields.body.label')
            ])
            ->add('submit', Field::BUTTON_SUBMIT);
    }
}