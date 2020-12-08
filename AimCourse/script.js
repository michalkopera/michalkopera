function kolko() {
	this.r = 20;
	this.licznik=0;
	

	this.draw = function(c){
		this.x = Math.floor(Math.random()*740+30);
		this.y = Math.floor(Math.random()*540+30);
		c.beginPath();
		c.arc(this.x, this.y, this.r, 0, 2*Math.PI, false)
		c.fillStyle = "red";
		c.fill();
		
	}	

}
	

