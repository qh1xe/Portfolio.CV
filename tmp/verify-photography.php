<?php
require __DIR__.'/../example-app/vendor/autoload.php';
$app=require __DIR__.'/../example-app/bootstrap/app.php';
$kernel=$app->make(Illuminate\Contracts\Http\Kernel::class);
foreach(['/photography','/about','/photography/portraits','/photography/portraits/Pictures%20on%20the%20Zuidas','/photography/football','/photography/football/Ayaks%20FC'] as $url){
$request=Illuminate\Http\Request::create($url);$response=$kernel->handle($request);$html=$response->getContent();
preg_match_all('/<img[^>]+src="([^"]*images\/(?:football|portraits)\/[^\"]+)"/',$html,$matches);
echo $url.' HTTP '.$response->getStatusCode().' photos='.count($matches[1]).PHP_EOL;
foreach($matches[1] as $src){$path=__DIR__.'/../example-app/public'.urldecode(parse_url($src,PHP_URL_PATH)); if(!@getimagesize($path))echo 'INVALID: '.$path.PHP_EOL;}
if($url==='/about')echo 'Portrait link: '.(str_contains($html,'/photography/portraits')?'yes':'no').PHP_EOL;
$kernel->terminate($request,$response);
}


