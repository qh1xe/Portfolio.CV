$projectPath = $PSScriptRoot
$phpPath = Join-Path $env:LOCALAPPDATA 'PortfolioCV\PHP\php.exe'
if (-not (Test-Path -LiteralPath $phpPath -PathType Leaf)) {
    $phpPath = (Get-Command php -ErrorAction Stop).Source
}
$listener = Get-NetTCPConnection -LocalPort 8000 -State Listen -ErrorAction SilentlyContinue
if (-not $listener) {
    Start-Process -FilePath $phpPath -ArgumentList @('artisan', 'serve', '--host=127.0.0.1', '--port=8000') -WorkingDirectory $projectPath -WindowStyle Hidden
}
Start-Process 'http://127.0.0.1:8000'
