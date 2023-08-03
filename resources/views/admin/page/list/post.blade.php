@extends('admin.index')

@section('title')
    Danh sách bài viết
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endsection

@section('main')
    <div class="content-wrapper mt-5  bg-white">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <button class="button-64 mb-4" role="button"><a  class="text text-white" href="/admin/add-post">Thêm bài viết</a></button>

                <div class="row">
                    <div class="col-12">


                        <div class="card  ">
                            <div class="card-header bg" >
                                <h3 class="card-title text-white">Danh sách bài viết</h3>
                            </div>
                            <!-- /.card-header -->
                            @if (session()->has('delete-post'))
                                <div class="alert alert-success" role="alert">{{session('delete-post')}}</div>
                            @endif

                            @if (session()->has('error-post'))
                                <div class="alert alert-danger" role="alert">{{session('error-post')}}</div>
                            @endif

                            @if (session()->has('edit-post'))
                                <div class="alert alert-success" role="alert">{{session('edit-post')}}</div>
                            @endif
                            @if (session()->has('edit-error-post'))
                                <div class="alert alert-danger" role="alert">{{session('edit-error-post')}}</div>
                            @endif


                            <div class="card-body">


                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                      
                                        <th class="text-center">Tiêu đề chính</th>


                                        <th class="text-center">Nhiệp vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($data))
                                        @foreach($data['post'] as $item)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                              
                                        
                                                <td class="text-center">{{$item->main_title}}</td>
                                                <td class="text-center"> <a href="/admin/edit-post/{{$item->id_posts}}"><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg></a>|<a href="/admin/delete-post/{{$item->id_posts}}"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                          width="30px" height="30px" fill="currentColor"
                                                                                                                          class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                            </svg></a>

                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td colspan="8" class="col-12" style="padding-left: 20px !important;padding-right: 20px !important; padding-top: 20px !important">
                                                    <h6 class="text-uppercase font-weight-bold">Hình ảnh:<span class="text-black font-weight-normal  text-capitalize">
                                                     @foreach($data['img'] as $img)
                                                                @if($item->id_posts ==$img->id_post)
                                                                    @php
                                                                        $imgPosts = explode(',', $img->img)
                                                                    @endphp
                                                                    @foreach($imgPosts as $img)
                                                                        @php
                                                                            $url = $data['urlImg'].''.$img;
                                                                        @endphp
                                                                        <img width="150" height="150"  src='{{asset("$url")}}' alt="{{$img}}">
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                         </span></h6>
                                                                <h6 class="text-uppercase font-weight-bold">Danh mục bài viết: <span class="text-lowercase font-weight-normal  text-danger">
                                                            @php
                                                                $slugCategory = explode(',',$item->slugcategory)
                                                            @endphp
                                                                        @foreach($slugCategory as $slug)
                                                                            <a href="/blog/danh-muc/{{$slug}}"> {{strtolower($slug)}}</a>
                                                                        @endforeach
                                                             </span></h6>
                                                                <h6 class="text-uppercase font-weight-bold">Tiêu đề phụ: <span class="text-black font-weight-normal  text-capitalize"style="text-align: justify !">{!!$item->subtitles!!}</span> </h6>
                                                        <h6 class="text-uppercase font-weight-bold">Nội dung chính: <span class="text-black font-weight-normal  text-capitalize">{!! $item->content !!}</span></h6>
                                                        <h6 class="text-uppercase font-weight-bold ">Người biên soạn: <span class=" font-weight-normal  text-capitalize text-black">{{$item->compolation}}</span></h6>
                                                    <h6 class="text-uppercase font-weight-bold ">Ngày nhập: <span class=" font-weight-normal  text-capitalize text-black">{{date('d-m-Y',strtotime($item->date_input))}}</span></h6>
                                                    <h6 class="text-uppercase font-weight-bold">Trạng thái:
                                                        @if($item->statuspost == 0 )
                                                            <span class=" font-weight-normal  text-capitalize text-success"> Đang hoạt động </span>
                                                        @else
                                                            <span class=" font-weight-normal  text-capitalize text-danger"> Không hoạt động </span>


                                                        @endif
                                                    </h6>

                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>

                                <div class="col-12 text-right">
                                    <div class="pagination mt-4 ">
                                        <div class="row ">
                                            {{ $data['post']->render("pagination::semantic-ui") }}
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
@section('script')
    {{-- <script src="{{ asset('dist/js/showhiden.js') }}"></script> --}}

@endsection
