<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;

use App\ExpenseCategory;

class ExpenseCategoryCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.expense.expense-category-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        ExpenseCategory::create($validatedData);

        $this->emit('expenseCategoryCreated');
        $this->emit('exitCategoryCreateMode');
    }
}
