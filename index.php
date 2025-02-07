$tasin = $_GET['msg'];

$apiUrl = "http://pass-gpt.nowtechai.com/api/v1/pass";
$headers = [
    "Key: 6d/ecevwFuxjbXqL6yFiPI+zec9Z3S7H9Ah8Uwnw38LAIQXBTQF4fzf/k+sOpkc4YPsC5jdUg++qNsTQGaSomQ==",
    "TimeStamps: 1738318857439",
    "Accept: application/json",
    "Accept-Charset: UTF-8",
    "User-Agent: Ktor client",
    "Content-Type: application/json",
    "Content-Length: 135",
    "Host: pass-gpt.nowtechai.com",
    "Connection: Keep-Alive",
    "Accept-Encoding: gzip"
];

$body = json_encode([
    "contents" => [
        [
            "role" => "system",
            "content" => "You're a girlfriend model, that trained by chatGPT."
        ],
        [
            "role" => "user",
            "content" => $tasin
        ]
    ]
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

$response = curl_exec($ch);
$error = curl_error($ch);

curl_close($ch);

if ($error) {
    echo "Error: $error";
} else {
    echo $response;
}
?>
