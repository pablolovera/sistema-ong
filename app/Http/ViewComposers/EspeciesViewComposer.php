<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/06/18
 * Time: 21:08
 */

namespace App\Http\ViewComposers;

use App\Models\Especie;
use Illuminate\Contracts\View\View;

class EspeciesViewComposer
{
    /**
     * @var Especie
     */
    private $especie;

    public function __construct(Especie $especie)
    {
        $this->especie = $especie;
    }

    public function compose(View $view)
    {
        $view->with('especies', $this->especie->all());
    }
}