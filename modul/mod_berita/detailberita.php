    <!-- BEGIN .main-content-left -->
  <!-- Social icon -->
		<div class="main-content-left">
			<div class="content-article-title">

						
							
						</div>
						
				<!-- DETAIL BERITA -->
<?php

	$detail=mysql_query("SELECT * FROM berita,user,kategori    
                      WHERE kategori.id_kategori=berita.id_kategori
                      AND judul_seo='$_GET[judul]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d['tanggal']);
	$baca = $d['klik']+1;
	 if ($d['id_berita']!=''){

						echo"<div class='main-article-content'>
							<h2 class='article-title'>$d[judul]</h2>
";
mysql_query("UPDATE berita SET klik=$d[klik]+1 WHERE judul_seo='$_GET[judul]'");
	  if ($d['gambar']!=''){
							echo"<div class='article-photo'>
								<img src='foto_berita/$d[gambar]' width=680 class='setborder' alt='' />
							</div>
							<!-- BEGIN .article-controls -->
							<div class='article-controls'>

								<div class='date'>
									<div class='calendar-date'>$tgl</div>
									<div class='calendar-time'>
										<font>$d[jam] WIB</font>
										
									</div>
								</div>

								<div class='right-side'>

									<div>
										<a class='icon-link'><span class='icon-text'>&#128100;</span>by $d[username]</a>
										<a class='icon-link'><span class='icon-text'>&#59160;</span>Dibaca sebanyak $baca kali</a>
									</div>
								</div>

								<div class='clear-float'></div>

							<!-- END .article-controls -->
							</div>
							<!-- BEGIN .shortcode-content -->
							<div class='shortcode-content'>
							$d[isi_berita]
							<!-- END .shortcode-content -->
							</div>";
							  
	
							
mysql_query("UPDATE kategori SET diklik=$d[diklik]+1 where id_kategori='$d[id_kategori]'");


	}else{
							echo"<div class='article-photo'>
								<img src='images/imago.jpg' width=680 height=250  border=10 class='setborder' alt='' />
							</div>
							
							<!-- BEGIN .article-controls -->
							<div class='article-controls'>

								<div class='date'>
									<div class='calendar-date'>$tgl</div>
									<div class='calendar-time'>
										<font>$d[jam] WIB</font>
										
									</div>
								</div>

								<div class='right-side'>
									<div class='colored'>
										<a href='javascript:printArticle();' class='icon-link'><span class='icon-text'>&#59158;</span>Print This Article</a>
										<a href='kategori-$d[id_kategori]-$d[kategori_seo].html' class='icon-link'><span class='icon-text'>&#59196;</span>$d[nama_kategori]</a>
									</div>

									<div>
										<a href='$d[google_link]' target='_blank' class='icon-link'><span class='icon-text'>&#128100;</span>by $d[nama_lengkap]</a>
										<a href='#' class='icon-link'><span class='icon-text'>&#59160;</span>$baca comments</a>
									</div>
								</div>

								<div class='clear-float'></div>

							<!-- END .article-controls -->
							</div>
							<!-- BEGIN .shortcode-content -->
							<div class='shortcode-content'>
							$d[isi_berita]
							<!-- END .shortcode-content -->
							</div>
							";
							}


  ?>
					</div>
						<!-- BEGIN .main-nosplit -->
<?php										
}?>
					<!-- END .main-content-left -->
					</div>