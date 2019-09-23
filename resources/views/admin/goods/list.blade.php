@extends('public.admin')
@section('content')

<!-- 管理员列表页 -->
<div class="layui-fluid">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md12">
      <div class="layui-card">
        <div class="layui-card-body ">
          <form class="layui-form layui-col-space5">
            <div class="layui-inline layui-show-xs-block">
              <input class="layui-input" autocomplete="off" placeholder="开始日" name="start" id="start">
            </div>
            <div class="layui-inline layui-show-xs-block">
              <input class="layui-input" autocomplete="off" placeholder="截止日" name="end" id="end">
            </div>
            <div class="layui-inline layui-show-xs-block">
              <input type="text" name="goods_name" placeholder="请输入商品名" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-inline layui-show-xs-block">
              <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </div>
          </form>
        </div>
        <div class="layui-card-header">
          <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>

          <a href="{{url('goods/add')}}"><button class="layui-btn">添加</button></a>
        </div>
        <div class="layui-card-body ">
          <table class="layui-table layui-form">
            <thead>
              <tr>
                <th>
                  <input type="checkbox" name="" lay-skin="primary">
                </th>
                <th>ID</th>
                <th>商品名称</th>
                <th>商品图片</th>
                <th>分类ID</th>
                <th>是否上架</th>
                <th>商品货号</th>
                <th>商品价格</th>
                <th>商品数量</th>
            </thead>
            <tbody>
              @foreach($data as $v )
              <tr>
                <td>
                  <input type="checkbox" name="" lay-skin="primary">
                </td>
                <td>{{$v->goods_id}}</td>
                <td>{{$v->goods_name}}</td>




                <td><img src="/uploads/{{$v->goods_img}}"></td>
                <td>{{$v->cate_name}}</td>
                <td>@if($v->is_on_sale == '1')√
                  @else
                  x
                  @endif</td>
                <td>{{$v->goods_sn}}</td>
                <td>{{$v->shop_price}}</td>
                <td>{{$v->goods_number}}</td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="layui-card-body ">
          <div class="page">
            <div>
              <a class="prev" href="">&lt;&lt;</a>
              <a class="num" href="">1</a>
              <span class="current">2</span>
              <a class="num" href="">3</a>
              <a class="num" href="">489</a>
              <a class="next" href="">&gt;&gt;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script>
  layui.use(['laydate', 'form'], function() {
    var laydate = layui.laydate;
    var form = layui.form;

    //执行一个laydate实例
    laydate.render({
      elem: '#start' //指定元素
    });

    //执行一个laydate实例
    laydate.render({
      elem: '#end' //指定元素
    });
  });
</script>

</html>
@endsection