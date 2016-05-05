<!-- BEGIN .header -->
			<div class="header">
				
				<?php
				$identitas = mysql_query("select * from identitas WHERE id_identitas=1");
  				$i = mysql_fetch_array($identitas); 
				echo"<!-- BEGIN .header-very-top -->
				<div class='header-very-top'>
					<div class='wrapper'>
						
						<div class='left'>
							<h3>$i[pembuka]</h3>
						</div>

						<div class='clear-float'></div>
						
					</div>
				<!-- END .header-very-top -->
				</div>

				<!-- BEGIN .header-middle -->
				<div class='header-middle'>
					<div class='wrapper'>

						
						<div class='logo-image'>
								<img class='logo' src='images/$i[gambar]' alt='' />
						</div>

						<div class='clear-float'></div>
						
					</div>
				<!-- END .header-middle -->
				</div>";
				?>
				<!-- BEGIN .header-menu -->
				<div class="header-menu thisisfixed">
					<div class="wrapper">
                    <ul class="main-menu">
						 <?php
							include "menu.php"; 
							?>
                            </ul>
						
						<div class="right menu-search">
							<form action="hasil-pencarian.html" method="post">
								<input type="text" placeholder="Cari " value="" name="kata" />
								<input type="submit" class="search-button" value="&nbsp;" />
							</form>
						</div>
						
						<div class="clear-float"></div>

					</div>
				<!-- END .header-menu -->
				</div>
			<!-- END .header -->
			</div>
			