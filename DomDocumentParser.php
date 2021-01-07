<?php
class DomDocumentParser {

	private $doc;

	public function __construct($url) {

		$options = array(
			'http'=>array('method'=>"GET",'header'=>"Content-Type: text/html;",'header'=>"User-Agent: Mozilla/5.0 (compatible; Cibzabot/1.1; +http://www.cibza.com/)", 'header' => "charset=utf-8", 'header' => "Accept-Language: tr,en;q=0.5")
			);
		$context = stream_context_create($options);

		$this->doc = new DomDocument(null, 'UTF-8');
		@$this->doc->loadHTML(mb_convert_encoding(file_get_contents($url, false, $context), 'HTML-ENTITIES', 'UTF-8'));
	}

	public function getTitleTags() {
		return $this->doc->getElementsByTagName("title");
    }
    
	public function getLinkTags() {
		return $this->doc->getElementsByTagName("link");
	}

}

function createLink($src, $url) {

	$scheme = parse_url($url)["scheme"]; // http
	$host = parse_url($url)["host"]; // www.cibza.com

	if(substr($src, 0, 2) == "//") {
		$src =  $scheme . ":" . $src;
	}
	else if(substr($src, 0, 1) == "/") {
		$src = $scheme . "://" . $host . $src;
	}
	else if(substr($src, 0, 2) == "./") {
		$src = $scheme . "://" . $host . dirname(parse_url($url)["path"]) . substr($src, 1);
	}
	else if(substr($src, 0, 3) == "../") {
		$src = $scheme . "://" . $host . "/" . $src;
	}
	else if(substr($src, 0, 5) != "https" && substr($src, 0, 4) != "http") {
		$src = $scheme . "://" . $host . "/" . $src;
	}
	return $src;
}

