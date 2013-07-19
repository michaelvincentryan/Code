<!DOCTYPE html>
<html>
	<head>
		<title>My Dashboard</title>
		<!-- <link rel="stylesheet" href="https://d396qusza40orc.cloudfront.net/startup%2Fcode%2Fbootstrap-combined.no-icons.min.css">  -->
		<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"> 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
		<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
		     <script>
                    $('#hn a').click(function (e) {
		    e.preventDefault();
		    $(this).tab('show');
		    })

		  $('#reddit a').click(function (e) {
		    e.preventDefault();
		    $(this).tab('show');
		    })

		  $('#test a').click(function (e) {
		    e.preventDefault();
		    $(this).tab('show');
		    })
          </script>
	</head>
	<body>
		<h1>My Dashboard</h1>
		
		<ul class="nav nav-tabs">
		  <li><a href="#hn" data-toggle="tab">hn</a> </li>
		  <li><a href="#reddit" data-toggle="tab">reddit</a></li>
		  <li><a href="#test" data-toggle="tab">Test</a></li>
		</ul>
		
		<div class="tab-content">
			<div class="tab-pane active" id="hn">
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
			</div>
			
			<div class="tab-pane" id="reddit">
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
			</div>
			
		</div>
		
		<script type="text/javascript">
		    jQuery(document).ready(function ($) {
			$('#tabs').tab();
		    });
		</script>   
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
