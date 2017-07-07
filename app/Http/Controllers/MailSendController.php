<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMailSendRequest;
use App\Jobs\SendMailToReceivers;
use App\Mail;
use Illuminate\Http\Request;

class MailSendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Mail::all()->load('mailReceivers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMailSendRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMailSendRequest $request)
    {
        try{
            \DB::connection()->beginTransaction();

            $mail = new Mail();

            $mail->fill($request->only([
                'title',
                'content',
                'sender_email_address',
            ]));

            $mail->save();

            collect($request->get('email_receivers'))->each(function($receiver) use($mail){
                $mail->mailReceivers()->create([
                    'email_address' => $receiver
                ]);
            });

            \DB::connection()->commit();
        }catch (\Exception $e){
            \DB::connection()->rollback();

            throw new \RuntimeException("Something went wrong while storing the mail send record", 0, $e);
        }
        
        dispatch((new SendMailToReceivers($mail))->onQueue('mail'));

        return [
            'id' => $mail->getId()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mail = Mail::findOrFail($id);

        return $mail->load('mailReceivers');
    }
}
