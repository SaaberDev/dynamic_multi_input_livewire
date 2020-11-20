<?php

namespace App\Http\Livewire\MultiInput;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithPagination;

class TableView extends Component
{
//    use WithPagination;
//
//    public $test = '';
//    public int $recordPerPage = 10;
//    protected string $paginationTheme = 'bootstrap';
//
//    protected $listeners = [
//        'refreshTableView' => '$refresh'
//    ];
//
//    public function edit($id)
//    {
//        $editFaq = Faq::query()->where('id', $id)->firstOrFail();
//        $this->test = $editFaq;
////        $this->emit('editFaq', $editFaq);
//    }
//
//    public function render()
//    {
//        return view('livewire.faq.table-view',[
//            'faqs' => Faq::query()
//                ->orderBy('id', 'desc')
//                ->paginate($this->recordPerPage),
//        ]);
//    }
}
