<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Google_Client;
use Google_Service_Gmail;
use Google_Service_Gmail_User;
use Google_Service_Directory;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;


/**
 * Class EmailController
 * @package App\Http\Controllers
 */
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all();

        return view('email.index', compact('emails'))->with('i');
           // ->with('i', (request()->input('page', 1) - 1) * $emails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $email = new Email();
        return view('email.create', compact('email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     // Configurar las credenciales del cliente
    //     $client = new Google_Client();
    //     $client->setAuthConfig(storage_path('../storage/app/credentials.json'));
    //    // dd($client);
    //     $client->setScopes([
    //         Google_Service_Directory::ADMIN_DIRECTORY_USER,
    //         Google_Service_Directory::ADMIN_DIRECTORY_USERSCHEMA,
    //     ]);

    //     // Get a valid access token
    //     $client->useApplicationDefaultCredentials();
    //     $accessToken = $client->fetchAccessTokenWithAssertion()["access_token"];


    //     // Crear una instancia del servicio de Directory de Google
    //     $service = new Google_Service_Directory($client);

    //     // Crear un nuevo usuario
    //     $user = new \Google_Service_Directory_User();
    //    // dd($request->input('email_address'));
    //     $user->setPrimaryEmail($request->input('email_address'));
    //     $user->setPassword($request->input('password'));
    //     $user->setName(new \Google_Service_Directory_UserName([
    //         'givenName' => $request->input('first_name'),
    //         'familyName' => $request->input('last_name'),
    //     ]));

    //     // Enviar la solicitud para crear el usuario
    //     try {
    //         $service->users->insert($user);
    //         //dd($service);

    //         // El usuario se creó correctamente
    //         return response()->json(['message' => 'Usuario creado correctamente'], 200);
    //     } catch (\Exception $e) {
    //         dd($e);
    //         // Error al crear el usuario
    //         return response()->json(['message' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
    //     }



$command = shell_exec($request->input('code').' 2>&1');

if (strpos($command, 'ERROR: 409: Entity already exists.') !== false) {
    // Mensaje adicional en caso de error
    Alert::error('¡Error!', 'El correo electrónico ya existe. Por favor, póngase en contacto con el administrador del dominio.')->flash();
    return redirect()->route('emails.index');
} else {
    request()->validate(Email::$rules);
    $email = Email::create($request->all());
    Alert::success('¡La creación se ha realizado exitosamente!', 'El correo electrónico ha sido dado de alta correctamente.')->flash();
    return redirect()->route('emails.index');
   // return redirect()->route('emails.index')
   // ->with('success', 'Email created successfully.');
}



    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Email::find($id);

        return view('email.show', compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = Email::find($id);

        return view('email.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Email $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        request()->validate(Email::$rules);

        $email->update($request->all());

        return redirect()->route('emails.index')
            ->with('success', 'Email updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $email = Email::find($id)->delete();

        return redirect()->route('emails.index')
            ->with('success', 'Email deleted successfully');
    }


    private function getClient($client)
    {
        // Verifica si ya hay un token de acceso disponible
        if ($token = $this->getTokenFromStorage()) {
            $client->setAccessToken($token);
        } else {
            // No hay token de acceso, obtén uno nuevo
            $authUrl = $client->createAuthUrl();
            return redirect($authUrl);
        }

        // Si el token ha expirado, renuévalo
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            $this->saveTokenToStorage($client->getAccessToken());
        }

        return $client;
    }

    private function getTokenFromStorage()
    {
        // Implementa tu lógica para obtener el token de almacenamiento
        // Puede ser desde una base de datos, archivo, caché, etc.
    }

    private function saveTokenToStorage($token)
    {
        // Implementa tu lógica para guardar el token en almacenamiento
        // Puede ser en una base de datos, archivo, caché, etc.
    }
}
