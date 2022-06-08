@extends('admin.template')
@section('container')
<div class="container-fluid my-5">
        <div class="col-xl-4 col-lg-12 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Edit event</h5>
            </div>
            <div class="card-body">
              <form role="form text-left" method="post" action="{{url('/updateevent')}}" enctype="multipart/form-data">
        
                {{csrf_field()}}
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="id" value="{{$event->id}}" aria-label="Name" aria-describedby="email-addon">

                  <input type="text" class="form-control" name="title" value="{{$event->title}}" aria-label="Name" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" name="description" value="{{$event->description}}" aria-label="Email" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" name="day" value="{{$event->event_day}}" aria-label="Email" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" name="month" value="{{$event->event_month}}" aria-label="Email" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" name="location" value="{{$event->location}}" aria-label="Email" aria-describedby="email-addon">
                </div>
                
                <div class="mb-3">
                  <input type="file" class="form-control" name="event_image" placeholder="Select image" >
                </div>
                
                <div class="text-center d-flex justify-content-space-between">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>

                </div>
                <p class="text-sm mt-3 mb-0"><a href="{{url('/events')}}" class="text-dark font-weight-bolder">Cancel</a></p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection