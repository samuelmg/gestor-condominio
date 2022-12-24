<?php

namespace App\Listeners;

use App\Models\Persona;
use App\Models\Scopes\CondominioScope;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCondominioViviendaToNewUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $persona = Persona::withoutGlobalScope(CondominioScope::class)->where('tel_celular', $event->user->cel_number)->first();
        $event->user->condominios()->attach($persona->condominio_id);
        // $event->user->viviendas()->attach($persona->viviendas->pluck('id')->toArray());
    }
}
