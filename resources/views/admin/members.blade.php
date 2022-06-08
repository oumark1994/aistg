@extends('admin.template')
@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>members</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                {{Form::hidden('',$increment=1)}}
                @if (Session::has('status'))
                <div class="alert alert-success">
                  {{Session::get('status')}}
  </div>
               @endif
               @if (count($errors) >0)
               <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                  </div>
               @endif 
               <div class="row d-flex ">
                <div class="col-4">
                    <form  method="post" action="{{url('/searchmember')}}"   enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="row">
                       <div class="col-10">
                       <input type="text" name="search" class="form-control"  placeholder="Enter member name"/>
                        </div>
                        <div class="col-2">
                            <input type="submit" value="Search" class="btn btn-primary"/>

                        </div>
                    </div>
                    </form>
                    </div>
                   
                   <div class="offset-lg-6
                    col-2 d-right ">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/newmember')}}"><i class="fas fa-plus"></i>New member</a>
                   </div>
               </div>
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Picture</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Firstname</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lastname</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)

                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                           
                          <img src="/storage/member_images/{{$member->picture}}" class="avatar avatar-sm me-3">
                        </div>
                    
                      </div>
                    </td>
                    <td class="align-middle  text-sm">
                        {{$member->firstname}}
                    </td>
                    <td class="align-middle  text-sm">
                        {{$member->lastname}}                
                        </td>
                        <td class="align-middle  text-sm">
                          {{$member->address}}                
                          </td>
                          <td class="align-middle text-sm">
                            {{$member->phone}}                
                            </td>
         
                    <td class="align-middle text-center">
                      
                      <a class="btn bg-gradient-primary mb-0" href="{{url('/editmember/'.$member->id)}}"><i class="fas fa-plus"></i>Edit</a>
                      <a class="btn bg-gradient-danger mb-0" href="{{url('/deletemember/'.$member->id)}}"><i class="fas fa-plus"></i>Delete</a>
                    </td>
                  </tr>
                  {{Form::hidden('',$increment=$increment + 1)}}
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection