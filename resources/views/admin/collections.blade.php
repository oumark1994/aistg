@extends('admin.template')
@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Filter collection by month</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                {{Form::hidden('',$increment=1)}}
                @if (Session::has('status'))
                <div class="alert alert-success">
                  {{Session::get('status')}}
  </div>
               @endif
               <div class="row d-flex ">
                <div class="col-4">
                    <form  method="post" action="{{url('/collectionByMonth')}}" >
                        {{csrf_field()}}

                    <div class="row">
                       <div class="col-8">
                        <select class="form-select" name="month">
                            <option selected value="all" >All</option>
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
                        
                        <div class="col-4">
                            <input type="submit" value="Filter" class="btn btn-primary"/>

                        </div>
                    </div>
                    </form>
                    </div>
                   
                   <div class="offset-lg-6
                    col-2 d-right ">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/newcollection')}}"><i class="fas fa-plus"></i>New collection</a>
                   </div>
               </div>

              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Month</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payment Date </th>
                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Balance</th>
                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($collections as $collection)

                  <tr>
                  
                    <td class="align-middle  text-sm">
                        {{$collection->name}}
                    </td>
                    <td class="align-middle  text-sm">
                        {{$collection->month}}                
                        </td>
                        <td class="align-middle  text-sm">
                            {{$collection->payment_date}}                
                            </td>
                            <td class="align-middle  text-sm">
                                {{$collection->amount}}                
                            </td>
                                @if ($collection->amount == $collection->total)
                                <td class="align-middle text-sm">
                                <h4 class="text-success">Paid</h4>
                                </td>
                                @else
                                <td class="align-middle text-sm">
                                {{$collection->balance}}     
                               </td>           
                                @endif
                              
                            
                            <td class="align-middle  text-sm">
                                {{$collection->total}}                
                            </td>

                    <td class="align-middle text-center ">
                      
                      <a class="btn bg-gradient-primary mb-0" href="{{url('/editcollection/'.$collection->id)}}"><i class="fas fa-plus"></i>Edit</a>
                      <a class="btn bg-gradient-danger mb-0" href="{{url('/deletecollection/'.$collection->id)}}"><i class="fas fa-plus"></i>Delete</a>
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