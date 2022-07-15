<?php 
namespace Src\Auth\Infraestructure;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
* @OA\Info(title="API Usuarios", version="1.0")
*
* @OA\Server(url="https://192.168.5.108/enlazaa-backend/public/")
*/

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }
/**
     * Login de usuario
     * 
     * @OA\Post(
     *     path="/api/v1/loginapi",
     *     tags={"responses"},
     *     operationId="obtenerPruebasPorAplicar",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="email",
     *                     description="Updated name of the pet",
     *                     type="string"
     *
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Updated status of the pet",
     *                     type="string"
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error en login"
     *     ),
     *      @OA\Response(
     *         response=200,
     *         description="Acceso exitoso"
     *     ),
     *   
     * )
     */
    public function login(Request $request){    	
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        // exit();
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Correo o contraseña incorrecto',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }
    public function pruebaruta(){
    	return response()->json([
                'status' => 'hla',
                'message' => 'hey',
            ], 401);
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}