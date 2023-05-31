<tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
    <td>
        @if (auth()->user()->hasRole('Admin'))
            <a class="btn btn-success"
               href="{{route("categories.edit",$category->id)}}">Edit</a>
        @endif
    </td>
    <td>
        @if (auth()->user()->hasRole('Admin'))
            <form action="{{route('categories.destroy',$category->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div>
                    <input type="submit" value="delete" class="btn btn-danger">
                </div>
            </form>
        @endif
    </td>
</tr>
