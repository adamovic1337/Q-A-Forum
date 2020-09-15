<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role->name }}</td>
    <form action="{{ route('admin.user.delete', $user->id) }}" method="post">
        @csrf
        {{ method_field('DELETE') }}
        <td>
            <button class="btn-floating btn-small waves-effect waves-light blue darken-4" type="submit"><i class="far fa-trash-alt"></i></button>
        </td>
    </form>
</tr>

{{-- Request ne prepoznaje name tag iz Materialize select-a, pa je role_id = null i ako je prosledjen --}}
{{--<tr>--}}
{{--    <form action="{{ route('admin.user.update', $user->id) }}" method="post">--}}
{{--        {{ method_field('PUT') }}--}}
{{--        @csrf--}}
{{--        <td>{{ $user->id }}</td>--}}
{{--        <td>{{ $user->name }}</td>--}}
{{--        <td>{{ $user->email }}</td>--}}
{{--        <td>--}}
{{--            <select name="role_id">--}}
{{--                @foreach($roles as $role)--}}
{{--                    @if($role->id == $user->role_id)--}}
{{--                        <option selected value="{{$role->id}}">{{ $role->name }}</option>--}}
{{--                    @else--}}
{{--                        <option value="{{$role->id}}">{{ $role->name }}</option>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </td>--}}
{{--        <td><button class="btn-floating btn-small waves-effect waves-light blue darken-4" type="submit"><i class="fas fa-share"></i></button></td>--}}
{{--    </form>--}}
{{--    <form action="{{ route('admin.user.delete', $user->id) }}" method="post">--}}
{{--        @csrf--}}
{{--        {{ method_field('DELETE') }}--}}
{{--        <td>--}}
{{--            <button class="btn-floating btn-small waves-effect waves-light blue darken-4" type="submit"><i class="far fa-trash-alt"></i></button>--}}
{{--        </td>--}}
{{--    </form>--}}
{{--</tr>--}}

