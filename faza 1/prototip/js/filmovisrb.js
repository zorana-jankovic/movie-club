			var imena=new Array();
			imena[0]="Avengers: Infinity War";
			imena[1]="Operation Red Sea";
			
			var tekst=new Array();
			tekst[0]="<div class='row'><div class='col-lg-4'><a href= 'avengers.html'><img class='img-fluid' src='../images/infwar.jpg'></a><br><br></div><div class='col-lg-8 projekcije'><div class='card' style='100%'><div class='card-body'><h5 class='card-title'><a href='avengers.html'>Avengers: Infinity War</a></h5><p class='card-text'>Trajanje : 210 min</p></div><ul class='list-group list-group-flush'><li class='list-group-item'>Žanr:<br>Akcija / Avantura / Fantazija</li><li class='list-group-item'>Režija:<br>Anthony Russo, Joe Russo</li><li class='list-group-item'>Uloge:<br>Robert Downey Jr., Josh Brolin, Tom Holland …</li></ul></div></div></div><br><hr style='border-top: 5px solid #ccc; background: transparent;'>";
			tekst[1]="<div class='row'><div class='col-lg-4'><a href= 'opredsea.html'><img class='img-fluid' src='../images/opredsea.jpg'></a><br><br></div><div class='col-lg-8 projekcije'><div class='card' style='100%'><div class='card-body'><h5 class='card-title'><a href='opredsea.html'>Operation Red Sea</a></h5><p class='card-text'>Trajanje : 180 min</p></div><ul class='list-group list-group-flush'><li class='list-group-item'>Žanr:<br>Akcija / Drama / Triler</li><li class='list-group-item'>Režija:<br>Dante Lam</li><li class='list-group-item'>Uloge:<br>Yi Zhang, Johnny Huang, Hai-Qing …</li></ul></div></div></div><br><hr style='border-top: 5px solid #ccc; background: transparent;'>";;
			
			function sortiraj(){
			
			}
			
			function popuni(){
				
				var kontent=document.getElementById("content");
				kontent.innerHTML="";
				var string="";
				
				for (i=0;i<tekst.length;i++){
				string = string+tekst[i];
				}
				
				kontent.innerHTML=string;
				
			}