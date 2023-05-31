<tr>
    <td>{{$role->id}}</td>
    <td>{{$role->name}}</td>
    <td>{{$role->slug}}</td>
    <td>
        @if (auth()->user()->hasRole('Admin'))
            <a class="btn btn-success" href="{{route("roles.edit",$role->id)}}">Update</a>
        @endif
    </td>
    <td>
        @if (auth()->user()->hasRole('Admin'))
            <form action="{{route('roles.destroy',$role->id)}}" method="post">
                {{ csrf_field() }}
                @method('DELETE')
                <div>
                    <input type="submit" value="delete" class="btn btn-danger">
                </div>
            </form>
        @endif
    </td>
</tr>
