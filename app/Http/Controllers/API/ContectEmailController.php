<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MailToContact;
use App\Http\Requests\SendEmailRequest;
use App\Interfaces\emailRepositoryInterface;
use App\Classes\ResponseClass;
use App\Http\Resources\EmailResource;
use Illuminate\Support\Facades\DB;
use App\Mail\contactEmail;
use Mail;

class ContectEmailController extends Controller
{
    private emailRepositoryInterface $emailRepositoryInterface;
    
    public function __construct(emailRepositoryInterface $emailRepositoryInterface)
    {
        $this->emailRepositoryInterface = $emailRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->emailRepositoryInterface->index();

        return ResponseClass::sendResponse(EmailResource::collection($data),'',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sendContectEmail(SendEmailRequest $request)
    {
        $details =[
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        DB::beginTransaction();
        try{
             $product = $this->emailRepositoryInterface->sendMailToContect($details);

             DB::commit();
             $mailData = [
                'title' => 'This is Test Mail',
                'name'  => $request->name,
                'message' => $request->message,
                'email' => $request->email,
                'subject' => $request->subject,
            ];
               
            Mail::to(env('MAIL_USERNAME'))->send(new contactEmail($mailData));
            return ResponseClass::sendResponse(new EmailResource($product),'email Create Successful',201);

        }catch(\Exception $ex){
            return ResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = $this->emailRepositoryInterface->getById($id);

        return ResponseClass::sendResponse(new ProductResource($product),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $updateDetails =[
            'name' => $request->name,
            'details' => $request->details
        ];
        DB::beginTransaction();
        try{
             $product = $this->emailRepositoryInterface->update($updateDetails,$id);

             DB::commit();
             return ResponseClass::sendResponse('Product Update Successful','',201);

        }catch(\Exception $ex){
            return ResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $this->emailRepositoryInterface->delete($id);

        return ResponseClass::sendResponse('Product Delete Successful','',204);
    }
}
