//**************************CODE FOR CLOCK*******************************
		function showTime(){

			var date = new Date();
			var h = date.getHours();// from 0 hours - 23 hours
			var m = date.getMinutes();// from 0 minutes - 59 minutes
			var s = date.getSeconds();// from 0 seconds - 59 seconds
			var session = "AM";

//Put your time in format 12 hrs not 24hrs and putting session in "AM", "PM" mode
			if(h == 0){
				h = 12;
			}
			if(h > 12){
				h = h - 12;
				session = "PM";
			}

//Put your time in the format hh : mm : ss
			if(h < 10){
				h = "0" + h;
			}
			if(m < 10){
				m = "0" + m;
			}
			if(s < 10){
				s = "0" + s;
			}

/* The code down does exactly the same thing as the code up(Put your time in the format hh : mm : ss)
			h = (h < 10) ? "0" + h : h;
			m = (m < 10) ? "0" + m : m;
			s = (s < 10) ? "0" + s : s;*/

			var time = h + ":" + m + ":" + s + " " + session;//Print your time
			document.getElementById("liaup_clock").innerText = time;// "liaup_clock" is the <div> in the html code
			document.getElementById("liaup_clock").textContent = time;
		}

		setInterval(showTime, 1000);//Make your time to be seen but in 1 second retard
		showTime;//Correct the 1 second retard error on time and prints time correctly



		/**************************************Code for date***************************/

		function showDate(){
			var currentDate = new Date();
			var year = currentDate.getFullYear();
			var month = currentDate.getMonth() + 1;// we add + 1 because the machine always substracts 1 from the actual month
			var day = currentDate.getDate();// we use getDate() and not getDay() because getDay() is not understood by the machine

			//Put your date in the format DD / MM / YYYY
			if(day < 10){
				day = "0" + day;
			}
			if(month < 10){
				month = "0" + month;
			}

			var fullYear = day + "/" + month + "/" + year;

			document.getElementById("MyDateDisplay").innerText = fullYear;// "MyDateDisplay" is the <div> in the html code
			document.getElementById("MyDateDisplay").textContent = fullYear;
		}
		setInterval(showDate, 1000);//Make your time to be seen but in 1 second retard
		showDate;//Correct the 1 second retard error on time and prints time correctly


/***********************Second Time without seconds************************************/

function showTimeWithoutS(){

			var time = new Date();
			var hr = time.getHours();// from 0 hours - 23 hours
			var mn = time.getMinutes();// from 0 minutes - 59 minutes
			var sessions = "AM";

//Put your time in format 12 hrs not 24hrs and putting session in "AM", "PM" mode
			if(hr == 0){
				hr = 12;
			}
			if(hr > 12){
				hr = hr - 12;
				sessions = "PM";
			}

//Put your time in the format hh : mm : ss
			if(hr < 10){
				hr = "0" + hr;
			}
			if(mn < 10){
				mn = "0" + mn;
			}
/* The code down does exactly the same thing as the code up(Put your time in the format hh : mm : ss)
			h = (h < 10) ? "0" + h : h;
			m = (m < 10) ? "0" + m : m;
			s = (s < 10) ? "0" + s : s;*/

			var Stime = hr + ":" + mn + " " + sessions;//Print your time
			document.getElementById("MySClockDisplay").innerText = Stime;// "liaup_clock" is the <div> in the html code
			document.getElementById("MySClockDisplay").textContent = Stime;
		}

		setInterval(showTimeWithoutS, 1000);//Make your time to be seen but in 1 second retard
		showTimeWithoutS;//Correct the 1 second retard error on time and prints time correctly
