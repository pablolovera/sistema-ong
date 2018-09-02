<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/06/18
 * Time: 21:08
 */

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class StatusViewComposer
{
    public function __construct()
    {
        //
    }

    public function compose(View $view)
    {
        $status = [
            ['id' => 0, 'nome' => 'Inativo'],
            ['id' => 1, 'nome' => 'Ativo'],
        ];
        $view->with('status', $status);
    }
}