<?php
    require "db.php";
    // projenizi hangi klasörde tutuyorsanız aşşağıdaki redirect kısmını silin ve / buna deönüştürün
    $url = str_replace('/redirect/','',$_SERVER['REQUEST_URI']);
    $query = $db->from('url')
                ->where('short',$url)
                ->first();
    
    if (!$query) {
        die('Redirect Not Found!');
    }
    // DomDocument sınıfını require ediyoruz.
    require 'DomDocumentParser.php';
    // Gideceğimiz adresi belirtiyoruz.
    $url = $query['url'];
    $parser = new DomDocumentParser($url);

    // Parçalamk istediğimiz kodlar
    $titleArray = $parser->getTitleTags();
    $linksArray = $parser->getLinkTags();

    foreach ($titleArray as $key) {
        $title = $key->nodeValue . '<br>';
    }

    foreach ($linksArray as $key) {
        if ($key->getAttribute('rel') == 'icon') {
        $img = '<img src="'. createLink($key->getAttribute('href'),$url) .'" widht="32" height="32"><br>';
        }
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönlendirme</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="mx-auto" style="width: 500px;margin-top:50px;">
        <div class="card" style="padding:20px;border-radius:18px">
            <input id="short" value="<?=$query['short']?>" type="hidden">
            <div class="card-body">
            
            <span style="margin-left: 10px;font-family:monospace;font-weight:bold;font-size:18px;"><?=$img?> <?=$title?></span>
                <div style="margin-top:15px;text-align:center;font-family:monospace;font-weight:bold;font-size:32px;">
                    <p id="second">5</p>
                    <p>SN</p>
                    <p class="a">
                        <?php
                            if(strlen($query['url']) > 20){
                                echo mb_substr($query['url'],0,20,'UTF-8') . '...';
                            }else{
                                echo $query['url'];
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="app.js"></script>
</body>
</html>
<?php
    $db = null;
?>