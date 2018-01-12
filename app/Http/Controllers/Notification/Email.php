<?php
namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Mail;
class Email extends Controller {
   
    
    public  function send_email ($from, $to, $subject, $body, $templateid=0, $attachment=array(), $text_html="html", $cc="", $bcc="")
            {
    
 //       dd("hello");
//         Mail::send('User.email_templates.forgot_password_email', ['user' => $user,'body'=>$body], function ($m) use ($user) 
//               {
//                $m->from("rupal@webmavens.in", $user['from_name']);
//                $m->to($user["email_to"],$user["to_name"])->subject($user['subject']);
//            });    
        if($attachment==[])
        {
            $attachment=json_encode($attachment);
        }
        try
        {            
            
            $data=array(
                'email_templates_id'=>$templateid,
                'email_to'=>$to,
                'email_from'=>$from,
                'subject'=>$subject,
                'body'=>($body),
                "attached_files"=>$attachment ,
                //"attached_files"=> $attachment
            );    
            
            DB::table('email_queue')->insert($data);
        
        } catch (\Exception $ex) {
            echo $ex->getMessage();
             \Log::error('From Email:' . $ex->getMessage());
        }
    }
    function send_email_template ($from, $to, $templateid,$attachment=array(), $variables = array(), $cc="", $bcc=""){
			
        
			list($subject,$body) = @array_values($this->getEmailFromTemplate($templateid,$variables));                        					                       
                        return $this->send_email($from, $to,$subject,($body),$templateid,$attachment,"html",$cc, $bcc);
			
			
		}
    public function getEmailFromTemplate($templateid,$variables)
    {
        if(is_numeric($templateid)) {
				$template = DB::table('email_templates')->where('id',$templateid)->first();
			} else {
                                $template = DB::table('email_templates')->where('template_name',$templateid)->first();				
			}
			$templateid = $template->id;
			
			$vars_keys=array();
			$vars_values = array();
			
			$vars_keys = array_keys($variables);
                        
			if( count($vars_keys) > 0 ){
				foreach($vars_keys as $index =>  $data){
					$vars_keys[$index] = "{[$data]}";                                                                                
				}
                                
				$vars_values = array_values($variables);                                
			}
			return array(
				"subject"	=> str_replace($vars_keys,$vars_values,$template->template_subject),
				"body" 		=> str_replace($vars_keys,$vars_values,$template->template_html)
			);
    }
    public function process_queque()
    {        
        try {           
        
            $email_details=DB::table('email_queue')->where(array(['sent','=',0],['email_to','<>',''],['email_from','<>','']))->get();
            foreach ($email_details as $email_detail)
            {                
                DB::table('email_queue')->where('id',$email_detail->id)->update(array('sent'=>2));
                $result=Mail::send('emailtemplate.user_mail_template', ['body'=>$email_detail->body], function ($m) use ($email_detail) 
                       {
                        $m->from($email_detail->email_from, $email_detail->email_from);
                        $m->to($email_detail->email_to,$email_detail->email_to)->subject($email_detail->subject);
                        if($email_detail->attached_files!="[]")
                        {
                           $m->attach($email_detail->attached_files, [
                               'as' => 'payment_receipt.pdf',
                               'mime' => 'application/pdf',
                           ]);
                        }
                }); 
                DB::table('email_queue')->where('id',$email_detail->id)->update(array('sent'=>1));                
            }
        } catch (Exception $ex) {
            \Log::error('From Email(process_queque):' . $ex->getMessage());
            echo $ex->getMessage();
        }
    }

}
