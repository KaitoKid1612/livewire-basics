# Hướng dẫn Livewire trong Laravel
<details>
<summary><strong>Bài 1: Cài đặt và cấu hình Livewire</strong></summary>

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
