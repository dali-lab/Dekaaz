int diameter;
float radius;

Dot[] dots;

// Dekaaz have 7 possible connections (1 in the first row, 2 in the second, 4 in the third).
// The boolean at each index shows whether that connection should be drawn.
// Connections are calculated from word and syllable information in the Parse database.


//boolean[] connections = {true, false, true, true, true, false, false};
boolean[] connections = {true, true, true, true, true, true, true};
// randomize array
/*
for (int i = 0; i < 7; i++) {
    float randboolf = random(1);
    if (randboolf < 0.5) {
        connections[i] = false;
    }
}
*/
for (int i = 0; i < 7; i++) {
    connections[i] = random(1) < 0.5;
}

class Dot {
	float x, y;

	Dot (float x_pos, float y_pos) {
		x = x_pos;
		y = y_pos;
	}

	void drawDot() {
		ellipse(x, y, diameter, diameter);
	}
}

// Function to draw a connection between two dot objects
// Draws 2 curves, one U-shaped and the other a copy of that flipped across the horizontal axis
// This gives the effect of two water droplets being pulled apart, as was conceptualized by the designers
void connect(int d1, int d2) {
	
	// draw the U-shaped curve
    bezier(dots[d1].x,dots[d1].y-radius+1 ,  dots[d1].x+(2*radius),dots[d1].y+1 , dots[d2].x-(2*radius),dots[d2].y+1 , dots[d2].x,dots[d2].y-radius+1);
    // draw the upside-down U-shaped curve
    bezier(dots[d1].x,dots[d1].y+radius-1 ,  dots[d1].x+(2*radius),dots[d1].y-1 , dots[d2].x-(2*radius),dots[d2].y-1 , dots[d2].x,dots[d2].y+radius-1);
}

void setup() {
    
	// BASIC SETUP

    // set the background color
    background(255);
    
    // canvas size
    size(74, 71); // width x height
    //size(tester, 71);

    diameter = (width+height)/2 / 10;
    radius = diameter / 2;
    
    // smooth edges
    smooth();
    
    noLoop(); // only draw the frame once
    
    PFont font = loadFont("courier");
    textFont(font, 18);
    textAlign(CENTER);

    // INSTANTIATE DOTS
    // These values are modular now to allow for different size representations, but they could be hard-coded later for some increase in speed.

    // in this array, indexes 0-1 hold the top row of dots, 2-4 the middle row, and 5-9 the bottom row.
    dots = new Dot[10];

    // create dots for the top row, row 0.
    float y_row0 = height / 2 + (height / 2 * 0/3);
    for (int count = 0; count < 2; count++) {
    	int index = count;
    	dots[index] = new Dot( width * (count+2)/6 + (width * 1/6/2) , y_row0 );
    }

    // create dots for the middle row, row 1.
    float y_row1 = height / 2 + (height / 2 * 1/3);
    for (int count = 0; count < 3; count++) {
    	int index = count + 2;
    	dots[index] = new Dot( (count+2)/6 * width , y_row1 );
    }

    // create dots for the bottom row, row 2.
    float y_row2 = height / 2 + (height / 2 * 2/3);
    for (int count = 0; count < 5; count++) {
    	int index = count + 5;
    	dots[index] = new Dot( (count+1)/6 * width , y_row2 );
    }

}

void draw() {  // this is run repeatedly
    
    // WRITE DEKAAZ FORM NUMBER

    strokeWeight(2);
    stroke(0);
    fill(0, 0, 0);
    float f = random(1,128);
    int n = ceil(f);
    String s=""+n;
    text(s, width/2, height/3); // need map of forms and numbers
    
    // DRAW THE TEN CIRCLES
     
    strokeWeight(1);
    fill(0, 0, 0);
    stroke(0);
    
    // draw all the dots
    for (Dot d: dots) {
    	d.drawDot();
    }
    
    // DRAW THE CONNECTIONS

    // change drawing settings for the connections
    fill(255, 255, 255);
    strokeWeight(2);
    stroke(0);

    // All these if statements are necessary since the size of the rows in Dekaaz is arbitrary.
    if (connections[0])
    	connect(0,1);
    if (connections[1])
    	connect(2,3);
    if (connections[2])
    	connect(3,4);
    if (connections[3])
    	connect(5,6);
    if (connections[4])
    	connect(6,7);
    if (connections[5])
    	connect(7,8);
    if (connections[6])
    	connect(8,9);
}