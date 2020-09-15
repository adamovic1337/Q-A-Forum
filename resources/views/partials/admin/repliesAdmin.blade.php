<tr>
    <td>{{ $reply->id }}</td>
    <td>{{ $reply->body }}</td>
    <td>{{ $reply->question->title }}</td>
    <form action="{{ route('admin.reply.delete', $reply->id) }}" method="post">
        @csrf
        {{ method_field('DELETE') }}
        <td>
            <button class="btn-floating btn-small waves-effect waves-light blue darken-4" type="submit"><i class="far fa-trash-alt"></i></button>
        </td>
    </form>
</tr>

