<?php
session_start();

class Captcha {
    private $randomNumber;
    private $imageData;

    public function __construct() {
        $this->randomNumber = rand(1000, 9999);
        $_SESSION['captcha'] = $this->randomNumber;
        $this->generateImage();
    }

    private function generateImage() {
        // Создаем изображение капчи (для простоты, в этом примере просто создается текстовое изображение)
        $image = imagecreatetruecolor(100, 50);
        $bgColor = imagecolorallocate($image, 255, 255, 255);
        $textColor = imagecolorallocate($image, 0, 0, 0);
        imagefill($image, 0, 0, $bgColor);
        imagestring($image, 5, 20, 20, $this->randomNumber, $textColor);

        // Сохраняем изображение в строку base64
        ob_start();
        imagepng($image);
        $this->imageData = base64_encode(ob_get_clean());
        imagedestroy($image);
    }

    public function getRandomNumber() {
        return $this->randomNumber;
    }

    public function getImageData() {
        return $this->imageData;
    }
}

// Создаем экземпляр класса капчи
$captcha = new Captcha();

// Возвращаем случайное число и изображение капчи в формате JSON
header('Content-Type: application/json');
echo json_encode(['captcha' => $captcha->getRandomNumber(), 'image' => 'data:image/png;base64,' . $captcha->getImageData()]);
?>
