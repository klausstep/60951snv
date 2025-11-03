<?php
echo "<h3>Проверка Autoload</h3>";

// 1. Проверим существование autoload.php
$autoloadPath = __DIR__ . '/../vendor/autoload.php';
echo "1. Autoload путь: " . $autoloadPath . "<br>";
echo "2. Файл существует: " . (file_exists($autoloadPath) ? '✅ ДА' : '❌ НЕТ') . "<br>";

if (!file_exists($autoloadPath)) {
    die("❌ Autoload.php не найден!");
}

// 2. Подключим autoload
require_once $autoloadPath;
echo "3. Autoload подключен<br>";

// 3. Проверим класс Model
echo "4. Проверка класса Model: ";
if (class_exists('Illuminate\Database\Eloquent\Model')) {
    echo "✅ Класс найден через class_exists<br>";
} else {
    echo "❌ Класс НЕ найден через class_exists<br>";
}

// 4. Попробуем создать объект
echo "5. Попытка создать объект: ";
try {
    $model = new Illuminate\Database\Eloquent\Model();
    echo "✅ Объект создан успешно<br>";
} catch (Exception $e) {
    echo "❌ Ошибка: " . $e->getMessage() . "<br>";
}

// 5. Проверим путь к Model.php
$modelPath = __DIR__ . '/../vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php';
echo "6. Путь к Model.php: " . $modelPath . "<br>";
echo "7. Model.php существует: " . (file_exists($modelPath) ? '✅ ДА' : '❌ НЕТ') . "<br>";

// 6. Прямая загрузка
if (file_exists($modelPath)) {
    require_once $modelPath;
    echo "8. Model.php загружен напрямую<br>";
    echo "9. Проверка после прямой загрузки: " . (class_exists('Illuminate\Database\Eloquent\Model') ? '✅ Найден' : '❌ Не найден') . "<br>";
}
