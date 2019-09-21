@extends('public.admin')
@section('content')
<form class="layui-form" action="{{url('admin/category/save')}}" method="GET">
  <div class="layui-form-item">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-inline">
      <input type="text" name="cate_name" required  lay-verify="required"  autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">分类选择</label>
    <div class="layui-input-inline">
      <select name="parent_id" lay-verify="required">
        <option value="0">--顶级分类--</option>
        @foreach($info as $v)
            <option value="{{$v['cate_id']}}">{{str_repeat('——',$v['level'])}}{{$v['cate_name']}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">是否显示</label>
    <div class="layui-input-block">
      <input type="radio" name="is_show" value="1" title="是" checked>
      <input type="radio" name="is_show" value="0" title="否">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">导航栏显示</label>
    <div class="layui-input-block">
      <input type="radio" name="is_nav_show" value="1" title="是">
      <input type="radio" name="is_nav_show" value="0" title="否" checked>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

</form>
 
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
});
</script>

@endsection