<?php
namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Admin Models
use App\AdminModels\Coupon;

class CouponController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function coupon()
    {
        return view('admin.coupon.index');
    }

    public function addCoupon(){
        return view('admin.coupon.addCoupon');
    }

    public function editCoupon($id){
        return view('admin.coupon.editCoupon')->with(array('id' => $id));
    }

    public function handleAddCoupon(Request $request){
        $data = $request->all();
        Coupon::add($data);

        return redirect('/admin/coupon');
    }

    public function handleEditCoupon(Request $request){
        $data = $request->all();
        Coupon::edit($data);

        return redirect('/admin/coupon');
    }

    public function deactivateCoupon($id){
        Coupon::changeStatus($id, 0);
        return redirect('/admin/coupon');
    }

    public function activateCoupon($id){
        Coupon::changeStatus($id, 1);
        return redirect('/admin/coupon');
    }
}