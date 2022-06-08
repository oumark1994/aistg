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
              <h5>Add new team</h5>
            </div>
            <div class="card-body">
              <form role="form text-left" method="post" action="{{url('/addteam')}}" enctype="multipart/form-data">
        
                {{csrf_field()}}
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Enter name" aria-label="Name" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="position" placeholder="Enter position" aria-label="Name" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="facebook" placeholder="Enter facebook link" aria-label="Name" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="twitter" placeholder="Enter twitter link" aria-label="Name" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="number" placeholder="Enter phone number" aria-label="Name" aria-describedby="email-addon">
                  </div>          
                <div class="mb-3">
                  <input type="file" class="form-control" name="team_image" placeholder="Select image" >
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                </div>
                <p class="text-sm mt-3 mb-0"><a href="{{url('/teams')}}" class="text-dark font-weight-bolder">Cancel</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection