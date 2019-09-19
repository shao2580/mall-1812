@extends('layouts.shop')
@section('content')
    <div class="wrapper">
        <!--左侧导航开始-->
        @include('layouts.left')
                <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="content">
                <!-- 右侧内容框架，更改从这里开始 -->

                <h1 align="center">添加品牌</h1>
                <div class="panel admin-panel">
        <div class="body-content">
            <div  class="form-x">
                <div class="form-group">
                    <div class="label">
                        <label>品牌名称：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50"  name="s_name" id="s_name" />
                        <div class="tips"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="label">
                        <label>品牌分类：</label>
                    </div>
                    <div class="field">
                        <select class="form-control" name="n_id" id="lan_id">
                            <option value="0">请选择品牌</option>
                            @foreach($info as $v)
                            <option value="{{$v->lan_id}}">{{$v->lan_title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="desc">
                    <label>描述：</label>
                    <div id="editor">
                    </div>
                </div>

                <div class="form-group">
                    <div class="label">
                        <label for="exampleInputPassword1">是否展示</label>
                    </div>
                    <div class="field">
                        <input type="radio" name="status" id="status" value="1" checked> 是
                        <input type="radio" name="status" id="status" value="2"> 否
                    </div>
                </div>

                <div class="form-group">
                    <div class="label">
                        <label></label>
                    </div>
                    <div class="field">
                        <button class="button bg-main icon-check-square-o" type="button" id="btn"> 添加品牌</button>
                        <button class="button bg-main icon-check-square-o" type="reset"> 重置</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </body>

    <!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->
    <script type="text/javascript" src="/Editor/release/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
    </script>
<script src="/js/juquey-3.2.1.mis.js"></script>
    <script>
        $(function(){
            $("#btn").click(function(){
                var s_name = $("#s_name").val();
                // var desc = $("#desc").val();
                var lan_id = $("#lan_id :selected").prop('value');
                var status = $("#status:checked").prop('value');
                var desc = $(".desc").children("div").text();
                // console.log(desc);return ;

                $.post(
                    "/fenlan/doadd",
                    {s_name:s_name,lan_id:lan_id,status:status,desc:desc},
                    function(res){
                        //console.log(res);return ;
                        if(res.code==1){
                            alert(res.msg);
                            location.href="/fenlan/lists";
                        }
                    },'json'
                );
            })
        })
    </script>
@endsection