<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ResepRepository;
use Illuminate\Http\Request;

class ResepController extends BaseController
{
    private $resepRepository;
    
    public function __construct(ResepRepository $resepRepository){
        $this->resepRepository = $resepRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseps = $this->resepRepository->all();

        return $this->sendResponse($reseps, 'All Resep retrieved successfully.');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resep = $this->resepRepository->findById($id);
        return $this->sendResponse($resep, 'Retrieved a single recipe.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = $request->user();

        if($user->hasRole('3')){
            $resep = $this->resepRepository->delete($id);
            return $this->sendResponse($resep, 'Successfully deleted a recipe');
        }else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
        
    }

    public function getPriceById($id){
        $price = $this->resepRepository->getTotalHargaById($id);
        return $this->sendResponse($price, 'Retrieved total price of recipe with id of '.$id);
    }
}
