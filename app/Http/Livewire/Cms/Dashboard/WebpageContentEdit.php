<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\WebpageContent;

class WebpageContentEdit extends Component
{
    use WithFileUploads;

    public $webpageContent;

    public $title;
    public $body;
    public $image;

    public function mount()
    {
        $this->title = $this->webpageContent->title;
        $this->body = $this->webpageContent->body;
    }

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-content-edit');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'nullable',
            'body' => 'required',
            'image' => 'nullable|image'
        ]);

        /* dd ($validatedData['body']); */

        if ($this->image) {
            $image_path = $this->image->store('webpage-content', 'public');
            $validatedData['image_path'] = $image_path;
        }

        $this->webpageContent->update($validatedData);

        $this->emit('webpageContentUpdated');
    }

    public function updatedValue($value)
    {
      /* dd ($value); */
    }
}
