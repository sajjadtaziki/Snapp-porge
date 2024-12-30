<?php

namespace App\Http\Controllers;


use App\Http\Requests\The_deiversrequest;
use App\Http\Requests\Uthe_driver;

use App\Http\Resources\ShowTheDrivers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\the_driver;
use App\Models\Block_Number;


class TheDriverController extends Controller
{
    public function storm(The_deiversrequest $the_deiversrequest)
    {
        $blockedNumberExists = Block_Number::where('block_number', $the_deiversrequest->Number_p)->exists();

        if ($blockedNumberExists) {
            return response()->json([
                "error" => "این شماره در لیست سیاه قرار دارد."
            ], 400);
        }
        else{
        $the_driver =the_driver::create($the_deiversrequest->all());

        if ($the_deiversrequest->hasFile('Avatar'))
            $Url_Avatar=Storage::putFile('/Avatar_url',$the_deiversrequest->Avatar);
        $the_driver->update([
            'Image'=>$Url_Avatar,
        ]);
        return response()->json([
            "Massage"=>"راننده با موفقیت اضافه شد",
            "data"=>new ShowTheDrivers($the_driver)
        ],200);
    }
    }

    public function update(Uthe_driver $uthe_driver , $id)
    {
        $the_driver = the_driver::find($id);
        // $admin ->update($adminInfoRequest->all());
        if (!$the_driver)
        {
            return response()->json([
                "Massage"=>"راننده با این ایدی وجود ندارد"
            ],301);

        }
        else{
            $the_driver ->update($uthe_driver->all());
            return response()->json([
                "Massage"=>"اطلاعات راننده با موفقیت بروزرسانی شد",
                "data"=>new ShowTheDrivers($the_driver)
            ],200);
        }
    }
    public function delete($id)
    {
        $the_driver = the_driver::find($id);

        $the_driver->delete();
        if (!$the_driver)
        {
            return response()->json([
                "Massage"=>"رانند وجود ندارد",
            ],301);
        }
        else
        {
            return response()->json([
                "Massage"=>"راننده حذف شد",
            ],200);
        }
    }

    public function show($id)
    {
        $the_driver = the_driver::find($id);
        if (!$the_driver){
            return response()->json([
                "Massage"=>"راننده وجود ندارد",
            ]);
        }
        else
        {
            return response()->json([
                "Massage"=>"راننده مورد نظر",
                "data"=>new ShowTheDrivers($the_driver)
            ]);
        }

    }
}
