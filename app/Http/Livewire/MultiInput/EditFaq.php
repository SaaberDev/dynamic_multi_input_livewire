<?php

namespace App\Http\Livewire\MultiInput;

use App\Models\Faq;
use Livewire\Component;

class EditFaq extends Component
{
//    public $test;
//    public array $question = [''];
//    public array $answer = [''];
//    public array $input = [0];
//
////    protected $listeners = [
////        'editFaq' => 'update'
////    ];
//
////    public function ids()
////    {
////        $this->test =
////    }
//
//    public function incrementInput()
//    {
//        $this->input[] = count($this->input);
//        $this->question[] = '';
//        $this->answer[] = '';
//    }
//
//    public function decrementInput($inputs)
//    {
//        unset($this->input[$inputs], $this->question[$inputs], $this->answer[$inputs]);
//    }
//
//    private function resetInput(){
//        $this->question = [''];
//        $this->answer = [''];
//    }
//
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
//    public function update()
//    {
//        $this->validate();
//        foreach ($this->input as $key => $inputs){
//            Faq::query()->update([
//                'question' => $this->question[$key],
//                'answer' => $this->answer[$key],
//            ]);
//        }
//        $this->emit('refreshTableView');
//        $this->input = [0];
//        $this->resetInput();
//    }
//
//    public function render()
//    {
//        return view('livewire.faq.edit-faq');
//    }
}
