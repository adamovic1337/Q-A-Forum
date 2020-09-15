<tr>
    <td>{{ $question->id }}</td>
    <td>{{ $question->title }}</td>
    <td>{{ $question->body }}</td>
    <form action="{{ route('admin.question.delete', $question->slug) }}" method="post">
        @csrf
        {{ method_field('DELETE') }}
        <td>
            <button class="btn-floating btn-small waves-effect waves-light blue darken-4" type="submit"><i class="far fa-trash-alt"></i></button>
        </td>
    </form>
</tr>
