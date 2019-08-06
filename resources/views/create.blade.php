@extends('layouts.main')
@section('content')
  <!-- Masthead -->
  <section class="">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12 mx-auto">
          <h1 class="mb-5"> Create Service Request </h1>
        </div>
        <form method="POST" action="{{ url('postcreate') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="request_id" value="{{ $id }}">
        <div class="col-xl-10 mx-auto">
          <div>
            <label>
              Vehicle Make
            </label>
            <div>
              <select name="make" id="makev" >
                <option value="">
                  Select...
                </option>
                @foreach($make as $val)
                  <option value="{{ $val->title }}" data-id="{{ $val->id }}"> {{ $val->title}} </option>
                @endforeach
              </select>
              <div class="error">
              {{ $errors->first('make') }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-10 mx-auto">
          <div>
            <label>
              Vehicle Model
            </label>
            <div>
              <select name="vehicle_model_id" id="vehicle_model_id">
                @if($id)
                  <option value="{{ $service_req->vehicle_model_id }}" selected> {{ $service_req->vehicle_model_name}} </option>
                @else
                <option value="">Select any vehiclie make option </option>
                @endif
              </select>
              <div class="error">
              {{ $errors->first('vehicle_model_id') }}
              </div>
            </div>

          </div>
        </div>
        <div class="col-xl-10 mx-auto">
          <div>
            <label>
              Name
            </label>
            <div>
              <input type="text" name="client_name" value="{{ ($service_req) ? $service_req->client_name : '' }}">
              <div class="error">
              {{ $errors->first('client_name') }}
              </div>
            </div>
          </div>
        </div>
      

       <div class="col-xl-10 mx-auto">
          <div>
            <label>
              Email
            </label>
            <div>
              <input type="email" name="client_email" value="{{ ($service_req) ? $service_req->client_email : '' }}">
              <div class="error">
              {{ $errors->first('client_email') }}
              </div>
            </div>
          </div>
        </div>


         <div class="col-xl-10 mx-auto">
          <div>
            <label>
              Phone
            </label>
            <div>
              <input type="text" name="client_phone" value="{{ ($service_req) ? $service_req->client_phone : '' }}">
              <div class="error">
              {{ $errors->first('client_phone') }}
              </div>
            </div>
          </div>
        </div>


         <div class="col-xl-10 mx-auto">
          <div>
            <label>
              Service Descrition
            </label>
            <div>
              <input type="text" name="description" value="{{ ($service_req) ? $service_req->description : '' }}">
              <div class="error">
              {{ $errors->first('description') }}
              </div>
            </div>
          </div>
          <input type="hidden" name="status" value="new">
        </div>
        <div class="col-xl-10 mx-auto">
            <input type="submit" name="save" value="Save">
        </div>
        </form>
      </div>
    </div>
  </section>


@endsection