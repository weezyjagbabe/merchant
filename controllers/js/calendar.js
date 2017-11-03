/*========= Starting function =========*/
$(function(){

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	$('#calendar').fullCalendar({
	header: {
	left: 'prev,next',
	center: 'title',
	right: 'month,agendaWeek,agendaDay'
	},
	buttonText: {
	prev: '<i class="icon-chevron-left cal_prev" />',
	next: '<i class="icon-chevron-right cal_next" />'
	},
	aspectRatio: 1.5,
	selectable: false,
	selectHelper: true,
	editable: false,
	theme: false,
	events: [
	{
		title: 'All Day Event',
		start: new Date(y, m, 1)
	},
	{
		title: 'Long Event',
		start: new Date(y, m, d-5),
		end: new Date(y, m, d-2)
	},
	{
		id: 999,
		title: 'Repeating Event',
		start: new Date(y, m, d+8, 16, 0),
		allDay: false
	},
	{
		title: 'Meeting',
		start: new Date(y, m, d+12, 15, 0),
		allDay: false
	},
	{
	title: 'Doomsday',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
	{
	title: 'We are alive',
					start: new Date(y, m, d+2, 19, 0),
					end: new Date(y, m, d+2, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: '../../google.com/default.htm'
				}
			],
		eventColor: '#77aae8'
	});

});