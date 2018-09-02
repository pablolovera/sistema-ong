<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/06/18
 * Time: 21:08
 */

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class SexoViewComposer
{
    public function __construct()
    {
        //
    }

    public function compose(View $view)
    {
        $status = [
            ['id' => 'macho', 'nome' => 'Macho'],
            ['id' => 'femea', 'nome' => 'Femea'],
        ];
        $view->with('sexo', $status);
    }
}