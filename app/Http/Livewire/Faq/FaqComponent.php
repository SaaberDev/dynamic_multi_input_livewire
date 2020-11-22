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
//    public $faqId;
//    public array $question = [''];
//    public array $answer = [''];
//    public $editQuestion;
//    public $editAnswer;
    public array $inputs = [0];

//    protected $listeners = [
//        'refreshTableView' => '$refresh'
//    ];

    public function incrementInput()
    {
        $this->inputs[] = [];
//        $this->question[] = '';
//        $this->answer[] = '';
    }

    public function decrementInput($index)
    {
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
    }

//    private function resetInput(){
//        $this->question = [''];
//        $this->answer = [''];
//    }

//    protected $rules = [
//        'question.*' => 'required|min:8',
//        'answer.*' => 'required|min:8',
//    ];
//
//    protected $messages = [
//        'question.*.required' => 'The question field is required.',
//        'answer.*.required' => 'The answer field is required',
//        'question.*.min' => 'The question field need to be at least 8 Character.',
//        'answer.*.min' => 'The answer field need to be at least 8 Character',
//    ];
//
//    public function updated()
//    {
//        $this->validate();
//    }
//
//    /**
//     * This will Store faqs to database and fire the $refresh event.
//     */
//    public function store()
//    {
//        $this->validate();
//        foreach ($this->input as $key => $inputs){
//            Faq::query()->create([
//                'question' => $this->question[$key],
//                'answer' => $this->answer[$key],
//            ]);
//        }
//
//        $this->input = [0];
//        $this->dispatchBrowserEvent('swal', [
//            'title' => 'FAQ Saved',
//            'timer'=> 3000,
//            'icon'=> 'success',
//            'toast'=> true,
//            'position'=> 'top-right',
//            'showConfirmButton' => false,
//            'timerProgressBar' => true,
//        ]);
////        $this->emit('refreshTableView');
//        $this->resetInput();
//    }
//
//    /**
//     * @param $id
//     */
//    public function edit($id)
//    {
//        $editFaq = Faq::query()->findOrFail($id);
//        $this->faqId = $id;
//        $this->editQuestion = $editFaq->question;
//        $this->editAnswer = $editFaq->answer;
//
//        $this->updateMode = true;
//    }
//
//    public function cancel()
//    {
//        $this->updateMode = false;
//        $this->resetErrorBag();
//    }
//
//    public function update()
//    {
////        $this->validate();
//        $faqs = Faq::query()->findOrFail($this->faqId);
//        $faqs->query()->update([
//            'question' => $this->editQuestion,
//            'answer' => $this->editAnswer,
//        ]);
//        $this->updateMode = false;
//
//        $this->dispatchBrowserEvent('swal', [
//            'title' => 'FAQ Updated',
//            'timer'=> 3000,
//            'icon'=> 'success',
//            'toast'=> true,
//            'position'=> 'top-right',
//            'showConfirmButton' => false,
//            'timerProgressBar' => true,
//        ]);
//
//        $this->input = [0];
//        $this->resetInput();
//        $this->resetErrorBag();
//    }
//
//    /**
//     * @return Application|Factory|View
//     */
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
