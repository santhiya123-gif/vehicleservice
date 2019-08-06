<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\ServiceRequests;
use App\Models\{VehicleMakes,VehicleModels};

use Redirect;

class ServiceRequestsController extends Controller {

  /**
   * [Display a paginated list of Service Requests in the system]
   * @return view
   */
  public function index(){
    //echo "string";exit;
    $requests = ServiceRequests::orderBy('updated_at','desc')->paginate(20);
    return view('index',compact('requests'));
  }
  /**
   * [This is the method you should use to show the edit screen]
   * @param  ServiceRequests $serviceRequest [get the object you are planning on editing]
   * @return ...
   */
  public function getCreate($id=false, ServiceRequests $serviceRequest){
    $data['id'] = $id;
    if($id){
      $data['service_req'] = ServiceRequests::where('id', $id)->first();
      $model = VehicleModels::find($data['service_req']->vehicle_model_id);
      $data['service_req']['vehicle_model_name'] = $model->title;
    }else{
       $data['service_req'] = '';
    }
    
    $data['make'] = VehicleMakes::select('*')->get();
    $data['models'] = VehicleModels::select('*')->get();
    return view('create', $data);

  }
  public function edit(ServiceRequests $serviceRequest){
  }
  public function getmodels(){
    $id = $_POST['id'];
    if($id){
      $models = VehicleModels::where('vehicle_make_id', $id)->get();
      $option ='';
      foreach ($models as $key => $value) {
        $option .= '<option value="'.$value->id.'">'.$value->title.'</option>';
      }
      return $option;
    }
  }
  public function postCreate(Request $request){
        $id = $request->input('request_id');
        $rules = [
            'vehicle_model_id'=>'required',
            'client_email' => 'required|unique:service_requests,client_email,'.$id,
            'client_name'=>'required',
            'client_phone'=>'required|numeric',
            'description'=>'required',
        ];

        if($request->request_id == ''){
          $rules['make'] = 'required';
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          $notification = array(
            'message' => 'Please enter the required value!',
            'alert-type' => 'error'
          );
          return \Redirect::to('create')->with($notification)
                        ->withErrors($validator);
        }else{

          if($id ==''){
            $service = new ServiceRequests;
            $msg = 'Service Request Created';
          }else{
            $service = ServiceRequests::find($id);
             $msg = 'Service Request Updated';
          }

          $service->client_email = $request->input('client_email');
          $service->vehicle_model_id = $request->input('vehicle_model_id');
          $service->client_name = $request->input('client_name');
          $service->client_phone = $request->input('client_phone');
          $service->description = $request->input('description');
          $service->status = $request->input('status');

          if($service->save()){
            return redirect('')->with(array('message' => $msg, 'alert-type' => 'success')); 
          }else{
            return redirect('create/'.$id)->with(array('message' => 'Something went wrong!', 'alert-type' => 'error'))->withInput(); 
          } 
        }
  }
  public function getDelete($id = false){
   
    if($id){
      $service = ServiceRequests::find($id);
      if ($service->delete()) {
        $notification = array(
            'message' => 'Service Requests Deleted!',
            'alert-type' => 'success'
        );
        return Redirect::to('')->with($notification);
      }else{

        return redirect('')->with(array('message' => 'Something went wrong!', 'alert-type' => 'error')); 
      }
    }else{
        return redirect('')->with(array('message' => 'Something went wrong!', 'alert-type' => 'error')); 

    }
  }
}
