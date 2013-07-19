<!DOCTYPE html>
<html>
	<head>
		<title>My Dashboard</title>
		<link rel="stylesheet" href="https://d396qusza40orc.cloudfront.net/startup%2Fcode%2Fbootstrap-combined.no-icons.min.css"> 
	</head>
	<body>
		<h1>My Dashboard</h1>
		<ul class="nav nav-tabs">
		  <li>
		    <a href="#">Home</a>
		  </li>
		  <li><a href="#">Profile</a></li>
		  <li><a href="#">Test</a></li>
		</ul>
		<table border='1' color='black'>		
			<tr>
				<th><h2>hacker news</h2></th>
				<th><h2>reddit</h2></th>
			</tr>
			<tr>
				<td>
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
				</td>
				<td valign="top">
					<ul>
						<?php

							$url = "www.reddit.com" ;
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
							$divs = $dom->getElementsByTagName('div');
							$max = $divs->length;
							for ($cnt=0; $cnt < $max; $cnt++){
								if ($divs->item($cnt)->getAttribute('id') == 'siteTable'){
									$links = $divs->item($cnt)->getElementsByTagName('a');
									$lmax = $links->length;
									
									for ($cnt=0; $cnt < $max; $cnt++){
										if ($links->item($cnt)->getAttribute('class') == 'title '){
											$nodeVal = $links->item($cnt)->nodeValue;
											$href = $links->item($cnt)->getAttribute('href');
											echo '<li> <a href=' . $href . ' target=_blank	>' . $nodeVal . '</a></li>';
										}
									}
								}
							}
						    ?>		
					</ul>
				</td>
			</tr>
		</table>	
	</body>

</html>
