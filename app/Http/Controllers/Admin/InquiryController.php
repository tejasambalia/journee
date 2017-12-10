<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModels\Inquiry;

class InquiryController extends Controller
{
    public function inquiry(){
        return view('admin.inquiry.index');
    }

    public function activate($id){
        Inquiry::ChangeStatus($id, '1');
        return redirect('/admin/inquiry');
    }

    public function close($id){
        Inquiry::ChangeStatus($id, '2');
        return redirect('/admin/inquiry');
    }
}