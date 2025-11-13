<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        // Aquí procesas el formulario (guardar en BD, enviar correo, etc.)
        // ...

        return redirect()->route('contacto')
                        ->with('success', 'Mensaje enviado correctamente.');
    }
}
