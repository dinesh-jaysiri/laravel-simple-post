<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="border:3px solid black; padding:10px; margin:10px;">
        <h2>Edit post</h2>
        <form action="/edit-post/{{$post->id}}" method="POST" >
            @csrf
            @method('PUT')

            <input name="title" type="text" value={{$post['title']}}>
            <br>
            <textarea style="height: 200px" name="body">{{$post['body']}}</textarea>

            <button type="submit">Save</button>

        </form>
    </div>

</body>

</html>
