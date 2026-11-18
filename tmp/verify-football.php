<?php
require __DIR__.'/../example-app/vendor/autoload.php';
$app = require __DIR__.'/../example-app/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
foreach (['/photography/football', '/photography/football/Diemem%20JO17-2', '/photography/football/Ayaks%20FC', '/photography/football/missing-album'] as $url) {
$request = Illuminate\Http\Request::create($url);
$response = $kernel->handle($request);
$html = $response->getContent();
preg_match_all('/<img[^>]+src="([^"]*images\/football\/[^\"]+)"/', $html, $matches);
echo $url.' HTTP '.$response->getStatusCode().' images='.count($matches[1]).PHP_EOL;
if ($url === '/photography/football') { echo 'Clickable album: '.(str_contains($html, '/photography/football/Diemem%20JO17-2') ? 'yes' : 'no').PHP_EOL; }
foreach ($matches[1] as $src) {
$path = __DIR__.'/../example-app/public'.urldecode(parse_url($src, PHP_URL_PATH));
if (!is_file($path)) { echo 'MISSING IMAGE: '.$path.PHP_EOL; }
}
$kernel->terminate($request, $response);
}

