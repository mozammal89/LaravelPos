<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extra;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extra = Extra::all();
        return response()->json($extra);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'vat' => 'required',
        ]);



        if ($request->logo) {
            $position = strpos($request->logo, ';');
            $sub = substr($request->logo, 0, $position);
            $ext = explode('/', $sub)[1];


            $name = time() . "." . $ext;
            $img = Image::make($request->logo)->resize(240, 200);
            $upload_path = 'backend/extra/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            // return $image_url;

            $extra = new Extra();
            $extra->vat = $request->vat;
            $extra->email = $request->email;
            $extra->phone = $request->phone;
            $extra->address = $request->address;
            $extra->logo = $image_url;
            $extra->save();
        } else {
            $extra = new Extra();
            $extra->vat = $request->vat;
            $extra->email = $request->email;
            $extra->phone = $request->phone;
            $extra->address = $request->address;
            $extra->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $extra = DB::table('extras')->where('id', $id)->first();
        return response()->json($extra);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->newphoto) {

            $extra = Extra::find($id);

            $logo = $extra->logo;

            if ($logo) {
                $done = unlink($logo);
            }

            $position = strpos($request->newphoto, ';');
            $sub = substr($request->newphoto, 0, $position);
            $ext = explode('/', $sub)[1];


            $name = time() . "." . $ext;
            $img = Image::make($request->newphoto)->resize(240, 200);
            $upload_path = 'backend/extra/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $extra->vat = $request->vat;
            $extra->email = $request->email;
            $extra->phone = $request->phone;
            $extra->address = $request->address;
            $extra->logo = $image_url;
            $extra->save();
        } else {
            $extra = Extra::find($id);
            $extra->vat = $request->vat;
            $extra->email = $request->email;
            $extra->phone = $request->phone;
            $extra->address = $request->address;
            $extra->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $extra = DB::table('extras')->where('id', $id)->first();
        $logo = $extra->logo;
        if ($logo) {
            unlink($logo);
            DB::table('extras')->where('id', $id)->delete();
        } else {
            DB::table('extras')->where('id', $id)->delete();
        }
    }


    public function getVat(Request $request)
    {
        $vat = DB::table('extras')->first();
        return response()->json($vat);
    }
}
