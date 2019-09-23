@extends('public.admin')
@section('content')
<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>分类名称</th>
      <th>是否显示</th>
      <th>导航栏显示</th>
      <th>编辑</th>
    </tr> 
  </thead>
  <tbody>
  @foreach($info as $v)
    <tr>
      <td>{{$v['cate_id']}}</td>
      <td>{{str_repeat('——',$v['level'])}}{{$v['cate_name']}}</td>
      <td>
        @if($v['is_show'] == '1')
            √
        @else
            ×
        @endif    
     </td> 
      <td>
      @if($v['is_nav_show'] == '1')
            √
        @else
            ×
        @endif   
      </td>
      <td>
                <a title="编辑"  onclick="xadmin.open('编辑','admin-edit.html')" href="javascript:;">
                    <i class="layui-icon">&#xe642;</i>
                </a>
                <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                    <i class="layui-icon">&#xe640;</i>
                </a>
      </td>
    </tr>
   @endforeach 
  </tbody>
</table>
@endsection