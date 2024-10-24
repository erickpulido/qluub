<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Interfaces\ReadProductRepositoryInterface;
use App\Interfaces\WriteProductRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private ReadProductRepositoryInterface $readProductRepositoryInterface;
    private WriteProductRepositoryInterface $writeProductRepositoryInterface;
    
    public function __construct(
        ReadProductRepositoryInterface $readProductRepositoryInterface,
        WriteProductRepositoryInterface $writeProductRepositoryInterface
    )
    {
        $this->readProductRepositoryInterface = $readProductRepositoryInterface;
        $this->writeProductRepositoryInterface = $writeProductRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->readProductRepositoryInterface->index();
        return ApiResponseClass::sendResponse($data, $message = "", $code = 200);
        //return response()->json(['success' => true, 'message' => "", 'data' => $data], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $details =[
            'name' => $request->name,
            'details' => $request->details
        ];

        DB::beginTransaction();

        try{
             $product = $this->writeProductRepositoryInterface->store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new ProductResource($product), "Producto agregado",201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data = $this->readProductRepositoryInterface->getById($product->id);
        return ApiResponseClass::sendResponse($data, $message = "", $code = 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $updateDetails =[
            'name' => $request->name,
            'details' => $request->details
        ];
        DB::beginTransaction();
        try{
             $product = $this->writeProductRepositoryInterface->update($updateDetails, $product->id);

             DB::commit();
             return ApiResponseClass::sendResponse('Producto actualizado','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->writeProductRepositoryInterface->delete($product->id);
        return ApiResponseClass::sendResponse($result = "Producto eliminado correctamente", $message = "", $code = 204);
        //return response()->json("Producto eliminado correctamente", 204);
    }
}
