<?php

namespace App\Classes;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class ImageSaver
{

    /**
     * Сохраняет изображение при создании или редактировании категории,
     * бренда или товара; создает два уменьшенных изображения.
     *
     * @param \Illuminate\Http\Request $request — объект HTTP-запроса
     * @param \App\Models\Item $item — модель категории, бренда или товара
     * @param string $dir — директория, куда будем сохранять изображение
     * @return string|null — имя файла изображения для сохранения в БД
     */
    public function upload($request, $product, $dir)
    {
        $name = $product->image ?? null;
        if ($product && $request->remove) { // если надо удалить изображение
            $this->remove($product, $dir);
            $name = null;
        }
        $source = $request->file('image');
        if ($source) { // если было загружено изображение
            // перед загрузкой нового изображения удаляем старое
            if ($product && $product->image) {
                $this->remove($product, $dir);
            }
            $ext = $source->extension();
            // сохраняем загруженное изображение без всяких изменений
            $path = $source->store('images/' . $dir . '/source');
            $path = Storage::disk('public')->path($path); // абсолютный путь
            $name = basename($path); // имя файла
            // создаем уменьшенное изображение 600x300px, качество 100%
            $dst = 'images/' . $dir . '/real/';
            $this->resize($path, $dst, 600, 300, $ext);
            // создаем уменьшенное изображение 300x150px, качество 100%
            $dst = 'images/' . $dir . '/thumb/';
            $this->resize($path, $dst, 300, 150, $ext);
        }
        return $name;
    }

    /**
     * Создает уменьшенную копию изображения
     *
     * @param string $src — путь к исходному изображению
     * @param string $dst — куда сохранять уменьшенное
     * @param integer $width — ширина в пикселях
     * @param integer $height — высота в пикселях
     * @param string $ext — расширение уменьшенного
     */
    private function resize($src, $dst, $width, $height, $ext)
    {
        // создаем уменьшенное изображение width x height, качество 100%

        $image = Image::make($src)
            ->heighten($height)
            ->resizeCanvas($width, $height, 'center', false, 'eeeeee')
            ->encode($ext, 100);
        // сохраняем это изображение под тем же именем, что исходное
        $name = basename($src);

        // dd($image);
        Storage::disk('public')->put($dst . $name, $image);
        $image->destroy();
    }

    /**
     * Удаляет изображение при удалении категории, бренда или товара
     *
     * @param \App\Models\Item $item — модель категории, бренда или товара
     * @param string $dir — директория, в которой находится изображение
     */
    public function remove($product, $dir)
    {
        $old = $product->image;
        if ($old) {
            Storage::disk('public')->delete('images/' . $dir . '/source/' . $old);
            Storage::disk('public')->delete('images/' . $dir . '/real/' . $old);
            Storage::disk('public')->delete('images/' . $dir . '/thumb/' . $old);
        }
    }
}
