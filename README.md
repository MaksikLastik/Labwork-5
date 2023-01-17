# Разработка сервисов
## Цель работы
Разработаь и реализовать алгоритм внешней сортировки. Данные хранятся на сервере в массиве, сервер предоставляет доступ к отдельным элементам. Клиент, поочередно запрашивая отдельные ячейки, сортирует массив
## Пользовательский интерфейс
Пользователь должен обновить страницу, чтобы массив числовых данных, лежащих в базе данных, отсортировался.
## Структура базы данных
**id** (числовой идентификатор значения): INT, AUTO_INCREMENT
**value** (числовое значение): INT
## Результат работы
Массив до сортировки:
##### ![alt-текст](https://github.com/MaksikLastik/Labwork-5/blob/main/images%20for%20README/Массив%20до%20сортировки.png)
Массив после сортировки:
##### ![alt-текст](https://github.com/MaksikLastik/Labwork-5/blob/main/images%20for%20README/Массив%20после%20сортировки.png)
## Программный код, реализующий систему
```php
function getValue($id) {
    require("connection.php");
    $result = mysqli_query($connnect, $query = "SELECT * FROM sorting_table WHERE id = '$id'");
    $arr = mysqli_fetch_assoc($result);
    $value = $arr['value'];
    return $value;
}
```
```php
function setValue($id, $value) {
    require("connection.php");
    $result = mysqli_query($connnect, "UPDATE sorting_table SET value = '$value' WHERE id ='$id'");
}
```
```php
function bubble_sort() {
    require("connection.php");
    $result = mysqli_query($connnect, "SELECT DISTINCT * FROM sorting_table"); 
    $size = mysqli_num_rows($result);
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size - $i - 1; $j++) {
            $k = $j + 1;
            if (getValue($k) < getValue($j)) {
                $temp = getValue($k);
                setValue($k, getValue($j));
                setValue($j, $temp);
            }
        }
    }
    for ($i = 0; $i < $size; $i++) {
        echo ("Number $i, value = '" . getValue($i) . "'");
        echo "<br>";
    }
}
```
```php
$connnect = mysqli_connect("l5.lab", "root", "", "lab5");
if (!$connnect) {
    die("Database not found!");
}
```
```php
require_once "functions.php";
bubble_sort();
```
