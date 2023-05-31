<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->created_at}}</td>
    <td><img height="100" src="images/{{$user->path}}" alt=""></td>
    <td>
        @if (auth()->user()->hasRole('Admin'))
            <a class="btn btn-success" href="{{route("users.edit",$user->id)}}">Edit</a>
        @endif
    </td>
    <td>
        @if (auth()->user()->hasRole('Admin'))
            <form action="{{route('users.destroy',$user->id)}}" method="post">
                {{ csrf_field() }}
                @method('DELETE')
                <div>
                    <input type="submit" value="delete" class="btn btn-danger">
                </div>
            </form>
        @endif
    </td>
</tr>
