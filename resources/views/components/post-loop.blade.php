<tr>
    <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" id="" value="{{$post->id}}"></td>
    <td>{{$post->id}}</td>
    <td>{{$post->user->name}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->body}}</td>
    <td>{{$post->category?->name}}</td>
    <td><img height="75" src="{{asset('storage/'.$post->path)}}" alt=""></td>
    <td>
        @if (auth()->user()->hasRole('Admin'))
            <a class="btn btn-success" href="{{route("posts.edit",$post->id)}}">Edit</a>
        @endif
    </td>
    <td>
        @if (auth()->user()->hasRole('Admin'))
            <form action="/posts/{{$post->id}}" method="post">
                {{ csrf_field() }}
                @method('DELETE')
                <div>
                    <input type="submit" value="delete" class="btn btn-danger">
                </div>
            </form>
        @endif
    </td>
</tr>
