<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>标签列表页</title>
</head>
<body>
    <h1>标签列表页</h1>
    <a href="{{url('wetag/fans_list')}}">此处为粉丝列表</a>
    <a href="{{url('wetag/add_tag')}}">去添加吧</a>
	<table border="1" align="center" width="500">
        <th>ID</th>
        <th>姓名</th>
        <th>旗下用户</th>
        <th>操作</th>
        <th>看看</th>
        <th>添加粉丝</th>
        @foreach($info as $v)
        <tr align="center">
            <td>{{$v['id']}}</td>
            <td>{{$v['name']}}</td>
            <td>{{$v['count']}}</td>
            <td><a href="{{url('wetag/del_tag/'.$v['id'])}}">删除</a>|<a href="{{url('wetag/update_tag')}}?name={{$v['name']}}&id={{$v['id']}}">修改</a></td>
            <td><a href="{{url('wetag/fans_tag')}}?id={{$v['id']}}">查看标签下粉丝</a></td>
            <td><a>添加粉丝</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
