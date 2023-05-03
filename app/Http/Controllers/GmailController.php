<?php

namespace App\Http\Controllers;

use App\Models\Correo;
use Illuminate\Http\Request;

use Google\Client;
use Google\Service\Gmail;

class GmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

       // dd($request->input('apellido'));
  // Obtener los datos del formulario
  $nombre = $request->input('nombre');
  $apellido = $request->input('apellido');
  $correo = $request->input('correo');

  // Configurar el cliente de Google API
  $client = new Client();
  $client->setApplicationName('Crear cuenta de correo');
  $client->setScopes(Gmail::MAIL_GOOGLE_COM);
  $client->setAuthConfig('../client_secret.json');
  $client->setAccessType('offline');
  $client->setPrompt('select_account consent');



  // Crear la cuenta de correo electrónico
  $gmailService = new Gmail($client);
/*   dd($client); */
  $user = 'me';
  $password = $this->generatePassword();
  $message = "Bienvenido a nuestra plataforma. Tu nueva cuenta de correo es: $correo y tu contraseña es: $password";
  $rawMessage = base64_encode("To: $correo\r\nSubject: Bienvenido a nuestra plataforma\r\n\r\n$message");
  $message = new \Google_Service_Gmail_Message();
  $message->setRaw($rawMessage);
  try {
      $gmailService->users_messages->send($user, $message);
      return view('correo.cuenta_creada', ['correo' => $correo, 'password' => $password]);
  } catch (Exception $e) {
      return view('correo.error', ['error' => $e->getMessage()]);
  }
    }



    private function generatePassword()
    {
        // Generar una contraseña aleatoria
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $password = '';
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $index = rand(0, $alphaLength);
            $password .= $alphabet[$index];
        }
        return $password;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Correo $correo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Correo $correo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Correo $correo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Correo $correo)
    {
        //
    }
}
