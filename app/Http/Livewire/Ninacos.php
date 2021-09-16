<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ninaco;

class Ninacos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $persona_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.ninacos.view', [
            'ninacos' => Ninaco::latest()
						->orWhere('persona_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->persona_id = null;
    }

    public function store()
    {
        $this->validate([
		'persona_id' => 'required',
        ]);

        Ninaco::create([ 
			'persona_id' => $this-> persona_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Ninaco Successfully created.');
    }

    public function edit($id)
    {
        $record = Ninaco::findOrFail($id);

        $this->selected_id = $id; 
		$this->persona_id = $record-> persona_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'persona_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Ninaco::find($this->selected_id);
            $record->update([ 
			'persona_id' => $this-> persona_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Ninaco Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Ninaco::where('id', $id);
            $record->delete();
        }
    }
}
