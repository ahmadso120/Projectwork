<div class="main-content-left">
   <div class="shortcode-content">
     <h2 id="tabs">Informasi PSB</h2>
        <div class="tab-block">
        <div class="tabs">
        <ul>
        <?php
		$info = mysql_query("SELECT * FROM info  ORDER BY id_info LIMIT 1");
		 while($i=mysql_fetch_array($info)){
		 echo"<li class='active'><a href='#'>$i[nama_tab]</a></li>";
		 }
		 $infoaktif = mysql_query("SELECT * FROM info  ORDER BY id_info LIMIT 1,4");
		 while($a=mysql_fetch_array($infoaktif)){
		 echo"<li><a href='#'>$a[nama_tab]</a></li>";
		 }?>        	
            
         </ul>
        <div class="clear-float"></div>
       </div>
  	<div class="tab-content">
    <ul>
     <?php
		$info = mysql_query("SELECT * FROM info  ORDER BY id_info LIMIT 1");
		 while($i=mysql_fetch_array($info)){
		 echo"<li class='active'>
        	  <h3>$i[judul]</h3>";
			  if ($i['gambar']!=''){
			  echo"<p><img src='foto_statis/$i[gambar]'></p>";}
			  echo"<p>$i[isi_info]</p>
       		  </li>";
		 }
		 		 $infoaktif = mysql_query("SELECT * FROM info  ORDER BY id_info LIMIT 1,4");
		 while($a=mysql_fetch_array($infoaktif)){
		 		 echo" <li>
        <h3>$a[judul]</h3>";
			  if ($a['gambar']!=''){
			  echo"<p><img src='foto_statis/$a[gambar]'></p>";}
			  echo"
		<p>$a[isi_info]</p>
        </li>";
		 }
		?>
		</ul>
        </div>
       </div>
    </div>
</div>
   

					
