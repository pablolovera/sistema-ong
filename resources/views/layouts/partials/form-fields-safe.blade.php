{!! Route::is('*.show') ? method_field('put') : '' !!}
{!! Route::is('*.edit') ? method_field('put') : '' !!}
{!! csrf_field() !!}