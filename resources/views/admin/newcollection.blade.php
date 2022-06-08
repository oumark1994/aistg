@extends('admin.template')
@section('container')
<div class="container-fluid my-5">
        <div class="col-xl-4 col-lg-12 col-md-7 mx-auto">
          <div class="card z-index-0">
            @if (count($errors) >0)
            <div class="alert alert-danger">
               <ul>
                 @foreach ($errors->all() as $error)
                 
                 <li>{{$error}}</li>
                 @endforeach
               </ul>
               </div>
            @endif 
            <div class="card-header text-center pt-4">
              <h5>Add new collection </h5>
            </div>
            <div class="card-body">
              <form role="form text-left" method="post" action="{{url('/addcollection')}}" enctype="multipart/form-data">
        
                {{csrf_field()}}
                <div class="mb-3">
                    {{Form::label('','Member Name')}}
                    {{Form::select('name',$members,null,['placeholder'=>'Select member','class'=>'form-control'])}}                  </div>       
                  <div class="mb-3">
                      <select class="form-control" name="month">
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="mai">Mai</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                      </select>
                  </div>       
                  <div class="mb-3">
                    <input type="text" class="form-control" name="amount" placeholder="Enter amount" aria-label="Name" aria-describedby="email-addon">
                  </div>  
                  <div class="mb-3">
                    <input type="date" class="form-control" name="payment_date" placeholder="Enter payment date" aria-label="Name" aria-describedby="email-addon">
                  </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                </div>
                <p class="text-sm mt-3 mb-0"><a href="{{url('/collections')}}" class="text-dark font-weight-bolder">Cancel</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection