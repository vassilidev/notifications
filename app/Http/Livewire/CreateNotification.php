<?php

namespace App\Http\Livewire;

use App\Notifications\TestNotification;
use Auth;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateNotification extends Component
{
    public $icon;

    public $message;

    /**
     * @var array|string[]
     */
    public array $iconList = [
        'error',
        'success',
        'info',
        'warning',
        'question',
    ];

    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'icon'    => [
                'required',
                'in:' . implode(',', $this->iconList)
            ],
            'message' => [
                'required',
                'string',
            ],
        ];
    }

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->icon = 'success';
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.create-notification');
    }

    /**
     * @return void
     */
    public function createNotification(): void
    {
        $this->validate();

        Auth::user()->notifyNow(new TestNotification($this->icon, $this->message));

        $this->reset();
    }
}

