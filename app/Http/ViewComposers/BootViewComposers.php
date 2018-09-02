<?php
namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\View;

trait BootViewComposers
{
    public function bootViewComposers()
    {
        View::composer([
            'cadastros.raca',
            'cadastros.especie',
            'cadastros.animal',
            'cadastros.pessoa',
            'cadastros.lar-temporario',
            'relatorios.animal',
        ], StatusViewComposer::class);

        View::composer([
            'cadastros.animal',
            'relatorios.animal',
        ], SexoViewComposer::class);

        View::composer([
            'cadastros.raca',
            'cadastros.raca-modal',
        ], EspeciesViewComposer::class);
    }
}