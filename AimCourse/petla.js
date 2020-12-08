window.onload = function(){
	var canvas = document.getElementById('qwe');
	//canvas.width=800;
	//canvas.height=600;
	var h = canvas.height;
	var w = canvas.width;
	var c = canvas.getContext('2d');
	var s = new kolko();
	//var distance = 0;
	//var kule = 0;
	var czest;
	var rect = canvas.getBoundingClientRect();
	var img = new Image();
	img.src = "tlo.png";
	var p = document.getElementById('poziomy');
	var t = document.getElementById('tekst');
	alert("Witaj w grze Aim Course. Postaraj się trafić w 25 punktów wyświetlanych na ekranie. Wybierz poziom trundości");
		
		p.addEventListener('click', function(){
			p.style.display="none";
			t.style.display="none";
			
		});

		var cos1 = document.getElementById('ehm1');
		cos1.addEventListener('click', function(){
			czest = 1000;
			odliczanie();
		});

		var cos2 = document.getElementById('ehm2');
		cos2.addEventListener('click', function(){
			czest = 800;
			odliczanie();
		});

		var cos3 = document.getElementById('ehm3');
		cos3.addEventListener('click', function(){
			czest = 600;
			odliczanie();
		});

		var cos4 = document.getElementById('ehm4');
		cos4.addEventListener('click', function(){
			czest = 500;
			odliczanie();
		});

	function wybor(){
		window.addEventListener('keydown', function(event){
			switch (event.keyCode){
				case 13:
					c.clearRect(0, 0, 800, 600);
					odliczanie();
					break;
				case 8:
					c.clearRect(0, 0, 800, 600);
					p.style.display="block";
					t.style.display="block";
					break;
			}
		});
	}

	

	canvas.addEventListener('click', function(e){
		var distance;
		distance = Math.sqrt(Math.pow(e.pageX - rect.left - s.x, 2) + Math.pow(e.pageY - rect.top - s.y, 2));
		if(distance<=s.r) {
			s.licznik++;
			c.clearRect(0, 0, 800, 600);
			c.drawImage(img,0,0,800,600,0,0,800,600);
			
		}
	});


	function odliczanie(){
		c.drawImage(img,0,0,800,600,0,0,800,600);
		var odlicz=3;
		var int1 = setInterval(function(){
			c.clearRect(0, 0, 800, 600);
			c.drawImage(img,0,0,800,600,0,0,800,600);
			c.font = '40pt Calibri';
			c.fillStyle = 'black';
			c.fillText(odlicz, 388, 312);
			odlicz--;
			if(odlicz==0){
				clearInterval(int1);
				petla();
			}
		},1000);
	}

	function petla(){
		var kulki=25;
		var int2 = setInterval(function(){
			c.clearRect(0, 0, 800, 600);
			c.drawImage(img,0,0,800,600,0,0,800,600);
			s.draw(c);
			kulki--;
			if(kulki<0){
				c.clearRect(0, 0, 800, 600);
				clearInterval(int2);
				podsumowanie();
			}
		},czest);
	}


	function podsumowanie() {
		var wynik = s.licznik/25;
		wynik = wynik * 100;
		wynik = Math.round(wynik, 0);
		s.licznik=0;
		c.font = '25pt Calibri';
		c.fillStyle = 'black';
		c.fillText("Skutecznosc: "+wynik+"%", 300, 250);
		c.font = '15pt Arial';
		c.fillText("Wcisnij BACKSPACE aby wrocic do wyboru poziomow trudnosci", 100, 300);
		c.fillText("Wcisnij ENTER aby zrestartowac", 240, 350);
		wybor();
	}


}