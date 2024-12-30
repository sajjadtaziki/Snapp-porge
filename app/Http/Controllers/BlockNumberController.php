<?php

namespace App\Http\Controllers;

use App\Http\Requests\The_deiversrequest;
use App\Http\Requests\Uthe_driver;
use App\Http\Resources\ShowBlock_number;
use App\Http\Resources\ShowTheDrivers;
use App\Http\Resources\User\UserShowResource;
use Illuminate\Http\Request;
use App\Models\Block_Number;
use App\Http\Requests\Bluck_NumberRequest;
use Illuminate\Support\Facades\DB;

class BlockNumberController extends Controller
{
    public function storm(Bluck_NumberRequest $bluck_NumberRequest)
    {
        $Block_Number =Block_Number::create($bluck_NumberRequest->all());

        return response()->json([
            "Massage"=>"این پلاک به لیست مسدودی اضافه شد",
            "data"=>new ShowBlock_number($Block_Number)
        ],200);
    }

    public function update(Bluck_NumberRequest $bluck_NumberRequest , $id)
    {
        $Block_Number = Block_Number::find($id);
        // $admin ->update($adminInfoRequest->all());
        if (!$Block_Number)
        {
            return response()->json([
                "Massage"=>"پلاک وجود ندارد"
            ],301);

        }
        else{
            $Block_Number ->update($bluck_NumberRequest->all());
            return response()->json([
                "Massage"=>"اطلاعات پلاک بروزرسانی شد",
                "data"=>new ShowBlock_number($Block_Number)
            ],200);
        }
    }
    public function delete($id)
    {
        $Block_Number = Block_Number::find($id);

        $Block_Number->delete();
        if (!$Block_Number)
        {
            return response()->json([
                "Massage"=>"پلاک وجود ندارد",
            ],301);
        }
        else
        {
            return response()->json([
                "Massage"=>"پلاک حذف شد",
            ],200);
        }
    }

    public function show($id)
    {
        $Block_Number = Block_Number::find($id);
        if (!$Block_Number){
            return response()->json([
                "Massage"=>"پلاک وجود ندارد",
            ]);
        }
        else
        {
            return response()->json([
                "Massage"=>"پلاک  مورد نظر",
                "data"=>new ShowBlock_number($Block_Number)
            ]);
        }

    }

}
