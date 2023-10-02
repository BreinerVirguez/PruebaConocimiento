<!DOCTYPE html>
<html>
<head>
    <title>Traductor de Código Morse</title>
</head>
<body>
    <h1>Traductor de Código Morse</h1>

    <form method="post" action="">
        <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." rows="5" cols="40"></textarea><br>
        <input type="radio" name="traduccion" value="texto_a_morse"> Texto a Morse
        <input type="radio" name="traduccion" value="morse_a_texto"> Morse a Texto
        <br>
        <input type="submit" value="Traducir">
    </form>

    <?php
    // Define un diccionario que mapea letras, números y espacios a código Morse
    $morseDict = [
        "A" => ".-", "B" => "-...", "C" => "-.-.", "D" => "-..", "E" => ".",
        "F" => "..-.", "G" => "--.", "H" => "....", "I" => "..", "J" => ".---",
        "K" => "-.-", "L" => ".-..", "M" => "--", "N" => "-.", "O" => "---",
        "P" => ".--.", "Q" => "--.-", "R" => ".-.", "S" => "...", "T" => "-",
        "U" => "..-", "V" => "...-", "W" => ".--", "X" => "-..-", "Y" => "-.--",
        "Z" => "--..", "0" => "-----", "1" => ".----", "2" => "..---",
        "3" => "...--", "4" => "....-", "5" => ".....", "6" => "-....",
        "7" => "--...", "8" => "---..", "9" => "----.",
        " " => "/" // Usamos "/" para representar un espacio en el código Morse
    ];

    // Función para traducir un mensaje en código Morse a texto
    function morseToText($morseCode, $morseDict) {
        $words = explode(" / ", $morseCode);
        $text = "";

        foreach ($words as $word) {
            $letters = explode(" ", $word);
            foreach ($letters as $letter) {
                if ($letter != "") {
                    $char = array_search($letter, $morseDict);
                    if ($char !== false) {
                        $text .= $char;
                    } else {
                        // Agregar manejo de caracteres no válidos si es necesario
                    }
                }
            }
            $text .= " ";
        }

        return trim($text);
    }

    // Función para traducir un texto a código Morse
    function textToMorse($text, $morseDict) {
        $text = strtoupper($text);
        $morseCode = "";

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            if ($char == " ") {
                $morseCode .= " / ";
            } elseif (array_key_exists($char, $morseDict)) {
                $morseCode .= $morseDict[$char] . " ";
            } else {
                // Agregar manejo de caracteres no válidos si es necesario
            }
        }

        return trim($morseCode);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["mensaje"]) && isset($_POST["traduccion"])) {
            $mensaje = $_POST["mensaje"];
            $traduccion = $_POST["traduccion"];

            if ($traduccion == "texto_a_morse") {
                $morseMessage = textToMorse($mensaje, $morseDict);
                echo "<p>Texto a Morse: $morseMessage</p>";
            } elseif ($traduccion == "morse_a_texto") {
                $textMessage = morseToText($mensaje, $morseDict);
                echo "<p>Morse a Texto: $textMessage</p>";
            }
        }
    }
    ?>

</body>
</html>
