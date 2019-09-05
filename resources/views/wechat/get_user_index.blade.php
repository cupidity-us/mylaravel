<html>
    <head>
        <title>用户列表</title>
    </head>
    <body>
        <center>
            <table border="5" width="500" align="center">
                <tr align="center">
                    <td>用户昵称</td>
                    <td>用户openid</td>
                    <td>操作</td>
                </tr>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v['nickname']}}</td>
                        <td>{{$v['openid']}}</td>
                        <td><a href="{{url('wechat/lists')}}">查看详情</a></td>
                    </tr>
                @endforeach
            </table>
        </center>
    </body>
</html>