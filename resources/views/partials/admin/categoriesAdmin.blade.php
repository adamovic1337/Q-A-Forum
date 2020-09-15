<tr>
    <form action="{{ route('admin.category.update', $category->slug) }}" method="post">
        {{ method_field('PUT') }}
        @csrf
        <td>{{ $category->id }}</td>
        <td colspan="2"><input type="text" name="name" value="{{ $category->name }}"></td>
        <td>{{ $category->slug }}</td>
        <td><button class="btn-floating btn-small waves-effect waves-light blue darken-4" type="submit"><i class="fas fa-share"></i></button></td>
    </form>
    <form action="{{ route('admin.category.delete', $category->slug) }}" method="post">
        @csrf
        {{ method_field('DELETE') }}
        <td><button class="btn-floating btn-small waves-effect waves-light blue darken-4" type="submit"><i class="far fa-trash-alt"></i></button></td>
    </form>
</tr>
