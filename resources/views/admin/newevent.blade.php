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
            <div class="card-header  text-center pt-4">
              <h5 class="pl-5">Add new event</h5>
            </div>
            <div class="card-body">
              <form role="form text-left" method="post" action="{{url('/addevent')}}" enctype="multipart/form-data">
        
                {{csrf_field()}}
                <div class="mb-3">
                  <input type="text" class="form-control" name="title" placeholder="Enter event " aria-label="Name" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="day" placeholder="Enter event  day" aria-label="Name" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="month" placeholder="Enter event  month" aria-label="Name" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="location" placeholder="Enter event  location" aria-label="Name" aria-describedby="email-addon">
                  </div>
                <div class="mb-3">
                  <input type="file" class="form-control" name="event_image" placeholder="Select image">
                </div>
                
                <div class="text-center d-flex">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>

                </div>
                <p class="text-sm mt-3 mb-0  "><a href="{{url('/events')}}" class="text-dark font-weight-bolder">Cancel</a></p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection