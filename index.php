<!DOCTYPE html>
<html>
	<head>
		<title>My Dashboard</title>
		<script type="text/javascript" src="dashboard.js"></script>
	</head>
	<body>
		<h1>My Dashboard</h1>
		<h2>hacker news</h2>
		<ul>
			<?php

				$url = "https://news.ycombinator.com/news" ;
				//start doing curl stuff

				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);


				//actually do the cURL
				$html = curl_exec($ch);

				curl_close($ch);

				$dom = new DOMDocument();
				$dom -> loadHTML($html);
				$xpath = new DOMXPath($dom);
				$links = $dom -> getElementsByTagName("td");
				$max = $links->length;
				for ($cnt=0; $cnt < $max; $cnt++){
					$nodeVal = $links->item($cnt)->nodeValue;
					if ($links->item($cnt)->getAttribute('class') == 'title'){
						if ($links->item($cnt)->getAttribute('valign') != 'top'){
							$test = $xpath->query('*',$links->item($cnt))->item(0);
							$link = $test->getAttribute('href');							
							echo '<li>' . '<a href=' . $link . ' target=_blank	>' . $nodeVal  . '</a>' . '</li>';
						}						
					}
					else { continue; }
				}

			    ?>		
		</ul>
	</body>

</html>
