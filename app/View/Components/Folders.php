<?php

namespace App\View\Components;

use App\Models\Caution;
use App\Models\Comment;
use App\Models\Garantie;
use App\Models\Opinion;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Folders extends Component
{
    /**
     * Create a new component instance.
     */
    public $credit;
    public function __construct($credit)
    {
        $this->credit = $credit; 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $comments = Comment::all();
        $opinions = Opinion::all();
        $cautions = Caution::all();
        $garanties = Garantie::all();
        return view('components.folders', ['comments'=>$comments, 'opinions'=>$opinions, 'cautions'=>$cautions, 'garanties'=>$garanties]);
    }
}
