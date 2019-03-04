$(function() {
   
   $('.datetimepicker').datetimepicker({
				icons: {
                   time: "ion-clock",
                    date: "fa fa-calendar",
                     previous: 'ion-arrow-left-c',
            		next: 'ion-arrow-right-c',
					up: "ion-arrow-up-a",
                    down: "ion-arrow-down-a"
                },
				format:'YYYY-MM-DD HH:mm:ss'
	});
	
   $('.datepicker').datetimepicker({
				icons: {
                  time: "ion-clock",
                    date: "fa fa-calendar",
                     previous: 'ion-arrow-left-c',
            		next: 'ion-arrow-right-c',
					up: "ion-arrow-up-a",
                    down: "ion-arrow-down-a"
                },
				format:'YYYY-MM-DD'
	});
});
