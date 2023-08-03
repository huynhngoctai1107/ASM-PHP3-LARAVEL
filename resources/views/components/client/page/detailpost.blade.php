 

        <div class="container" style="margin-top: 100px !important">
            
                <div class="col-lg-12">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1 text-justify">{{$detail['post']->main_title}}</h1>
                            <br>
                            <h5 class="fw-bolder mb-1 text-justify">{!!$detail['post']->subtitles!!}</h5>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Đăng ngày {{date('d-m-Y',strtotime($detail['post']->date_input))}} bởi {{$detail['post']->compolation}}</div>
                            <!-- Post categories-->
                                @php
                                    $slugCategory = explode(',',$detail['post']->slugcategory)
                                @endphp
                                    @foreach($slugCategory as $slug)
                                        <a class="badge bg-secondary text-decoration-none link-light" href="/blog/danh-muc/{{$slug}}"> {{strtolower($slug)}}</a>
                                    @endforeach
                           
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4">
                            
                            @php
                            $imgPost = explode(',',$detail['images']->img)
                            @endphp
                            
                              @for($i=0 ; $i <count($imgPost); $i++)
                                    @php
                                    $url = $detail['urlImg'].''.$imgPost[$i];
                                    @endphp
                                     <img width="100%"  class="img-fluid "src='{{asset("$url")}}' alt="...."  style="height: auto !important">
                                    @break
                            @endfor
                          
                            
                            
                        </figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            {!!$detail['post']->content!!}
                        </section>
                    </article>
                    <!-- Comments section-->
                   
                
              
                  </div>
        </div>
            {{$similarPosts ?? ""}}
        