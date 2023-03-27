<?php

/**
 * Написать функцию которая с ресурса http://worldtimeapi.org
 * получает информацию о временной зоне сервера основываясь на IP
 * Функция делает запрос на ресурс http://worldtimeapi.org
 * после чего возвращает массив с даными
 * Если по каким то причинам запрос произошел с ошибкой
 * выбрасывает исключение \Exception
 *
 * @return string[]
 * @throws \Exception
 */
function getLocalTime(): array
{
    $array = [];

    $url = 'http://worldtimeapi.org/api/ip';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resul = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);


    if (200 !== $httpcode) {
        throw new \Exception('Request error');
    }

    if (curl_error($ch)) {
        throw new \Exception(curl_error($ch));
    }

    $array = json_decode($resul, true);

    return $array;
}

/**
 * Написать функция поиска факториала числа
 * Если число уже ранее было найдено то нужно его сразу вернуть,
 * Если число ранее найдено не было то перед тем как вернуть его нужно кудато записать
 * нпример в файл и после чего вернуть
 * таким образом функция будет делать вычесления только в том случае если ранее
 * факториал нужного числа не был найден
 * запись данных можете производить в файл любого формата
 *
 * @param int $num
 *
 * @return float
 */
function factorialWithCache(int $num): float
{
    $factorial = 1;
    $array = [];
    $cache = find_csv_file($num);

    if (empty($cache)) {
        for ($i = 1; $i <= $num; $i++) {
            $factorial = $factorial * $i;
            $array[$i] = $factorial;
        }

        write_file($array);
    } else {
        $factorial = $cache;
    }


    return $factorial;
}

/**
 * Write to JSON file.
 *
 * @param array $data Data.
 *
 * @return void
 */
function write_file(array $data): void
{
    $file = fopen('number.json', 'wb');

    fwrite($file, json_encode($data));

    fclose($file);
}

/**
 * Find to JSON file index.
 *
 * @param int $number Index number.
 * @return string
 */
function find_csv_file(int $number)
{
    $file = fopen('number.json', 'r');
    $fac = [];

    while (!feof($file)) {
        $fac = json_decode(fgets($file), true);
    }

    fclose($file);

    if (array_key_exists($number, $fac)) {
        return (string)$fac[$number];
    }

    return '';
}

/**
 * Дана входная строка со словами.
 * Измените порядок слов в обратном порядке.
 * Словом считается любая последовательность НЕпробельных символов.
 *
 * Входная строка не содержит пробелов в начале и конце.
 * Каждое слово отделено от другого одним пробелом.
 *
 * Использовать встроеную функцию реверса строки нельзя
 *
 * @param string $word
 *
 * @return string
 */
function reverse(string $word): string
{
    $array = explode(' ', $word);
    $array = array_reverse($array);

    $word = implode(' ', $array);

    return $word;
}

