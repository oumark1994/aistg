

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
  
                <div class="col-md-6" >
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Hire me
                    </h5>
                  </div>
                  <div>
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
                    <form  wire::submit.prevent="submitform" action="/contact" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="row">
                        
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" wire:model="name" id="name" name="name" class="form-control" id="name" placeholder="Your Name"  />
                            @error('name')<span class="form-error">{{$message}}</span>@enderror
                        </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" wire:model="email" class="form-control" name="email" id="email" placeholder="Your Email" />
                            @error('email')<span class="form-error">{{$message}}</span>@enderror  
                        </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" wire:model="subject"  class="form-control" name="subject" id="subject" placeholder="Subject"  />
                            @error('subject')<span class="form-error">{{$message}}</span>@enderror  

                        </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <textarea wire:model="message" id="message" class="form-control" name="message" rows="5"  ></textarea>
                            @error('message')<span class="form-error">{{$message}}</span>@enderror  

                          </div>
                        </div>
                      
                        <div class="col-md-12 text-center">
                          <button type="submit" {{(!is_null($name) && !empty($email) && !is_null($email) && !empty($email)) ? '' :'disabled' }} class="button button-a button-big button-rouded">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
     
             

