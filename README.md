# Hướng dẫn Livewire trong Laravel
<details>
<summary><strong>Bài 01: Cài đặt và cấu hình Livewire</strong></summary>

## Bước 1: Cài đặt Livewire

Trước tiên, bạn cần cài đặt Livewire trong dự án Laravel của bạn. Mở terminal và chạy lệnh sau để cài đặt Livewire thông qua Composer:

```bash
composer require livewire/livewire
```
## Bước 2: Thêm Livewire vào giao diện
Sau khi cài đặt xong Livewire, bạn cần thêm các scripts và styles của Livewire vào file layout chính của bạn. Mở file ``` resources/views/layouts/app.blade.php ``` (hoặc file layout chính mà bạn sử dụng) và thêm các dòng sau:
```bash
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head Content -->
    @livewireStyles
</head>
<body>
    <!-- Body Content -->
    @livewireScripts
</body>
</html>
```
## Bước 3: Tạo một component Livewire đầu tiên
Tiếp theo, hãy tạo một component Livewire. Bạn có thể sử dụng lệnh Artisan để tạo component. Giả sử bạn muốn tạo một component có tên là ``Counter`` :
``php artisan make:livewire Counter
``
Lệnh này sẽ tạo ra hai file:
1. `app/Http/Livewire/Counter.php` - Class PHP chứa logic của component
2. ``resources/views/livewire/counter.blade.php`` - View Blade chứa giao diện của component.
## Bước 4: Hiển thị component Livewire trong view
Bây giờ bạn có thể hiển thị component Livewire trong một view Blade. Mở file ``resources/views/welcome.blade.php`` (hoặc một view khác mà bạn muốn) và thêm dòng sau:
``<livewire:counter />``
## Bước 5: Thêm logic vào component
Bây giờ, hãy mở file ``app/Http/Livewire/Counter.php`` và thêm logic đơn giản để tăng một bộ đếm. Dưới đây là ví dụ về nội dung file ``Counter.php:``
````bash

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
````
Và đây là nội dung file ``resources/views/livewire/counter.blade.php``:
````
<div>
    <h1>{{ $count }}</h1>
    <button wire:click="increment">Increment</button>
</div>
````
</details>
<details>
<summary><strong>Bài 02: Component trong Laravel Livewire - Phần 1</strong></summary>

### 1. Tạo Component Livewire
- Trước tiên, bạn sẽ tạo một component mới để hiển thị danh sách các bài viết. Bạn có thể tạo component bằng cách sử dụng lệnh Artisan:
    ````bash
  php artisan make:livewire post-list
    ````
- Lệnh này sẽ tạo ra hai file: ``PostList.php`` trong ``app/Http/Livewire`` và ``post-list.blade.php`` trong ``resources/views/livewire.``
### 2. Cấu trúc Component Livewire
File PostList.php:
````bash
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostList extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
````
#### Giải thích:
- mount method: Phương thức này được gọi khi component được khởi tạo. Đây là nơi bạn có thể khởi tạo các thuộc tính hoặc thực hiện các tác vụ như truy vấn dữ liệu.
- render method: Phương thức này trả về view của component. Trong trường hợp này, nó trả về ``livewire.post-list``.
File post-list.blade.php:
````bash
<div>
    <h1>Danh Sách Bài Viết</h1>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
</div>
````
#### Giải thích:
- Blade template này sẽ hiển thị tiêu đề của tất cả các bài viết trong cơ sở dữ liệu.
### 3. Thêm Component vào Trang Blade
Bạn có thể thêm component này vào bất kỳ trang Blade nào. Ví dụ, bạn có thể thêm vào trang ``resources/views/welcome.blade.php``:
````bash
@extends('layouts.app')

@section('content')
    @livewire('post-list')
@endsection
````
### 4. Tương Tác Với Component
Bây giờ bạn sẽ thêm một tính năng cho phép người dùng thêm một bài viết mới.
File PostList.php:
Thêm thuộc tính và phương thức mới để xử lý việc thêm bài viết:
````bash
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostList extends Component
{
    public $posts;
    public $newPostTitle;

    public function mount()
    {
        $this->posts = Post::all();
    }

    public function addPost()
    {
        $this->validate([
            'newPostTitle' => 'required|min:3',
        ]);

        Post::create(['title' => $this->newPostTitle]);
        $this->posts = Post::all();
        $this->newPostTitle = '';
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
````
File ``post-list.blade.php``:
Cập nhật Blade template để bao gồm một form thêm bài viết mới:
````bash
<div>
    <h1>Danh Sách Bài Viết</h1>

    <form wire:submit.prevent="addPost">
        <input type="text" wire:model="newPostTitle" placeholder="Nhập tiêu đề bài viết">
        <button type="submit">Thêm Bài Viết</button>
    </form>

    @error('newPostTitle') <span class="error">{{ $message }}</span> @enderror

    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
</div>
````
#### Giải thích:
- wire:model: Liên kết dữ liệu của input với thuộc tính $newPostTitle.
- ``wire:submit.prevent="addPost"``: Ngăn chặn việc submit form truyền thống và gọi phương thức addPost thay vào đó.
