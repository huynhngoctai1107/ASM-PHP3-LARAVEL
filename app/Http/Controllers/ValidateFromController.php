<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ValidateFromController extends Controller
{
    public function validateFormLogin(Request $request){
        $messages = [
            'email.required' => 'Vui lòng nhập vào email',
            'password.required' => 'Vui lòng nhập vào password',
            'g-recaptcha-response' =>  'Lỗi xác thực'
            

        ];

        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'bail|required|email',
                'g-recaptcha-response' => 'required',
                'password' => [
                    'required',

                ]
            ],
            $messages
        );
        return $validator ;
    }
    public function validateFormResignter(Request $request){
        $messages = [
            'name.required' => 'Vui lòng nhập vào Họ và Tên',
            'name.min' => 'Độ dài tối thiểu là 3',
            'name.max' => 'Độ dài tối đa là 100',
            'g-recaptcha-response' =>  'Lỗi xác thực',
            'birthday.required' => 'Vui lòng nhập vào năm sinh',
            'email.required' => 'Vui lòng nhập vào email',
            'email.unique'=> 'Email đã tồn tại trong hệ thống',
            'email.email' => 'Email chưa đúng định dạng',
            'phone.required' => 'Vui lòng nhập vào số điện thoại',
            'phone.numeric' => 'Số điện thoại sai định dạng',
            'phone.min'=>'Số điện thoại chưa đúng định dạng',
            'password.required' => 'Vui lòng nhập vào mật khẩu',
            'password.min' => 'Độ dài tối thiểu là 10',
            'password.regex' => 'Mật khẩu phải có Kí tự in hoa, kí tự chữ thường, kí tự đặt biệt và số',
            'password_confirmation.required' => 'Mật khẩu nhập lại không được để trống',
            'password_confirmation.same' => 'Nhập lại mật khẩu chưa khớp với nhau',

        ];
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'bail|required|min:3|max:100|regex:/^[\p{L}\p{M}\s.\-]+$/u',
                'birthday' => 'required|date',
                'gender' => 'required|in:nam,nữ,khác',
                'email' => 'bail||required|email|unique:users,email',
                'g-recaptcha-response' => 'required',
                'phone' => 'bail|required|min:9|numeric',
                'password' => [
                    'required',
                    'string',
                    'min:10',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
                'password_confirmation' => 'required|same:password',
            ],

            $messages
        );

        return $validator;
    }
    public function validateFormAddUser(Request $request){
        $messages = [
            'fullName.required' => 'Vui lòng nhập vào Họ và Tên',
            'fullName.min' => 'Độ dài tối thiểu là 3',
            'fullName.max' => 'Độ dài tối đa là 100',
            'birthday.required' => 'Vui lòng nhập vào năm sinh',
            'email.required' => 'Vui lòng nhập vào email',
            'email.unique'=> 'Email đã tồn tại trong hệ thống',
            'email.email' => 'Email chưa đúng định dạng',
            'phone.required' => 'Vui lòng nhập vào số điện thoại',
            'phone.numeric' => 'Số điện thoại sai định dạng',
            'phone.min'=>'Số điện thoại chưa đúng định dạng',
            'password.required' => 'Vui lòng nhập vào mật khẩu',
            'password.min' => 'Độ dài tối thiểu là 10',
            'password.regex' => 'Mật khẩu phải có Kí tự in hoa, kí tự chữ thường, kí tự đặt biệt và số',
          'status.required'=>'Trạng thái không được để trống ',
          'level.required' =>'Loại tài khoản không được để trống',
        'uploadfile.required'=>"Hình ảnh không được để trống",
        'uploadfile.mimes'=>"Hình ảnh đúng định dạng",
        ];

        $validator = Validator::make(
            $request->all(),
            [
                'fullName' => 'bail|required|min:3|max:100|regex:/^[\p{L}\p{M}\s.\-]+$/u',
                'birthday' => 'required|date',
                'gender' => 'required|in:Nam,Nữ,0',
                'email' => 'bail||required|email|unique:users,email',
                'phone' => 'bail|required|min:9|numeric',
                'password' => [
                    'required',
                    'string',
                    'min:10',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
                'status'=> 'bail|required',
                'level'=>'bail|required',
                'uploadfile'=>'bail|required|mimes:jpeg,png,jpg,gif'


            ],
            $messages
        );
        return $validator ;
    }
    public function validateFormEditUser(Request $request,$id){
        $messages = [
            'fullName.required' => 'Vui lòng nhập vào Họ và Tên',
            'fullName.min' => 'Độ dài tối thiểu là 3',
            'fullName.max' => 'Độ dài tối đa là 100',
            'birthday.required' => 'Vui lòng nhập vào năm sinh',
            'email.required' => 'Vui lòng nhập vào email',
            'email.unique'=> 'Email đã tồn tại trong hệ thống',
            'email.email' => 'Email chưa đúng định dạng',

            'password.regex' => 'Mật khẩu phải có Kí tự in hoa, kí tự chữ thường, kí tự đặt biệt và số',
            'status.required'=>'Trạng thái không được để trống ',
            'level.required' =>'Loại tài khoản không được để trống',

            'uploadfile.mimes'=>"Hình ảnh đúng định dạng",
        ];

        $validator = Validator::make(
            $request->all(),
            [
                'fullName' => 'bail|required|min:3|max:100|regex:/^[\p{L}\p{M}\s.\-]+$/u',
                'birthday' => 'required|date',
                'gender' => 'required|in:Nam,Nữ,0',
              
                'phone' => 'bail|required|min:9|numeric',
                'email' => [
                    'required',
                    Rule ::unique('users')->ignore($id),
                ],
                'status'=> 'bail|required',
                'level'=>'bail|required',
                'uploadfile'=>'bail|mimes:jpeg,png,jpg,gif'


            ],
            $messages
        );
        return $validator ;
    }
    public function validateFormAddCategoryPost(Request $request){
        $messages = [
            'name.required' => 'Vui lòng nhập vào tên danh mục',
            'name.max' => ' Tên danh mục có Độ dài tối đa là 100',
            'contents.min' => 'Độ dài tối thiểu là 10',
            'contents.required'=>'Nội dung không được để trống',
             'name.unique'=>'Đường dẫn đã tồn tại trước đó, Vui lòng đặt tên danh mục khác',

        ];

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'bail|required|unique:categories_post,name',
                'contents' => 'bail|required',
            ],
            $messages
        );
        return $validator ;
    }
    public function validateFormEditCategoryPost(Request $request,$id){
        $messages = [
            'name.required' => 'Vui lòng nhập vào tên danh mục',
            'name.max' => ' Tên danh mục có Độ dài tối đa là 100',
            'contents.min' => 'Độ dài tối thiểu là 10',
            'contents.required'=>'Nội dung không được để trống',
            'name.unique'=>'Đường dẫn đã tồn tại trước đó, Vui lòng đặt tên danh mục khác',
        ];

        $validator = Validator::make(
            $request->all(),    
            [
                'name' => [ 
                    'required',
                      Rule ::unique('categories_post')->ignore($id),
                ],
                'contents' => 'bail|required',
            ],
            $messages
        );
        return $validator ;
    }
    public function validateFormAddCategoryProduct(Request $request){
        $messages = [
            'name.required' => 'Vui lòng nhập vào tên danh mục',
            'name.max' => ' Tên danh mục có Độ dài tối đa là 100',
            'contents.min' => 'Độ dài tối thiểu là 10',
            'contents.required'=>'Nội dung không được để trống',
             'name.unique'=>'Đường dẫn đã tồn tại trước đó, Vui lòng đặt tên danh mục khác',

        ];

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'bail|required|unique:categories_product,name',
                'contents' => 'bail|required',
            
            ],
            $messages
        );
        return $validator ;
    }
    
    public function validateFormEditCategoryProduct(Request $request,$id){
        $messages = [
            'name.required' => 'Vui lòng nhập vào tên danh mục',
            'name.max' => ' Tên danh mục có Độ dài tối đa là 100',
            'contents.min' => 'Độ dài tối thiểu là 10',
            'contents.required'=>'Nội dung không được để trống',
            'name.unique'=>'Đường dẫn đã tồn tại trước đó, Vui lòng đặt tên danh mục khác',
        ];

        $validator = Validator::make(
            $request->all(),    
            [
                'name' => [ 
                    'required',
                      Rule ::unique('categories_product')->ignore($id),
                ],
                'contents' => 'bail|required',
            ],
            $messages
        );
        return $validator ;
    }
  
    public function validateFormAddProducts(Request $request){
        $messages = [
            'name.required' => 'Vui lòng nhập vào tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã bị trùng khớp với sản phẩm khác !',
            'describe.required' => ' Mô tả không được để trống',
            'content.required'=>'Nội dung không được để trống',
            'slug.required'=>'Đường dẫn không được để trống',
            'slug.same'=>'Đường dẫn phải khớp với tên danh mục',
            'uploadfile.required'=>'Hình ảnh không được để trống',
            'category.required'=>'Loại không được bỏ trống',
            'price.required'=>'Giá không được để trống',
            'price.numeric'=>'Giá phải là số',
            'price.min'=>'Giá phải lớn hơn 0'

        ];

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:products,name',
                'content' => 'required',
                'describe' => 'required',
                'uploadfile' => 'required',
                'category'=>'required',
                'price'=>'bail|required|min:0',


            ],
            $messages
        );
        return $validator ;
    }
    public function validateFormEditProducts(Request $request){
        $messages = [
            'name.required' => 'Vui lòng nhập vào tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã bị trùng khớp với sản phẩm khác !',
            'describe.required' => ' Mô tả không được để trống',
            'content.required'=>'Nội dung không được để trống',
            'slug.required'=>'Đường dẫn không được để trống',
            'slug.same'=>'Đường dẫn phải khớp với tên danh mục',

            'date_input'=>'Ngày tháng năm không được để trống',
            'category.required'=>'Loại không được bỏ trống',
            'price.required'=>'Giá không được để trống',
            'price.numeric'=>'Giá phải là số',
            'price.min'=>'Giá phải lớn hơn 0'

        ];

        $validator = Validator::make(
            $request->all(),
            [   
                'name' => [ 
                    'required',
                      Rule ::unique('products')->ignore((int)$request->id),
                ],
                'content' => 'required',
                'describe' => 'required',

                'date_input'=>'required',
                'category'=>'required',
                'price'=>'bail|required|min:0',


            ],
            $messages
        );
        return $validator ;
    }
    public function validateFormAddPost(Request $request){
        $messages = [
            'main_title.required' => 'Vui lòng nhập vào tiêu đề chính',
            'main_title.unique'=>'Tên bài viết đã bị trùng khớp với bài viết trước đó !',
            'subtitles.min'=>'Nội dung tiêu đề phụ phải lớn hơn 20 kí tự',
            'main_title.min'=>'Nội dung tiêu đề chính phải lớn hơn 20 kí tự',
            'contents.min'=>'Nội dung chính phải lớn hơn 20 kí tự',
            'subtitles.required'=>' Vui lòng nhập vào tiêu đề phụ',
            'contents.required'=>'Vui lòng nhập vào nội dung',
            'uploadfile.required'=>'Hình ảnh không được để trống',
            'category.required'=>'Loại không được bỏ trống',


        ];

        $validator = Validator::make(
            $request->all(),
            [
                'main_title' => 'required|min:20||unique:posts,main_title',
                'subtitles' => 'required|min:20',
                'contents' => 'required|min:20',
                'uploadfile' => 'required',
                'category'=>'required',



            ],
            $messages
        );
        return $validator ;
    }

    public function validateFormEditPost(Request $request){
        $messages = [
            'main_title.required' => 'Vui lòng nhập vào tiêu đề chính',
            'subtitles.min'=>'Nội dung tiêu đề phụ phải lớn hơn 20 kí tự',
            'main_title.min'=>'Nội dung tiêu đề chính phải lớn hơn 20 kí tự',
            'main_title.unique'=>'Tên bài viết đã bị trùng khớp với bài viết trước đó !',
            'contents.min'=>'Nội dung chính phải lớn hơn 20 kí tự',
            'subtitles.required'=>' Vui lòng nhập vào tiêu đề phụ',
            'date_input'=>'Ngày tháng năm không được để trống',
            'contents.required'=>'Vui lòng nhập vào nội dung',
            'category.required'=>'Loại không được bỏ trống',


        ];

        $validator = Validator::make(
            $request->all(),
            [   
                'main_title' => [ 
                    'required',
                      Rule ::unique('posts')->ignore((int)$request->id),
                      'min:20'
                ],
               
                'subtitles' => 'required|min:20',
                'contents' => 'required|min:20',
                'category'=>'required',
                'date_input'=>'required',



            ],
            $messages
        );
        return $validator ;
    }
    
    public function validateFormForgetPassword(Request $request){
        $messages = [
            'email.required' => 'Vui lòng nhập vào email',
            'email.email' => 'Email chưa đúng định dạng',
            'g-recaptcha-response' =>  'Lỗi xác thực',

        ];

        $validator = Validator::make(
            $request->all(),
            [
                'g-recaptcha-response' => 'required',
                'email' => 'required|email',
            ],
            $messages
        );
        return $validator ;
    }
    public function validateFormResetPassword(Request $request){
        $messages = [
            'password.required' => 'Vui lòng nhập vào mật khẩu',
            'password.min' => 'Độ dài tối thiểu là 10',
            'password.regex' => 'Mật khẩu phải có Kí tự in hoa, kí tự chữ thường, kí tự đặt biệt và số',
            'g-recaptcha-response' =>  'Lỗi xác thực',

            'password_confirmation.required' => 'Mật khẩu nhập lại không được để trống',
            'password_confirmation.same:password' => 'Nhập lại mật khẩu chưa khớp với nhau',


        ];

        $validator = Validator::make(
            $request->all(),
            [
                'password' => [
                    'required',
                    'string',
                    'min:10',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
                'g-recaptcha-response' => 'required',
                'password_confirmation' => 'required|same:password',
            ],
            $messages
        );
        return $validator ;
    }


    public function validateFormOder(Request $request){
        $messages = [
            'name.required' => 'Tên khách hàng không được bỏ trống ! ',
            'name.min' => 'Tên khách hàng phải lớn hơn 10 ký tự',
            'name.max' => 'Tên khách hàng tối đa 255 kí tự ',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email sai định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại sai định dạng',
            'address.regex'=>'Địa chỉ không đúng định dạng', 
            'address.required'=>'Địa chỉ không được bỏ trống', 
            'note.required'=>'Ghi chú không được bỏ trống',
            'pay.required'=>'Phương thức thanh toán không được bỏ trống',

        ];

        $validator = Validator::make(
            $request->all(),
            [
                'name'=>'bail|required|min:10|max:255',
                'email'=>'bail|required|email',
                'address' => 'required',
                'phone'=>'bail|required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
                'pay'=>'required',
                'note'=>'required'
            ],
            $messages
        );
        return $validator ;
    }


    public function validateFormEditOder(Request $request){
        $messages = [
            'name.required' => 'Tên khách hàng không được bỏ trống ! ',
            'name.min' => 'Tên khách hàng phải lớn hơn 10 ký tự',
            'name.max' => 'Tên khách hàng tối đa 255 kí tự ',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email sai định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại sai định dạng',
            'address.regex'=>'Địa chỉ không đúng định dạng', 
            'address.required'=>'Địa chỉ không được bỏ trống', 
            'note.required'=>'Ghi chú không được bỏ trống',
            'pay.required'=>'Phương thức thanh toán không được bỏ trống',

        ];

        $validator = Validator::make(
            $request->all(),
            [
                'name'=>'bail|required|min:10|max:255',
                'email'=>'bail|required|email',
                'address' => 'required',
                'phone'=>'bail|required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
                'pay'=>'required',
                'note'=>'required'
            ],
            $messages
        );
        return $validator ;
    }
}
