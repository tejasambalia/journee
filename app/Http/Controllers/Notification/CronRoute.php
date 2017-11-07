<?php
namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Notification\Email;

class CronRoute extends Controller {

    public function processmail() {
       // return view('Admin.dashboard');      
        (new Email)->process_queque();
        echo "mail process done";
        exit;
    }

}
