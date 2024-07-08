<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div>
        <h2>Comments for Post ID: {{ $postId }}</h2>
        <ul>
            @foreach($comments as $comment)
                <li>{{ $comment['content'] }}</li>
            @endforeach
        </ul>
    </div>
</div>
