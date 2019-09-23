<html>
    <head>
        <title>用户列表</title>
    </head>
    <body>
        &nbsp;<a href="{{url('weektest/out')}}">退出</a>
        <center>
            <table border="5" width="700" align="center">
                <form method="post" action="{{url('weektest/message')}}">
                <tr align="center">
                	<td></td>
                    <td>用户昵称</td>
                    <td>用户openid</td>
                    <td>操作</td>
                </tr>
                @foreach($data as $v)
                    <tr>
                    	<td><input type="checkbox" name="id[]" value="{{$v['openid']}}"></td>
                        <td>{{$v['nickname']}}</td>
                        <td>{{$v['openid']}}</td>
                        <td><a href="javascript:void(0)">查看详情</a></td>
                    </tr>
                @endforeach
                <br/>

                    <p>
                        消息:<input type="text" name="new">
                        <button>发送</button>
                    </p>
                </form>
            </table>
        </center>
    </body>
</html>
