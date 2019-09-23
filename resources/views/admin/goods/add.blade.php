@extends('public.admin')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>layui.form小例子</title>
</head>

<body>

    <form class="layui-form" id="form" action="{{url('goods/doAdd')}}" method="post" enctype="multipart/form-data">
        <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->

        <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
                <input type="text" name="goods_name" id="goods_name" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">所属分类</label>
                <div class="layui-input-inline">
                    <select name="cate_id" id="cate_id">
                        <option value="">请选择分类</option>

                        @foreach($data as $v)
                        <option value="{{$v->cate_id}}"><?= str_repeat('----', $v['level'] - 1) ?>{{$v->cate_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="layui-form-item layui-col-md-offset1">
            <div class="layui-inline">
                <div class="layui-upload">
                    <div class="layui-input-inline">
          <input type="hidden" name="goods_img">
                        
                    <button type="button" class="layui-btn"  id="test1">上传图片</button>
                        <div class="layui-upload-list">
                            <img class="layui-upload-img" id="demo1" width="300">
                            <p id="demoText"></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="layui-form-item">
            <label class="layui-form-label">是否上架</label>
            <div class="layui-input-block">
                <input type="checkbox" checked="" name="is_on_sale" lay-skin="switch" lay-filter="switchTest" value="1" lay-text="是|否">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">商品货号</label>
            <div class="layui-input-inline">
                <input type="text" name="goods_sn" lay-verify="check" placeholder="请输入商品货号" class="layui-input">
                <span>如不填写货号，系统自动生成</span>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">价格</label>
            <div class="layui-input-inline">
                <input type="text" name="shop_price" lay-verify="required" placeholder="请输入商品价格" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品数量</label>
            <div class="layui-input-inline">
                <input type="text" name="goods_number" lay-verify="required" placeholder="请输入商品数量" class="layui-input">
            </div>
        </div>

        <!-- <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">请填写描述</label>
    <div class="layui-input-block">
      <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
  </div> -->
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
        <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
    </form>

    <script>
        layui.use(['form', 'jquery','upload'], function() {
            var form = layui.form,
            jquery = layui.jquery
            ,upload = layui.upload;
            //各种基于事件的操作，下面会有进一步介绍
 //普通图片上传
 var uploadInst = upload.render({
                elem: '#test1',
                url: '/goods/upload/',
                before: function(obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result) {
                        $('#demo1').attr('src', result); //图片链接（base64）
                    });
                },
                done: function(res) {
                    //如果上传失败
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }else{
                        $("input[name='goods_img']").val(res.path);
                        return layer.msg('上传成功')
                    }
                    //上传成功

                },
                error: function() {
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function() {
                        uploadInst.upload();
                    });
                }
            });

        });
    </script>

   
</body>

</html>
@endsection