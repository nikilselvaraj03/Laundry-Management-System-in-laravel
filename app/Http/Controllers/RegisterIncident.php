<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Register_Incident;
use App\Http\Controllers\MailerController;
class RegisterIncident extends Controller
{
    protected $MailerController;
    public function __construct(MailerController $MailerController)
    {
        $this->MailerController = $MailerController;
    }
    function registerIncident (Request $request){
        $First_Name = $request['First_Name'];
        $query = $request['query'];
        $register_Incident = Register_Incident::create([
            'First_Name' => $request['fname'],
            'Last_Name'=> $request['lname'],
            'Phonenumber'=>$request['phoneNumber'],
            'Email'=> $request['email'],
            'register'=>$request['register'],
            'query'=> $request['query']
        ]);
        if($register_Incident){
            $msg =  "
            <HTML><HEAD>Welcome to InstaWash</HEAD>
            <BODY>
            <p>
            Hello $First_Name, <br /> <br /> Thank you for registering request  <br /> <br /> $query <br /><br /> our employees will get in touch within 24 hours              Thanks,<br />InstaWash Team.
            </p>
            </BODY>
            </HTML>";
            $emailRecipient=$request['email'];
            $emailSubject="Welcome to InstaWash";
            $response = $this->MailerController->composeEmail($emailRecipient, $emailSubject, $msg);
            return $response;
        }else {
            return response(['message' => "unable to submit your query"],401);        }
    }
}
