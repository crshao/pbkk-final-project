<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Bahanbaku;
use Validator;
use App\Http\Resources\Bahanbaku as BahanbakuResource;

use App\Repositories\BahanbakuRepository;

class BahanbakuController extends BaseController
{
    private $bahanbakuRepository;

    public function __construct(BahanbakuRepository $bahanbakuRepository)
    {
        $this->bahanbakuRepository = $bahanbakuRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahanbakus = Bahanbaku::all();
    
        return $this->sendResponse(BahanbakuResource::collection($bahanbakus), 'Bahanbakus retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'jenis' => 'required',
            'price' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $bahanbaku = Bahanbaku::create($input);
   
        return $this->sendResponse(new BahanbakuResource($bahanbaku), 'Bahanbaku created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bahanbaku = Bahanbaku::find($id);
  
        if (is_null($bahanbaku)) {
            return $this->sendError('Bahanbaku not found.');
        }
   
        return $this->sendResponse(new BahanbakuResource($bahanbaku), 'Bahanbaku retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahanbaku $bahanbaku)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'jenis' => 'required',
            'price' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $bahanbaku->name = $input['name'];
        $bahanbaku->description = $input['description'];
        $bahanbaku->jenis = $input['jenis'];
        $bahanbaku->price = $input['price'];
        $bahanbaku->save();
   
        return $this->sendResponse(new BahanbakuResource($bahanbaku), 'Bahanbaku updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahanbaku $bahanbaku)
    {
        $bahanbaku->delete();
   
        return $this->sendResponse([], 'Product deleted successfully.');
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return $this->bahanbakuRepository->all();
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     return $this->bahanbakuRepository->findById($id);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $this->bahanbakuRepository->delete($id);
    //     return 204;
    // }
}
