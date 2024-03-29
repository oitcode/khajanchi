<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\Webpage;

class PostComponent extends Component
{
    use ModesTrait;

    public $displayingPost = null;

    public $modes = [
        'createPostMode' => false,
        'listPostMode' => true,
        'displayPostMode' => false,
        'createPostCategoryMode' => false,
    ];

    protected $listeners = [
        'exitCreatePostMode',
        'webpageAdded',
        'displayPost',
        'createPostCategoryCompleted',
        'createPostCategoryCanceled',
    ];

    public function render()
    {
        return view('livewire.cms.dashboard.post-component');
    }

    public function webpageAdded()
    {
        session()->flash('message', 'Post created');
        $this->exitMode('createPostMode');
        $this->enterMode('listPostMode');
    }

    public function exitCreatePostMode()
    {
        $this->exitMode('createPostMode');
    }

    public function displayPost(Webpage $post)
    {
        $this->displayingPost = $post;
        $this->enterMode('displayPostMode');
    }

    public function createPostCategoryCanceled()
    {
        $this->exitMode('createPostCategoryMode');
    }

    public function createPostCategoryCompleted()
    {
        $this->exitMode('createPostCategoryMode');
        session()->flash('message', 'Post category created');
    }
}
