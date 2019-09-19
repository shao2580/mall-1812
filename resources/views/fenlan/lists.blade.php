@extends('layouts.shop')
@section('content')
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('layouts.left')


                <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="content">
                <!-- 右侧内容框架，更改从这里开始 -->

<form action="">
    <input type="text" class="input w50" name="s"  placeholder="输入名称进行搜索" value="{{$s}}"/>
    <input type="submit" class="button bg-main icon-check-square-o" value="搜索">
</form>

<table class="layui-table" align="center" >
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>ID</th>
        <th>品牌名称</th>
        <th>所属品牌</th>
        <th>内容</th>
        <th>创建时间</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    @foreach ($res as $v)
    <tbody>
    <tr>
        <td>{{$v->s_id}}</td>
        <td>{{$v->s_name}}</td>
        <td>{{$v->lan_title}}</td>
        <td width="250">{{$v->desc}}</td>
        <td>{{date("Y-m-d h:i:s" , $v->create_time)}}</td>
        <td>@if($v->status ==1)
            显示
                @elseif($v->status==2)
            不显示
                @endif
        </td>
        <td><a href="javascript:;" class="del" s_id='{{$v->s_id}}'>删除</a>||<a href="/fenlan/update?id={{$v->s_id}}">修改</a></td>
    </tr>
    </tbody>
    @endforeach

    <thead>
    <tr>
        <td colspan="7" style="padding-left: 40%">{{$res->appends(['s' => $s ])->links()}}</td>
    </tr>
    </thead>

</table>

<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script>
  $(function(){
      $(".del").click(function(){
          var _this=$(this);
          var s_id=_this.attr('s_id');
          //console.log(n_id);
          $.post(
              "/fenlan/del",
              {s_id:s_id},
              function(res){
                  // console.log(res);
                  if(res.code==1 ){
                      var f=confirm("确定要删除吗？");
                      if(f == true){
                          location.href='/fenlan/lists';
                      }
                  }else{
                      alert(res.msg);
                  }
              },'json'
          );
      })
  })
</script>
@endsection