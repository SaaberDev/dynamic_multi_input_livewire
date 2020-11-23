<?php

namespace App\Http\Livewire\Faq;

use App\Models\Faq;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class FaqComponent extends Component
{
    use WithPagination;

    public bool $updateMode = false;
    public int $recordPerPage = 10;
    protected string $paginationTheme = 'bootstrap';
    public int $faqId;
    public array $inputs = [];

    public function mount($faqs = [])
    {
        $this->incrementInput();

        if (!empty($faqs)) {
            $this->inputs = $faqs;
        }
    }

    public function incrementInput()
    {
        $this->inputs[] = [];
    }

    public function decrementInput($index)
    {
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
    }

    protected $rules = [
        'inputs.*.question' => 'required|min:8',
        'inputs.*.answer' => 'required|min:8',
    ];

    protected $messages = [
        'inputs.*.question.required' => 'The question field is required.',
        'inputs.*.answer.required' => 'The answer field is required',
        'inputs.*.question.min' => 'The question field need to be at least 8 Character.',
        'inputs.*.answer.min' => 'The answer field need to be at least 8 Character',
    ];

    public function updated()
    {
        $this->validate();
    }

    /**
     * This will Store faqs to database.
     */
    public function store()
    {
        if ($this->validate()){
            foreach ($this->inputs as $input){
                if (Faq::query()->create($input)){
                    $this->emit('swal:alert', [
                        'type'    => 'success',
                        'icon' => 'success',
                        'title'   => 'FAQ Added',
                        'timeout' => 3000
                    ]);
                }
            }
        }

        $this->inputs = [0];
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $editFaq = Faq::query()->findOrFail($id);
        $this->faqId = $id;
        $this->inputs = [];
        $this->inputs[] = [
            'question' => $editFaq->question,
            'answer' => $editFaq->answer
        ];

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->inputs = [''];
        $this->resetErrorBag();
    }

    public function update()
    {
        $faqs = Faq::query()->findOrFail($this->faqId);
        if ($this->validate()){
            foreach ($this->inputs as $input){
                if ($faqs->update($input)){
                    $this->emit('swal:alert', [
                        'type'    => 'success',
                        'icon' => 'success',
                        'title'   => 'FAQ Updated',
                        'timeout' => 3000
                    ]);
                }
            }
        }

        $this->updateMode = false;

        $this->inputs = [''];
        $this->resetErrorBag();
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        // View Faqs in table
        $faqs = Faq::query()
            ->orderBy('id', 'desc')
            ->paginate($this->recordPerPage);

        // View Faqs in table
        return view('livewire.faq.faq-component', compact('faqs'));
    }
}
