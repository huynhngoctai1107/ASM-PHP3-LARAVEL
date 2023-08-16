
    <div class="container">
        {{$category ?? ''}}
        <div class="row g-4">
 
            @foreach($post['post'] as $item)
 
                <div class="col-lg-5 col-md-7 wow fadeInUp" data-wow-delay="0.1s">
                    @foreach($post['img'] as $img)
                        @if($item->id_posts ==$img->id_post)
                            @php
                                $imgPost = explode(',', $img->img)
                            @endphp
                            @for($i=0 ; $i <count($imgPost); $i++)
                                @php
                                    $url = $post['urlImg'].''.$imgPost[$i];
                                @endphp
                                <img src='{{asset("$url")}}' alt="{{$img}}" {{$attributes->merge(['class'=>'img-fluid w-100'])}} style="height:270px !important">
                                @break
                            @endfor
                        @endif
                    @endforeach
                 
                    <div class="bg-light p-1 text-justify">
                        <a   class="d-block h5 mb-4" href="/chi-tiet-bai-viet/{{$item->slug ??''}}" >{{ Str::words($item->main_title, 10, '...')}}</a>
                       <a   href="/chi-tiet-bai-viet/{{$item->slug ??''}}" class="text-muted"> <p>{!! Str::words($item->subtitles, 15, '...')!!}  </p></a>
                        <div class="text-muted border-top pt-4 d-flex justify-content-between">
                            
                            <small class=""><i class="fa fa-user text-primary me-2"></i>{{$item->compolation}}</small>
                            <small class=""><i class="fa fa-calendar text-primary me-2"></i>{{date('m-Y',strtotime($item->date_input))}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

