<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\registration;
use App\insert_image;
use App\reg_fee_detail;
use DB;
use Carbon\Carbon;
class RegisterController extends Controller
{

	public function register_student(Request $request)
	{
				$c=new registration;
      		
       		  $c->name= $request->name;
    			$c->date_of_birth=Carbon::parse($request->date_of_birth)->format('Y-m-d ');

// IMAGE UPLOAD SETTING
	$file=$request->file('photo');
	$upload="uploads/photo/";
	$filename=$file->getClientOriginalName();
	$success=$file->move($upload,$filename);
// IMAGE UPLOAD SETTING

			$c->image_photo=$filename;
			
			$c->gender= $request->gender;
			$c->parent_name= $request->parent_name;
			$c->mobile_no= $request->mobile_no;
			$c->email_id= $request->email_id;
			$c->address_res= $request->address_res;
			$c->address_per= $request->address_per;

			$c->id_type= $request->id_type;

// IMAGE UPLOAD SETTING
	$file_f=$request->file('photo_f');
	$upload_f="uploads/id/front/";
	$filename_f=$file_f->getClientOriginalName();
	$success_f=$file_f->move($upload_f,$filename_f);
// IMAGE UPLOAD SETTING

			$c->id_front= $filename_f;

// IMAGE UPLOAD SETTING
	$file_b=$request->file('photo_b');
	$upload_b="uploads/id/back/";
	$filename_b=$file_b->getClientOriginalName();
	$success_b=$file_b->move($upload_b,$filename_b);
// IMAGE UPLOAD SETTING

			$c->id_back= $filename_b;


			$c->prepare_for= $request->prepare_for;
			$c->coaching_name= $request->coaching_name;
			$c->know_about= $request->know_about;

// IMAGE UPLOAD SETTING
	$file_s=$request->file('photo_s');
	$upload_s="uploads/id/sign/";
	$filename_s=$file_s->getClientOriginalName();
	$success_s=$file_s->move($upload_s,$filename_s);
// IMAGE UPLOAD SETTING

			$c->signature= $filename_s;

$c->save();

\Session::flash('user_insert',"User Successfully Inserted..!");


return \Redirect::back(); 
}

public function getImage()
{
 
	$data=registration::all();

		return $data;
    //
}
public function getLastID()
{
 $data = registration::all();
	$last = collect($data)->last();

	return $last;
    //
}
public function getUserById(Request $request)
{

$user = DB::table('registrations')->where('id', '=', $request->user_id)->get();
	return $user;
}

public function getUserForFee(Request $request)
{
$user_detail = DB::table('registrations')->where('id', '=', $request->user_id)->get();
	
$reg_fee = DB::table('reg_fee_details')->where('user_id', '=', $request->user_id)->get();
	
	if(count($reg_fee)>0)
	{
		$users = DB::table('registrations')
            ->join('reg_fee_details', 'registrations.id', '=', 'reg_fee_details.user_id')
   ->where('reg_fee_details.user_id', '=', $request->user_id)
            ->get();
		
		return $users;
	}
	else
	{
		
	}

	return $user_detail;
}


public function regFeeUser(Request $request)
{

	if($request->dues=="0")
	{
		
 	$c=new reg_fee_detail;
      		
       		  $c->user_id= $request->user_id;
       		  $c->reg_charges= $request->reg_charges;
       		  $c->id_charges= $request->id_charges;
    		  $c->paid_amount= $request->paid_amount;
    		
    		 $c->dues_reg= null;
    		$c->valid_from=Carbon::parse($request->date_from)->format('Y-m-d ');
    		$c->valid_to=Carbon::parse($request->date_to)->format('Y-m-d ');

    		 $c->plan_name= $request->plan_name;

    		 $c->save();

    		\Session::flash('user_feeInsert',"Fee Details Successfully Saved");


return \Redirect::back(); 
	//dd($request->all());
	}
	else 
	{
		
 	$c=new reg_fee_detail;
      		
       		  $c->user_id= $request->user_id;
       		  $c->reg_charges= $request->reg_charges;
       		  $c->id_charges= $request->id_charges;
    		  $c->paid_amount= $request->paid_amount;
    		
    		 $c->dues_reg= $request->dues;
    		$c->valid_from=Carbon::parse($request->date_from)->format('Y-m-d ');
    		$c->valid_to=Carbon::parse($request->date_to)->format('Y-m-d ');

    		 $c->plan_name= $request->plan_name;

    		 $c->save();

    		\Session::flash('user_feeInsert',"Fee Details Successfully Saved");


return \Redirect::back(); 
	//dd($request->all());	
	}

}

	public function getSearchData(Request $request)
	{

//dd($request->all());
  $query = $request->get('term','');        
        $data=registration::where('name','LIKE','%'.$query.'%')->get();        
        return response()->json($data);
	}














	public function addImage(Request $request)
	{

		$c=new insert_image;
      		
       	 $c->name= $request->name;
    	 $c->dob=Carbon::parse($request->date_of_birth)->format('Y-m-d ');

				// IMAGE UPLOAD SETTING
					$file=$request->file('photo');  
					$upload="uploads/photo/";
					$filename=$file->getClientOriginalName();
					$success=$file->move($upload,$filename);
				// IMAGE UPLOAD SETTING

		$c->image=$filename;
			
		$c->gender= $request->gender;
		$c->save();

			\Session::flash('user_insert',"IMAGE Successfully Inserted..!");
		
		return \Redirect::back(); 
	}


public function getImage2()
{
 
	$data=insert_image::all();

		return $data;
    //
}
public function getUserById2(Request $request)
{

$user = DB::table('insert_images')->where('id', '=', $request[0])->get();
	return $user;
}

}
