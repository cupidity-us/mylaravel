<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>标签列表页</title>
</head>
<body>
    <h1>标签列表页</h1>
    <a href="{{url('exam/fanslist')}}">此处为粉丝列表</a>
    <a href="{{url('exam/createtag')}}">去添加吧</a>
	<table border="1" align="center" width="500">
        <th>ID</th>
        <th>姓名</th>
        <th>旗下用户</th>
        <th>看看</th>
        <th>操作</th>
        <th>发送消息</th>
        @foreach($info as $v)
        <tr align="center">
            <td>{{$v['id']}}</td>
            <td>{{$v['name']}}</td>
            <td>{{$v['count']}}</td>
            <td><a href="{{url('exam/tagfans/'.$v['id'])}}">查看标签下粉丝</a></td>
            <td><a href="{{url('exam/fanslist/'.$v['id'])}}">给粉丝打标签</a></td>
            <td>群发消息</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
