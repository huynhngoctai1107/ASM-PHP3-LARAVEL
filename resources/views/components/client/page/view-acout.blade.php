<section style="background-color: #f8f9fd;">
    <div class="py-5">
   
  
      <div class="row">
        <div class="col-lg-5">
          <div class="card mb-4">
            <div class="card-body text-center">
                  @if(auth()->user()->img)
                  @php
                      $url = env('APP_LINK_EAMIL').'/img/users/'.auth()->user()->img;
                  @endphp
                      @if(auth()->user()->social==0)
                          <img width="100"   class="rounded-circle img-fluid" style="width: 150px;" src='{{"$url"}}' alt="hình ảnh user">
                      @else
                            @if(file_exists(auth()->user()->img))
                                          <img  src="{{auth()->user()->img}}"alt="hình ảnh user"   class="rounded-circle img-fluid" style="width: 150px;">
                              @else
                                          <img src='{{asset("$url")}}'   class="rounded-circle img-fluid" style="width: 150px;" alt="hình ảnh user">
                              @endif
                      @endif
              @else
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"   class="rounded-circle img-fluid" style="width: 150px;" alt="avatar">

              @endif
            
              <h5 class="my-3">{{auth()->user()->name}}</h5>
               <p class="text-muted mb-4">
                @if(auth()->user()->level == 0)
                {{$cutomer='Khách hàng'}}
                @endif
                
              <div class="d-flex justify-content-center mb-2">
                 
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-5">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-7">
                  <p class="text-muted mb-0">{{auth()->user()->name}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-7">
                  <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-7">
                  <p class="text-muted mb-0">{{auth()->user()->phone =='' ? 'Chưa có ': auth()->user()->phone}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <p class="mb-0">Tổng đơn hàng</p>
                </div>
                <div class="col-sm-7">
                  <p class=" mb-0 text-success " ><strong> {{$count =='0' ? 'Chưa có đơn hàng nào': $count.' đơn hàng'}}</strong></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <p class="mb-0">Giới tính</p>
                </div>
                <div class="col-sm-7">
                  <p class="text-muted mb-0">{{auth()->user()->gender}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <p class="mb-0">Birthday</p>
                </div>
                <div class="col-sm-7">
                  <p class="text-muted mb-0">{{auth()->user()->birthday =='' ? 'Chưa có ':auth()->user()->birthday}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <p class="mb-0">PT đăng nhập</p>
                </div>
                <div class="col-sm-7">
                  <p class="text-muted mb-0">
                    @if(auth()->user()->social==1)
                    Google
                    @else
                    Tài khoản hệ thống
                    @endif
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-7">
           
          <div class="card mb-4">
            @if(empty($product))
            <x-oder.list-oder :oder="$oder"></x-oder.list-oder>
            @else
            <x-oder.detail-oder :oder="$oder" :product="$product"></x-oder.detail-oder>

            @endif
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                  </p>
                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded mb-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                  </p>
                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                  <div class="progress rounded" style="height: 5px;">   
                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded mb-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
