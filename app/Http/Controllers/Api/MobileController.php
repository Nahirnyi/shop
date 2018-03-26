<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Mobile;
use App\Order;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class MobileController extends Controller
{
	//  повертає максимальну ціну по телефонах
    public function getMaxPrice()
    {
        $max = Mobile::max('price');
        $response = [
            'maxPrice' => $max
        ];
        return response()->json($response, 200);
    }

    //при реєстрації перевіряє чи доступний email чи зайнятий
    public function checkEmail($identifier)
    {
        $user = User::where('email', $identifier)->first();
        $response = [
            'user' => $user
        ];
        return response()->json($response, 200);
    }

    // валідує і реєструє нового користувача
    public function registerUsers(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'anotherName' => 'required',
            'phoneNumber' => 'required|min:11|numeric',
            'city' => 'required',
            'numberDepartment' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password'
        ]);
        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        $response = [
            'message' => 'Success'
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    //валідує користувача, і якщо валідація пройшла успішно і є такий користувач тоді повертає токен
    public function loginUsers(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
         $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        $user = User::where('email', $request->get('email'))->get();
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    //повертає мінімальну ціну по телефонах
    public function getMinPrice()
    {
        $min = Mobile::min('price');
        $response = [
            'minPrice' => $min
        ];
        return response()->json($response, 200);
    }

    //повертає перші 6 телефонів
    public function getMobiles()
    {
    	$mobiles = Mobile::take(6)->get();
    	$response = [
    		'phones' => $mobiles
    	];
    	return response()->json($response, 200);
    }

    //приймає телефони які замовив користувач, а також створює нове замовлення з телефонами
    public function getOrderMobiles(Request $request)
    {
        
        $array = array_values($request->all());
        $newArr = array();
        foreach ($request->all() as $req) {
            if ($req['count']) {
                for ($i=0; $i < $req['count']; $i++) { 
                  array_push($newArr, $req['id']);
                }
            }  else {
                $id = $req;
            }

        }
        $order = Order::add($id);
        $order->addMobiles($newArr);
        $order->setDefaultStatus();
        $order->save();
        $response = [
            'message' => 'Success'
        ];
        return response()->json($response, 200);
    }

    // повертає 6 телефонів, пропускаючи певну кількість
    public function moreMobile($number)
    {
        $mobiles = Mobile::skip($number)->take(6)->get();
        $response = [
            'phones' => $mobiles
        ];
        return response()->json($response, 200);
    }

    //повертає телефон знайденим за ідентифікатором
    public function getMobile($id)
    {
    	$mobile = Mobile::find($id);
    	$response = [
    		'phone' => $mobile
    	];
    	return response()->json($response, 200);
    }

	//повертає всі телефони
    public function getAllMobiles()
    {
        $mobiles = Mobile::all();
        $response = [
            'mobiles' => $mobiles
        ];
        return response()->json($response, 200);
    }

    //повертає всі категорії
    public function getCategories()
    {
    	$categories = Category::select('id', 'name')->get();
    	$response = [
    		'categories' => $categories
    	];
    	return response()->json($response, Response::HTTP_OK);
    }
}
