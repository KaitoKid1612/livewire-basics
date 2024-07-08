<div>
    {{-- Success is as dangerous as failure. --}}
    <div>
        <h1>Danh Sách Bài Viết</h1>

        <form wire:submit.prevent="addPost">
            <input type="text" wire:model="newPostTitle" placeholder="Nhập tiêu đề bài viết">
            <button type="submit">Thêm Bài Viết</button>
        </form>

        @error('newPostTitle')
            <span class="error">{{ $message }}</span>
        @enderror

        <ul>
            @foreach ($posts as $post)
                <li>{{ $post->title }}</li>
            @endforeach
        </ul>
    </div>
</div>
