<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\CarbonOffsetMembership;
use Exception;


class CarbonOffsetMembershipController extends Controller
{
    /**
     * Display a listing of monthly payment schedule using
     * input from user of membership start date(subscriptionStartDate) and number of listings(scheduleInMonths).
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subscriptionStartDate' => 'required|date_format:Y-m-d',
            'scheduleInMonths' => 'required|integer|between:0,36',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        $startDate = $validator->validated()['subscriptionStartDate'];
        $numMonths = $validator->validated()['scheduleInMonths'];

        $cardonOffsetMembership = new CarbonOffsetMembership();
        try {
            return response()->json($cardonOffsetMembership->getSchedule($startDate, $numMonths), 200);
        } catch (Exception $ex) {
            return response()->json($ex->getCode() ."-". $ex->getMessage(),400);
        }
    }

}
