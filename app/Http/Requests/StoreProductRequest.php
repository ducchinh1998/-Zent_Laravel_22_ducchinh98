<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|min:5|max:50',
            'origin_price' => 'required|numeric|lt:sale_price',
            'quantity'     => 'required|numeric|max:50000',
            'sale_price'   => 'required|numeric',
            'content'      => 'required',
            'image[]'        => 'required|mimes:jpg,jpeg,png|max:2048',
            'image[]'        => 'image|file',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên phải chứa it nhất 5 kí tự',
            'name.max' => 'Tên dài thế',
            'origin_price.lt' =>' :attribute không được lớn hơn giá bán',
            'origin_price.required' => ':attribute không được để trống',
            'origin_price.numeric' => ':attribute phải là số',
            'quantity.required' => ':attribute không được để trống',
            'quantity.numeric' => ':attribute phải là số',
            'quantity.max' => 'Tối đa 50k sản phẩm',
            'sale_price.required' => ':attribute không được để trống',
            'sale_price.numeric' => ':attribute phải là số',
            'content.required' => ':attribute không được để trống',
            'image[].required' => 'Không được để trống',
            'image[].image' => 'Hãy chọn ảnh',
            'image[].file' => 'Hãy chọn file',
            'image[].mimes' => 'Chỉ nhận ảnh có đuôi jpg,png,jpeg',
            'image[].max' => 'Kích thước vượt quá 2MB'
        ];
    }

    public function attributes()
    {
        return [
            'sale_price' => 'Giá bán',
            'origin_price' => 'Giá gốc',
            'content' => 'Mô tả',
            'quantity' => 'Số lượng'
        ];
    }
}
