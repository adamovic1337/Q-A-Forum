<li class="collection-item">
    <ul class="question">
        <li class="question-first" data-id="{{ $question->id }}"><span class="deep-orange-text text-darken-3">#</span><a href="{{ route('question.replies', $question->slug) }}">{{$question->title}}</a></li>
        <li class="question-item">{{ $question->replies()->count() }}</li>
        <li class="question-item">{{ $question->created_at->diffForHumans() }}</li>
    </ul>
</li>
