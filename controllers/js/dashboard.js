$(function(){
	
	/* Use this object if you need to save Flot rendering callbacks to call it when needed */
	var manager = function() {}

	manager.prototype = {
		instances: {}, // id: callback, where id should be a selector string
		
		// Remove a function from the collection
		unregister: function( key ) {
			if(typeof(this.instances[ key ]) !== 'undefined') {
				this.instances[ key ] = null;
			}
		}, 
		
		// Add a function to the collection
		register: function( key, selector, cb ) {
			if(typeof(this.instances[ key ]) === 'undefined') {
				this.instances[ key ] = {
					selector: selector, 
					callback: cb
				};
			}
		}, 
		
		// Call a function with id as the collection key
		updateByKey: function( key ) {
			if(typeof(this.instances[ key ]) !== 'undefined')
				$( this.instances[ key ].selector ).first().is( ':visible' ) && this.instances[ key ].callback.call( this );
		}, 

		// Call a function by selector in the collection
		updateBySelector: function( selector ) {
			$.each(this.instances, $.proxy(function( key, obj ) {
				$( obj.selector )[0] === $( selector )[0] && this.updateByKey( key );
			}, this));
		}, 
		
		// Call all functions in the collection
		updateAll: function() {
			$.each(this.instances, $.proxy(function( key ) {
				this.updateByKey( key );
			}, this));
		}
	};

	$.manager = new manager;
	
	var demos = {
		chart01: function( key, selector ) {
			if(!$.plot) return;
			
			var talkingAboutThis = [], d = [4.3, 5.1, 4.3, 5.2, 5.4, 4.7, 3.5, 4.1, 5.6, 7.4, 6.9, 7.1,
			    7.9, 7.9, 7.5, 6.7, 7.7, 7.7, 7.4, 7.0, 7.1, 5.8, 5.9, 7.4,
			    8.2, 8.5, 9.4, 8.1, 10.9, 10.4, 10.9, 12.4, 12.1, 9.5, 7.5,
			    7.1, 7.5, 8.1, 6.8, 3.4, 2.1, 1.9, 2.8, 2.9, 1.3, 4.4, 4.2,
			    3.0, 3.0], 

				newLikes = [], d1 = [0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.1, 0.0, 0.3, 0.0,
			    0.0, 0.4, 0.0, 0.1, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0,
			    0.0, 0.6, 1.2, 1.7, 0.7, 2.9, 4.1, 2.6, 3.7, 3.9, 1.7, 2.3,
			    3.0, 3.3, 4.8, 5.0, 4.8, 5.0, 3.2, 2.0, 0.9, 0.4, 0.3, 0.5, 0.4], 

				target = $( selector ), 
				plot = null;
				
			for(var i in d) {
				var dd = new Date(Date.UTC(2012, 6, parseInt(i, 10) + 1));
				talkingAboutThis.push([dd.getTime(), d[i]]);
			}
			for(var i in d1) {
				var dd = new Date(Date.UTC(2012, 6, parseInt(i, 10) + 1));
				newLikes.push([dd.getTime(), d1[i]]);
			}
			
			var options = {
				series: {
			        lines: { 
			            show: true, 
			            fill: true, 
			            lineWidth: 2, 
			            steps: false, 
			            fillColor: { colors: [{opacity: 0.25}, {opacity: 0}] } 
			        },
			        points: { 
			            show: true, 
			            radius: 4, 
			            fill: true,
			            lineWidth: 2
			        }
			    }, 
			    tooltip: true, 
			    tooltipOpts: {
			        content: '%s: %y'
			    }, 
			    xaxis: { mode: "time" }, 
			    grid: { borderWidth: 0, hoverable: true },
			    legend: {
			        show: false
			    }
			}, 
			
			data = [{ 
				data: talkingAboutThis, 
				label: 'Sales this month', 
				color: '#77aae9',
				lines: { lineWidth: 1 }
			}, { 
				data: newLikes, 
				label: 'Profit this month', 
				color: '#f36a30',
				points: { show: false }, 
				lines: { lineWidth: 2, fill: false }
			}];
			
			
			function showTooltip(x, y, contents) {
			    $('<div id="tooltip">' + contents + '</div>').css( {
			        position: 'absolute',
			        display: 'none',
			        //float: 'left',
			        top:  y - 40,
			        left: x - 30,
			        color: '#cccccc',
			        fontSize: '11px',
			        fontFamily: 'Arial',
			        fontWeight: 'normal',
			        padding: '4px 10px',
			        'background-color': 'rgba(47, 47, 47, 0.8)'
			    }).appendTo("body").fadeIn(200);
			 }


			var previousPoint = null;
			$(target).bind("plothover", function (event, pos, item){
			    $("#x").text(pos.x.toFixed(2));
			    $("#y").text(pos.y.toFixed(2));
			    if (item) {
			        if (previousPoint != item.dataIndex){
			            previousPoint = item.dataIndex;

			            $("#tooltip").remove();
			            var x = item.datapoint[0].toFixed(2),
			                y = item.datapoint[1].toFixed(2);

			                showTooltip(item.pageX, item.pageY,
			                        item.series.label +" = "+ y);
			                                            }
			    }
			    else {
			        $("#tooltip").remove();
			        previousPoint = null;
			     }

			});
		

			// define the plotting function to call each time the tab is shown
			function plotNow() {
				plot || (plot = $.plot(target, data, options));
			}
			
			// Now register the function to the manager
			$.manager.register( key, selector, plotNow );
		}, 
		
		chart02: function( key, selector ) {
			if(!$.plot) return;
			
			var sin = [], cos = [];
			    for (var i = 0; i < 21; i += 0.5) {
			        sin.push([i, Math.sin(i)]);
			        cos.push([i, Math.cos(i)]);
			}

				target = $( selector ), 
				plot = null;
			
			var options = {
				series: {
			        lines: { 
			            show: true, 
			        },
			        points: { 
			            show: true, 
			            radius: 4, 
			            fill: true,
			            lineWidth: 2
			        }
			    }, 
			    tooltip: true, 
			    tooltipOpts: {
			        content: '%s: %y'
			    }, 
			    yaxis: { min: -1.2, max: 1.2 },
			    grid: { borderWidth: 0, hoverable: true },
			    legend: {
			        show: false
			    }
			}, 
			
			data = [{ 
				data: sin, 
				label: 'Sales this month', 
				color: '#77aae9'
			}, { 
				data: cos, 
				label: 'Profit this month', 
				color: '#f36a30'
			}];
			
			function showTooltip(x, y, contents) {
			    $('<div id="tooltip">' + contents + '</div>').css( {
			        position: 'absolute',
			        display: 'none',
			        //float: 'left',
			        top:  y - 40,
			        left: x - 30,
			        color: '#cccccc',
			        fontSize: '11px',
			        fontFamily: 'Arial',
			        fontWeight: 'normal',
			        padding: '4px 10px',
			        'background-color': 'rgba(47, 47, 47, 0.8)'
			    }).appendTo("body").fadeIn(200);
			 }


			var previousPoint = null;
			$(target).bind("plothover", function (event, pos, item){
			    $("#x").text(pos.x.toFixed(2));
			    $("#y").text(pos.y.toFixed(2));
			    if (item) {
			        if (previousPoint != item.dataIndex){
			            previousPoint = item.dataIndex;

			            $("#tooltip").remove();
			            var x = item.datapoint[0].toFixed(2),
			                y = item.datapoint[1].toFixed(2);

			                showTooltip(item.pageX, item.pageY,
			                        item.series.label +" = "+ y);
			                                            }
			    }
			    else {
			        $("#tooltip").remove();
			        previousPoint = null;
			     }

			});

			// define the plotting function to call each time the tab is shown
			function plotNow() {
				plot || (plot = $.plot(target, data, options));
			}
			
			// Now register the function to the manager
			$.manager.register( key, selector, plotNow );
		},

		chart03: function( key, selector ) {
			// we use an inline data source in the example, usually data would
			// be fetched from a server
			var data = [], 
				totalPoints = 200;

			var data = [], totalPoints = 200;
		    function getRandomData() {
				if (data.length > 0)
					data = data.slice(1);

				// do a random walk
				while (data.length < totalPoints) {
					var prev = data.length > 0 ? data[data.length - 1] : 50;
					var y = prev + Math.random() * 10 - 5;
					if (y < 15)
					y = 15;
					if (y > 80)
					y = 80;
					data.push(y);
				}

				// zip the generated y values with the x values
				var res = [];
				for (var i = 0; i < data.length; ++i)
				res.push([i, data[i]])
				return res;
			}

			var stockValue = [], 
				options = {
				yaxis: { min: 0, max: 100 },
				xaxis: { min: 0, max: 100 },
				series: {
					lines: {
						show: true, 
						lineWidth: 2, 
						fill: true,
						fillColor: { colors: [ { opacity: 0.4 }, { opacity: 0 } ] },
						steps: false
					}
				}, 
				points: {
					show: true
				}, 
				grid: {
					borderWidth: 0,
					hoverable: true
				},
				legend: {
			        show: false
			    }
			}, 
			target = $( selector ), 
			plot = null,	
			_d = [
				{ data: getRandomData(), label: 'RAM Memory', color: '#77aae9', points: { show: false } }, 
				{ data: stockValue, label: 'CPU Overload', color: '#f36a30', lines: { fill: false } }
			], 
			liveUpdate = true, 
			timeout = null;

			// setup control widget
		    var updateInterval = 1000;
		    $("#updateInterval").val(updateInterval).change(function () {
		        var v = $(this).val();
		        if (v && !isNaN(+v)) {
		            updateInterval = +v;
		            if (updateInterval < 1)
		                updateInterval = 1;
		            if (updateInterval > 2000)
		                updateInterval = 2000;
		            $(this).val("" + updateInterval);
		        }
		    });

			for( var x = 0; x < totalPoints; x+=5 ) {
				var y = Math.floor( 50 - 15 + Math.random() * 30 );
				stockValue.push([x, y]);
			}

			function showTooltip(x, y, contents) {
			    $('<div id="tooltip">' + contents + '</div>').css( {
			        position: 'absolute',
			        display: 'none',
			        //float: 'left',
			        top:  y - 40,
			        left: x - 30,
			        color: '#cccccc',
			        fontSize: '11px',
			        fontFamily: 'Arial',
			        fontWeight: 'normal',
			        padding: '4px 10px',
			        'background-color': 'rgba(47, 47, 47, 0.8)'
			    }).appendTo("body").fadeIn(200);
			 }


			var previousPoint = null;
			$(target).bind("plothover", function (event, pos, item){
			    $("#x").text(pos.x.toFixed(2));
			    $("#y").text(pos.y.toFixed(2));
			    if (item) {
			        if (previousPoint != item.dataIndex){
			            previousPoint = item.dataIndex;

			            $("#tooltip").remove();
			            var x = item.datapoint[0].toFixed(2),
			                y = item.datapoint[1].toFixed(2);

			                showTooltip(item.pageX, item.pageY,
			                        item.series.label +" = "+ y);
			                                            }
			    }
			    else {
			        $("#tooltip").remove();
			        previousPoint = null;
			     }

			});

			// define the plotting function to call each time the tab is shown
			function plotNow() {

				plot || (plot = $.plot(target, _d, options));

					function update() {
					_d[0].data = getRandomData();
			        plot.setData( _d );
			        // since the axes don't change, we don't need to call plot.setupGrid()
			        plot.draw();
			        
			        setTimeout(update, updateInterval);
			    }

			    update();
				
			}
			
			// Now register the function to the manager
			$.manager.register( key, selector, plotNow );
		},

		calendar: function( target ) {
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			target.fullCalendar({
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
		}

	};

	$(document).ready(function() {
		if( $.plot && $.manager ) {
			demos.chart01( '#chart01', '#demoCharts01' );
			demos.chart02( '#chart02', '#demoCharts02' );
			demos.chart03( '#chart03', '#demoCharts03' );
		}

		demos.calendar( $('#calendar') );
	});
	
	$(window).load(function() {
		if($.plot && $.manager) {
			$.manager.updateBySelector( '#demoCharts01' );
			$('#dashboard-demo a[data-toggle="tab"]').on('shown', function(e) {
				var id = $(e.target).data( 'target' );
				$.manager.updateByKey( id );
			});
		}
	});
	
});