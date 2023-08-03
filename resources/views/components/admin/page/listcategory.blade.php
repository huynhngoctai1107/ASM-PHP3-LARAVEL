<div class="content-wrapper mt-5 bg-white">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if(!empty($check['page']))
                <button class="button-64 mb-4" role="button"><a  class="text text-white" href="/admin/add-category-product">Thêm loại sản phẩm</a></button>

            @else
                <button class="button-64 mb-4" role="button"><a  class="text text-white" href="/admin/add-category-post">Thêm loại bài viết</a></button>


            @endif


            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header bg">
                            @if(!empty($check['page']))
                            <h3 class="card-title text-white">Danh sách loại sản phẩm</h3>
                                @else
                                <h3 class="card-title text-white">Danh sách bài viết</h3>

                            @endif
                        </div>
                        @if (session()->has('edit-category'))
                            <div class="alert alert-success" role="alert">{{session('edit-category')}}</div>
                        @endif
                        @if (session()->has('delete-category'))
                            <div class="alert alert-success" role="alert">{{session('delete-category')}}</div>
                        @endif

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Tên danh mục</th>

                                    <th class="text-center">Đường dẫn URL</th>

                                    <th class="text-center">Nghiệp vụ</th>

                                </tr>
                                </thead>
                                <tbody>

                                   
                                @foreach($check['list'] as $item)

                                    <tr data-widget="expandable-table" style="background-color: white !important" aria-expanded="false">


                                        <td class="text-center"> {{$item->name}}
                                        </td >
                                        @if(!empty($check['page']))
                                            @php 
                                            $link = '/product/danh-muc/';
                                            $editLink ='/admin/edit-category-product/';
                                            $deleteLink ='/admin/delete-category-product/';
                                            @endphp
                                            
                                        @else
                                            @php 
                                            $link = '/blog/danh-muc/';
                                            $editLink ='/admin/edit-category-post/';
                                            $deleteLink ='/admin/delete-category-post/';
                                            @endphp
                                        @endif
                                        <td class="text-center"><a href="{{$link}}{{$item->slug}}">{{$item->slug}}</a></td>

                                        <td class="text-center"> <a href="{{$editLink}}{{$item->slug}}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>|<a href="{{$deleteLink}}{{$item->slug}}"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        width="30px" height="30px" fill="currentColor"
                                                                                                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg></a>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td colspan="8" class="col-12" style="padding-left: 20px !important; padding-top: 20px !important">

                                            <h6 class="text-uppercase font-weight-bold">Nội dung: <span class=" font-weight-normal  text-capitalize text-black">{{$item->note}}</span></h6>


                                        </td>
                                    </tr>

                                @endforeach
                               

                                </tbody>

                            </table>
                           
                            <div class="col-12 text-right">
                                <div class="pagination mt-4 ">
                                
                                    <div class="row ">
                                    {{ $check['list']->render("pagination::semantic-ui") }}
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
