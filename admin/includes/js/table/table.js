function Table(seats){
		for (var i=1 ; i<=seats ; i++){
			this.seat[i]=new Seat(i);
		}