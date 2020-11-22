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
    public $faqId;
//    public array $question = [''];
//    public array $answer = [''];
//    public $editQuestion;
//    public $editAnswer;
    public array $inputs = [];

//    protected $listeners = [
//        'refreshTableView' => '$refresh'
//    ];

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
//        $this->question[] = '';
//        $this->answer[] = '';
//        dd($this->inputs);
    }

    public function decrementInput($index)
    {
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
//        dd($this->inputs);
    }

//    private function resetInput(){
//        $this->question = [''];
//        $this->answer = [''];
//    }

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
//
//    /**
//     * This will Store faqs to database and fire the $refresh event.
//     */
    public function store()
    {
//        dd($this->inputs);
        $this->validate();
//        foreach ($this->inputs as $key => $input){
//            Faq::query()->create([
//                'question' => $this->question[$key],
//                'answer' => $this->answer[$key],
//            ]);
//        }
        foreach ($this->inputs as $input){
//            dd(Faq::query()->create($input));
            Faq::query()->create($input);
        }

        $this->inputs = [0];
        $this->dispatchBrowserEvent('add-faq', [
            'title' => 'FAQ Saved',
            'timer'=> 3000,
            'icon'=> 'success',
            'toast'=> true,
            'position'=> 'top-right',
            'showConfirmButton' => false,
            'timerProgressBar' => true,
        ]);
//        $this->emit('refreshTableView');
//        $this->resetInput();
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $editFaq = Faq::query()->findOrFail($id);
//        dd($editFaq);
        $this->faqId = $id;
        $this->inputs = [];
//        $this->inputs[$this->faqId] = [$editFaq->jsonSerialize()];
//        dd($this->faqId);
        $this->inputs[] = [
//            'id' => $this->faqId, -> change
            'question' => $editFaq->question,
            'answer' => $editFaq->answer
        ];
//        dd($this->inputs);

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
        $this->validate();
//        dd($this->inputs);
        $faqs = Faq::query()->findOrFail($this->faqId);
//        dd($faqs);
//        $faqs->query()->update([
//            'question' => $faqs->question,
//            'answer' => $faqs->answer,
////            dd($this->inputs),
//        ]);

        foreach ($this->inputs as $input){
//            dd(Faq::query()->create($input));
            if (!empty($input['id'])) {
                Faq::query()->findOrFail($input['id'])->update($input);
            }
        }

        $this->updateMode = false;

        $this->dispatchBrowserEvent('edit-faq', [
            'title' => 'FAQ Updated',
            'timer'=> 3000,
            'icon'=> 'success',
            'toast'=> true,
            'position'=> 'top-right',
            'showConfirmButton' => false,
            'timerProgressBar' => true,
        ]);

        $this->inputs = [''];
        $this->resetErrorBag();
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        /**
         * View Faqs in table
         */
        $faqs = Faq::query()
            ->orderBy('id', 'desc')
            ->paginate($this->recordPerPage);

        /**
         * Rendering Faq Blade
         */
        return view('livewire.faq.faq-component', compact('faqs'));
    }
}
